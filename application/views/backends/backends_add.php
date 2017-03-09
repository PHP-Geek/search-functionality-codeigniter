<div class="block small left">
    <?php if($edit_success_msg!="") {?>
        <div class="block_head">
            <div class="bheadl"></div>
            <div class="bheadr"></div>
            <?php echo $edit_success_msg; ?>
        </div>
    <?php } ?>
    <div class="block_head">

        <div class="bheadl"></div>

        <div class="bheadr"></div>

        <h2>Certification Form</h2>
        <ul class="tabs">
            <li><a href="<?php echo site_url('backends')?>">Back</a></li>
        </ul>
    </div>
    <!-- .block_head ends -->



    <div class="block_content">

        <form method="post" action="">
            <p>
                <label>First Name:</label><br>
                <input type="text" class="text" name="fname" value="<?php echo set_value('fname',$certification->fname)?>">
                <?php echo form_error('fname'); ?>
            </p>
            <p>
                <label>Last Name:</label><br>
                <input type="text" class="text" name="lname" value="<?php echo set_value('lname',$certification->lname)?>">
                <?php echo form_error('lname'); ?>
            </p>
            <p>
                <label>Expiration:</label><br>
                <input type="text" class="text" name="expiration" value="<?php echo set_value('expiration',$certification->expiration)?>">
                <?php echo form_error('expiration'); ?>
                <span class="note">*mm-yyyy format</span>
            </p>
            <p>
                <label>Email:</label><br>
                <input type="text" class="text" name="email" value="<?php echo set_value('email',$certification->email)?>">
                <?php echo form_error('email'); ?>
            </p>   
			
            <p>
                <label>Order Number:</label><br>
                <input type="text" class="text" name="order" value="<?php echo set_value('order',$certification->order)?>">
                <?php echo form_error('order'); ?>
            </p> 
			
            <p>Please insert your first name, last name and expiration. </p>
            <p><input type="submit" value="Save" class="submit small"></p>

        </form>

    </div>
    <!-- .block_content ends -->

    <div class="bendl"></div>
    <div class="bendr"></div>

</div>