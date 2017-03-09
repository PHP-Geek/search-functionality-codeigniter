<?php
class Backends extends CI_Controller {

	protected $tpl;

	function  __construct() {
		parent::__construct();
		$this->load->library('session');
		if(!$this->session->userdata('is_login') && $this->uri->segment(2) != 'addfrontend') redirect('login');
		$this->tpl['TThemes'] = base_url().'themes/backends/';
	}

	function index($offset=0) {
		$limit = 15;
		$this->db->limit($limit,$offset);
		$this->db->order_by('id', 'desc');
		$data['data'] = $this->db->get('certifications')->result();
		$data['total'] = $this->db->get('certifications')->num_rows();

		// pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('backends/index');
		$config['total_rows'] = $data['total'];
		$config['per_page'] = $limit;
		$config['cur_tag_open'] = '<a class="active" href="#">';
		$config['cur_tag_close'] = '</a>';
		$this->pagination->initialize($config);

		$this->tpl['data'] = $data;
		$this->tpl['pagination'] = $this->pagination->create_links();
		$this->tpl['search'] = 'Search';
		$this->tpl['titleblock'] = 'Certification';
		$this->tpl['content'] = $this->load->view('backends/backends_index',$this->tpl,true);
		$this->load->view('backends/body',$this->tpl);
	}

	function search($key='') {
		$limit = 15;
		$offset = $this->uri->segment(4,0);
		$q = $this->session->userdata($key);
		$this->db->or_like('fname',$q);
		$this->db->or_like('lname',$q);
		$this->db->or_like('expiration',$q);
		$this->db->or_like('number',$q);
		$this->db->or_like('order',$q);
		$this->db->limit($limit,$offset);
		$data['data'] = $this->db->get('certifications')->result();
		$this->db->or_like('fname',$q);
		$this->db->or_like('lname',$q);
		$this->db->or_like('expiration',$q);
		$this->db->or_like('number',$q);
		$this->db->or_like('order',$q);		
		$data['total'] = $this->db->get('certifications')->num_rows();

		// pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('backends/search/'.$key);
		$config['total_rows'] = $data['total'];
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['cur_tag_open'] = '<a class="active" href="#">';
		$config['cur_tag_close'] = '</a>';
		$this->pagination->initialize($config);

		$this->tpl['data'] = $data;
		$this->tpl['pagination'] = $this->pagination->create_links();
		$this->tpl['search'] = $q;
		$this->tpl['titleblock'] = 'Search Result: '.$q;
		$this->tpl['content'] = $this->load->view('backends/backends_index',$this->tpl,true);
		$this->load->view('backends/body',$this->tpl);
	}


	function addfrontend() {

		// serialize & decode64
		$rawdata = base64_decode($this->input->post('var', 1));
		$data = unserialize($rawdata);

		$db['fname'] = $data['fname'];
		$db['lname'] = $data['lname'];
		$db['expiration'] = $data['expiration'];
		$db['email'] = $data['useremail'];		
		$db['order'] = $data['order'];		


		// check if it is unique on database
		$this->load->helper('string');
		do {
			$str = strtoupper(random_string('alnum', 6));
			$this->db->where('number',$str);
			$ada = $this->db->get('certifications')->row();
		}while($ada);

		// random 6
		$db['number'] = $str;
		$this->db->insert('certifications',$db);
			
		echo "OK";

	}


	function add($certification_id=0) {
		$this->tpl['edit_success_msg']="";
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fname','First Name','trim|required');
		$this->form_validation->set_rules('lname','Last Name','trim|required');
		$this->form_validation->set_rules('expiration','Expiration','trim|required');
		$this->form_validation->set_rules('email','Email','valid_email');		
		$this->form_validation->set_rules('order','Order Number','trim|required');
		$this->form_validation->set_error_delimiters('<span class="note error">', '</span>');
		if($this->form_validation->run()) {
			$db['fname'] = $this->input->post('fname',1);
			$db['lname'] = $this->input->post('lname',1);
			$db['email'] = $this->input->post('email',1);		
			$db['order'] = $this->input->post('order',1);			
			$db['expiration'] = $this->input->post('expiration',1);
			if($certification_id) {
				$this->tpl['edit_success_msg']='Certification has been updated successfully.';
				$this->db->where('id',$certification_id);
				$this->db->update('certifications',$db);
			}else {
				// check if it is unique on database
				$this->load->helper('string');
				do {
					$str = strtoupper(random_string('alnum', 6));
					$this->db->where('number',$str);
					$ada = $this->db->get('certifications')->row();
				}while($ada);

				// random 6
				$db['number'] = $str;
				$this->db->insert('certifications',$db);
				redirect('backends');
			}
		}

		if($certification_id) {
			$this->db->where('id',$certification_id);
			$certification = $this->db->get('certifications')->row();
		}else {
			$certification = new stdClass();
			$certification->fname = '';
			$certification->lname = '';
			$certification->expiration = '';
			$certification->email = '';			
			$certification->order = '';	
		}
		$this->tpl['certification'] = $certification;
		$this->tpl['content'] = $this->load->view('backends/backends_add',$this->tpl,true);
		$this->load->view('backends/body',$this->tpl);
	}

	function view($certification_id=0) {
		$this->db->where('id',$certification_id);
		$certification = $this->db->get('certifications')->row();

		$this->tpl['certification'] = $certification;
		$this->tpl['content'] = $this->load->view('backends/backends_view',$this->tpl,true);
		$this->load->view('backends/body',$this->tpl);
	}

	function searchsubmit() {
		$q = $this->input->post('q',1);
		$key = md5($q);
		$this->session->set_userdata($key,$q);
		redirect('backends/search/'.$key);
	}

	function delete($id) {
		$this->db->where('id',$id);
		$this->db->delete('certifications');
		redirect('backends/');
	}

}
