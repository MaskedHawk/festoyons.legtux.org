<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: maskedhawk
 * Date: 15/11/16
 * Time: 12:43
 */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title;?></title>
    <link href="<?php echo site_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <?php echo $before_head;?>
</head>
<body>
<?php
if($this->ion_auth->logged_in()) {
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url('admin/dashboard');?>">Festoyons.com</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php print_r($this->ion_auth->user()->row()->username);?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <?php
                        if($this->ion_auth->is_admin())
                        {
                            ?>
                            <li><a href="<?php echo site_url('admin/users'); ?>">Ajout administrateur</a></li>
                            <li><a href="<?php echo site_url('admin/event'); ?>">Inscrit</a></li>
                            <?php
                        }
                        ?>
                        <li><a href="<?php echo site_url('admin/user/profile');?>">Profil</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('admin/user/logout');?>">Déconnection</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>

    <?php
    if($this->session->flashdata('message'))
    {
        ?>
        <div class="container" style="padding-top:40px;">
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('message');?>
            </div>
        </div>
        <?php
    }
    ?>

<?php } ?>
