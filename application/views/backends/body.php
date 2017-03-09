
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="base_url" content="<?php echo base_url()?>"/>
        <meta name="site_url" content="<?php echo site_url()?>"/>
        <meta name="current_url" content="<?php echo current_url()?>"/>

        <title>Adminus &#9679; Page</title>
        <link rel="stylesheet" href="<?php echo $TThemes?>css/backends.css" type="text/css" media="screen" title="" charset="utf-8" />

        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/flick/jquery-ui.css" type="text/css" media="all" />
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/flick/jquery-ui.css" type="text/css" media="all" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo $TThemes?>js/global.js"></script>
    </head>

    <body>
        <div id="hld">
            <div class="wrapper">
                <?php $this->load->view('backends/header');?>
                <?php echo $content;?>

                <div id="footer">
                    <p class="left"><a href="#">YourWebsite.com</a></p>
                </div>
            </div>
        </div>
    </body>
</html> 