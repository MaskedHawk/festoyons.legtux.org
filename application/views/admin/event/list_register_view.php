<?php  defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: maskedhawk
 * Date: 21/11/16
 * Time: 20:13
 */?>
<div class="row">
    <div class="container" >
        <h1>Inscrit</h1>
        <?php
            if(!empty($users))
            {
                echo '<table class="table table-hover table-bordered table-condensed">';
                echo '<tr><td>Nom</td></td><td>Prénom</td><td>Email</td><td class="hidden-xs hidden-sm">Téléphone</td><td class="hidden-xs hidden-sm">Adresse</td><td class="hidden-xs hidden-sm">Code Postal</td>
                      <td class="hidden-xs hidden-sm">Date de Naissance</td><td class="hidden-xs hidden-sm">Genre</td><td>Action</td></tr>';
                foreach($users as $user)
                {
                    echo '<tr>';
                    echo '<td>'.anchor('admin/event/show_person/'.$user->id, $user->last_name).'</td>';
                    echo '<td>'.anchor('admin/event/show_person/'.$user->id,$user->first_name).'</td>';
                    echo '<td>'.$user->email.'</td>';
                    echo '<td class="hidden-xs hidden-sm">'.$user->phone.'</td>';
                    echo '<td class="hidden-xs hidden-sm">'.$user->address.'</td>';
                    echo '<td class="hidden-xs hidden-sm">'.$user->postal.'</td>';
                    echo '<td class="hidden-xs hidden-sm">'.$user->birth.'</td>';
                    echo '<td class="hidden-xs hidden-sm">'.$user->gender.'</td>';
                    echo '<td>'.anchor('admin/users/decline/'.$user->id,'<span class="glyphicon glyphicon-remove"></span>').'</td>';
                    echo '</tr>';
                }
                echo '</table>';
            }
        ?>
    </div>
</div>
