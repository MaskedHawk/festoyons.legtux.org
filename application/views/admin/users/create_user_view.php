<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: maskedhawk
 * Date: 16/11/16
 * Time: 16:50
 */?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="container" style="">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <h1>Create user</h1>
            <?php echo form_open('',array('class'=>'form-horizontal'));?>
            <div class="form-group">
                <?php
                echo form_label('Prénom','first_name');
                echo form_error('first_name');
                echo form_input('first_name',set_value('first_name'),'class="form-control"');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Nom de famille','last_name');
                echo form_error('last_name');
                echo form_input('last_name',set_value('last_name'),'class="form-control"');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Compagnie','company');
                echo form_error('company');
                echo form_input('company',set_value('company'),'class="form-control"');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Téléphone','phone');
                echo form_error('phone');
                echo form_input('phone',set_value('phone'),'class="form-control"');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Pseudo','username');
                echo form_error('username');
                echo form_input('username',set_value('username'),'class="form-control"');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Email','email');
                echo form_error('email');
                echo form_input('email',set_value('email'),'class="form-control"');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Mot de passe','password');
                echo form_error('password');
                echo form_password('password','','class="form-control"');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Confirmez le mot de passe','password_confirm');
                echo form_error('password_confirm');
                echo form_password('password_confirm','','class="form-control"');
                ?>
            </div>
            <?php echo form_submit('submit', 'Create user', 'class="btn btn-primary btn-lg btn-block"');?>
            <?php echo form_close();?>
        </div>
    </div>
</div>