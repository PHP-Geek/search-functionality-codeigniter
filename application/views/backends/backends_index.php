<div class="block">

    <div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>

        <h2><?php echo $titleblock?></h2>

        <ul class="tabs">
			<li><a href="<?php echo site_url('export')?>">Export All Data</a></li>
            <li><a href="<?php echo site_url('backends/add')?>">Add Certification</a></li>
            <li>
                <form id="frmsearch" method="post" action="<?php echo site_url('backends/searchsubmit')?>">
                    <input type="text" value="<?php echo $search;?>" class="text" name="q" id="searchform">
                </form>
            </li>
        </ul>
    </div>

    <div class="block_content">

        <form method="post" action="">

            <table width="100%" cellspacing="0" cellpadding="0" class="sortable">

                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Expiration Date</th>
                        <th>Certification Number</th>
						<th>Email</th>
						<th>Order Number</th>
                        <td>&nbsp;</td>
                    </tr>
                </thead>


                <tbody>
                    <?php foreach($data['data'] as $r):?>
                    <tr>
                        <td><?php echo $r->fname?> <?php echo $r->lname?></td>
                        <td><?php echo $r->expiration?></td>
                        <td><?php echo $r->number?></td>
						<td><?php echo $r->email?></td>
						<td><?php echo $r->order?></td>
                        <td class="delete">
                            <a href="<?php echo site_url('backends/add/'.$r->id)?>" class="buttonUI">Edit</a>
                            <a href="<?php echo site_url('backends/view/'.$r->id)?>" class="buttonUI">View</a>
                            <a href="<?php echo site_url('backends/delete/'.$r->id)?>" class="buttonUI" onclick="return confirm('are you sure?')">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach;?>

                </tbody>
            </table>

            <div class="pagination right">
                <?php echo $pagination?>
            </div>

        </form>

    </div>

    <div class="bendl"></div>
    <div class="bendr"></div>
</div>