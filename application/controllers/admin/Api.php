<?php
/**
 * Created by PhpStorm.
 * User: maskedhawk
 * Date: 22/11/16
 * Time: 11:53
 */
require(APPPATH.'libraries/REST_Controller.php');

class Api extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("subscribe_model");
    }

    public function users_get($accept = NULL)
    {
        if($accept != 0)
            $users = $this->subscribe_model->users('1');
        else
            $users = $this->subscribe_model->users('0');
        if($users->num_rows() > 0) {
            foreach ($users->result() as $row) {
                $result[] = array(
                    'id'            => $row->id,
                    'Nom'           => $row->first_name,
                    'Prenom'        => $row->last_name,
                    'genre'         => $row->gender,
                    'Telephone'     => $row->phone,
                    'adresse'       => $row->address,
                    'Code Postal'   => $row->postal,
                    'date de naissance'             => $row->birth,
                    'Comment a t\'il connu le site' => $row->how,
                    'Quel sera son costume'         => $row->cosplay
                );
            }
            echo json_encode($result);
        } else {
            $this->response(null, 204);
        }

    }

    public function user_get($user_id = NULL)
    {
        $this->input->get_request_header('some-header', TRUE);
        $user = $this->subscribe_model->user($user_id);
        if($user != null) {
            $result[] = array(
                'id'                    => $user->id,
                'Nom'                   => $user->first_name,
                'Prenom'                => $user->last_name,
                'genre'                 => $user->gender,
                'telephone'             => $user->phone,
                'adresse'               => $user->address,
                'code postal'           => $user->postal,
                'date de naissance'     => $user->birth,
                'Comment a t\'il connu le site' => $user->how,
                'Quel sera son costume'         => $user->cosplay,
                'accept'                        => $user->accept);
                echo json_encode($result);
        } else {
            $this->response(null, 204);
        }

    }


    public function subscribe_post()
    {
        $first_name = utf8_encode($this->input->input_stream('first_name', TRUE));
        $last_name = utf8_encode($this->input->input_stream('last_name', TRUE));
        $phone = utf8_encode($this->input->input_stream('phone', TRUE));
        $email = utf8_encode($this->input->input_stream('email', TRUE));
        $postal = utf8_encode($this->input->input_stream('postal', TRUE));
        $address = utf8_encode($this->input->input_stream('address', TRUE));
        $gender = utf8_encode($this->input->input_stream('gender', TRUE));
        $birth = utf8_encode($this->input->input_stream('birth', TRUE));
        $how = utf8_encode($this->input->input_stream('how', TRUE));
        $cosplay = utf8_encode($this->input->input_stream('cosplay', TRUE));
        if(is_numeric($phone) && filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('#^[0-9]{5}$#',$postal)
            && isset($first_name) && isset($last_name) && isset($address) && ($gender == 'm' || $gender == 'f' || $gender == 'a')
            && $this->validateDate($birth)) {
            if ($this->subscribe_model->check_mail($email)) {
                $this->subscribe_model->add($first_name, $last_name, $phone, $email, $postal, $address, $gender, $birth, $how, $cosplay);
                $this->response("200 : Utilisateur ajoute", 200);
            } else {
                $this->response("400: email deja existant!", 400);
            }

        }
        else {
            $this->response("400 : La sythaxe n'est pas valide.", 400);
        }
    }
    public function validateDate($date)
    {
        $d = DateTime::createFromFormat('d/m/Y', $date);
        return $d && $d->format('d/m/Y') === $date;
    }
    public function update_put($user_id)
    {
        $accept = utf8_encode($this->input->input_stream('accept', TRUE));
        if ($accept == NULL)
            $this->response("400 : Valeur requise vide.", 400);
        else if ($this->subscribe_model->user($user_id) != null) {
            switch ($accept) {
                case 0 :
                    $this->subscribe_model->decline($user_id);
                    $this->response("200 : Utilisateur #$user_id refuse", 200);
                    break;
                case 1 :
                    $this->subscribe_model->accept($user_id);
                    $this->response("200 : Utilisateur #$user_id accepte.", 200);
                    break;
                default:
                    $this->response("405 : Methode de requete non autorise.", 405);
                    break;
            }
        } else {
            $this->response("204 : Utilisateur inexistant.", 204);
        }
    }
}