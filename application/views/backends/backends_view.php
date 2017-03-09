<div class="block small left">

    <div class="block_head">
        <div class="bheadl"></div>

        <div class="bheadr"></div>

        <h2>Certification </h2>

        <ul class="tabs">
            <li><a href="<?php echo site_url('backends')?>">Back</a></li>
        </ul>
    </div>
    <!-- .block_head ends -->



    <div class="block_content">

        <form method="post" action="#">
            <p>
                <label>First Name:</label>
                <?php echo $certification->fname?>
            </p>
            <p>
                <label>Last Name:</label>
                <?php echo $certification->lname?>
            </p>
            <p>
                <label>Expiration:</label>
                <?php echo $certification->expiration?>
            </p>
            <p>
                <label>Certification Number:</label>
                <?php echo $certification->number?>
            </p>
            <p>
                <label>Email:</label>
                <?php echo $certification->email?>
            </p>      
            <p>
                <label>Order Number:</label>
                <?php echo $certification->order?>
            </p>  			
        </form>

    </div>
    <!-- .block_content ends -->

    <div class="bendl"></div>
    <div class="bendr"></div>

</div>