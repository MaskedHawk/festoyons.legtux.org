<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: maskedhawk
 * Date: 19/11/16
 * Time: 11:29
 */
        $this->load->view('templates/_parts/master_header');

?><div class="container">

        <?php
                $this->load->view('templates/_parts/master_nav');
                $this->load->view('templates/_parts/master_carousel');
        ?>

        <div class="main-content" style="padding-top:80px;">
            <?php echo $the_view_content; ?>
        </div>
        <?php $this->load->view('templates/_parts/master_footer');?>
</div>
