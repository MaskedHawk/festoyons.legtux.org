<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: maskedhawk
 * Date: 21/11/16
 * Time: 21:11
 */ ?>
<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
            <?php

            if($user != null) {
            ?>
            <table class="table">
                <?php
                echo '<tr>';
                echo '<td> Nom </td>';
                echo '<td>' . $user->last_name . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td> Prénom </td>';
                echo '<td>' . $user->first_name . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td> Genre </td>';
                echo '<td>' . $user->gender . '</td>';
                echo '</tr>';
                echo '<td> Email </td>';
                echo '<td>' . $user->email . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td> Téléphone </td>';
                echo '<td>' . $user->phone . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td> Adresse </td>';
                echo '<td>' . $user->address . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td> Postal </td>';
                echo '<td>' . $user->postal . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td> Date de naissance </td>';
                echo '<td>' . $user->birth . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td> Comment à t\'il connu le site </td>';
                echo '<td>' . $user->how . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td> Quel sera son costume </td>';
                echo '<td>' . $user->cosplay . '</td>';
                echo '</tr>';


                ?>
                <tr>
                    <td>
                        <?php
                        echo anchor('admin/users/decline/' . $user->id, '<span class="btn btn-danger">Refuser</span>');
                        ?>
                    </td>
                    <td>
                        <?php
                        if (!$user->accept)
                            echo anchor('admin/users/accept/' . $user->id, '<span class="btn btn-success">Accepter</span>');
                        ?>
                    </td>
                </tr>
            </table>
            <?php
            } else {
                echo "Aucun utilisateur existant avec ce paramêtre";
                echo "<div class=\"row\">";
            }
            echo anchor($reffered_from, '<span class="btn btn-info">Retour</span>');
            echo "</div>";
            ?>
        </div>
    </div>
</div>