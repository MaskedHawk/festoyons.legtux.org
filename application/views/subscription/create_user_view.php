<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: maskedhawk
 * Date: 16/11/16
 * Time: 16:50
 */?>

<script src='https://www.google.com/recaptcha/api.js'></script>
    <div class="row">
        <h1>Inscrivez-vous pour réserver votre place !</h1>
        <div class="col-lg-4 col-lg-offset-4">
            <?php echo form_open('',array('class'=>'form-horizontal'));?>
            <div class="form-group">
                <?php
                echo form_label('Genre','first_name');
                echo form_error('gender');
                ?>
                <div class="radio">
                        <label>
                        <?php echo form_radio('gender', 'm'); ?>
                        Homme</label>
                </div>
                <div class="radio">
                    <label>
                        <?php echo form_radio('gender', 'f'); ?>
                        Femme</label>
                </div>
                <div class="radio">
                    <label>
                        <?php echo form_radio('gender', 'a'); ?>
                        Autre</label>
                </div>
            </div>
            <div class="form-group required">
                <?php
                echo form_label('Prénom','first_name');
                echo form_error('first_name');
                echo form_input('first_name',set_value('first_name'),'class="form-control"');
                ?>
            </div>
            <div class="form-group required">
                <?php
                echo form_label('Nom','last_name');
                echo form_error('last_name');
                echo form_input('last_name',set_value('last_name'),'class="form-control"');
                ?>
            </div>
            <div class="form-group required">
                <?php
                echo form_label('Téléphone','phone');
                echo form_error('phone');
                echo form_input('phone',set_value('phone'),'class="form-control"');
                ?>
            </div>
            <div class="form-group required">
                <?php
                echo form_label('Email','email');
                echo form_error('email');
                echo form_input('email',set_value('email'),'class="form-control"');
                ?>
            </div>
            <div class="form-group required">
                <?php
                echo form_label('Adresse','address');
                echo form_error('address');
                echo form_input('address',set_value('address'),'class="form-control"');
                ?>
            </div>
            <div class="form-group required">
                <?php
                echo form_label('Code postal','postal');
                echo form_error('postal');
                $str = array (
                    'name'  => 'postal',
                    'value' => set_value('postal'),
                    'class' => 'form-control',
                    'maxlength' => '5'
                );
                echo form_input($str);
                ?>
            </div>
            <div class="form-group required">
                <?php
                echo form_label('Date de naissance','birth');
                echo form_error('birth');
                $str = array (
                    'name'      => 'birth',
                    'value'     => set_value('birth'),
                    'class'     => 'form-control',
                    'id'        => 'birth',
                    'readonly'  =>  'readonly'
                );
                echo form_input($str) ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Comment avez-vous connu notre site ?','how');
                echo form_error('how');
                $str = array (
                    'name'  => 'how',
                    'value' => set_value('how'),
                    'class' => 'form-control'
                );
                echo form_input($str);
                ?>
            </div>

            <div class="form-group">
                <?php
                echo form_label('Quel sera votre costume ?','cosplay');
                echo form_error('cosplay');
                $str = array (
                    'name'  => 'cosplay',
                    'value' => set_value('cosplay'),
                    'class' => 'form-control'
                );
                echo form_input($str);
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_error('g-recaptcha-response','<div style="color:red;">','</div>');
                echo '<div class="g-recaptcha" data-sitekey="6LetlwwUAAAAAIehGq8V6aJyL3n2D3uFZqbC811i"></div>';
                ?>
            </div>
            <?php echo form_submit('submit', 'Je m\'inscris', 'class="btn btn-primary btn-lg btn-block"');?>
            <?php echo form_close();?>
        </div>
</div>