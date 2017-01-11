<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: maskedhawk
 * Date: 21/11/16
 * Time: 10:04
 */

class Subscribe_model extends CI_Model
{

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }
    public function add($first_name, $last_name, $phone, $email, $postal, $address, $gender, $birth, $how, $cosplay)
    {
        $data = array(
            'first_name'    => $first_name,
            'last_name'     => $last_name,
            'phone'         => $phone,
            'email'         => $email,
            'gender'        => $gender,
            'postal'        => $postal,
            'address'       => $address,
            'birth'         => $birth,
            'how'           => $how,
            'cosplay'       => $cosplay
        );
        $this->db->insert('event', $data);
    }
    public function users($accept = NULL)
    {
        if(isset($accept))
        {
            return $this->db
                ->where('accept', $accept)
                ->get('event');
        } else
        {
            return $this->db->get('event');
        }
    }
    public function user($user_id = NULL)
    {
        $user = $this->db
            ->get_where('event', array('id' => $user_id));
        if($user->num_rows() > 0)
            return $user->row();
        else
            return NULL;
    }
    public function accept($user_id)
    {
        if (isset($user_id)) {
            $this->db->set('accept', 1);
            $this->db->where('id', $user_id);
            $this->db->update('event');
        }
    }
    public function decline($user_id)
    {
        if (isset($user_id)) {
            $this->db->delete('event',  array('id' => $user_id));
        }
    }
    public function count_user($accept = NULL)
    {
        $accept || $accept = '1';
        $select = array('count(id) as count');
        return $this->db
            ->select($select)
            ->from('event')
            ->where('accept' ,$accept)
            ->get()->row()->count;
    }
    public function check_mail($mail)
    {
        $result = $this->db
            ->get_where('event', array('email' => $mail));
        if($result->num_rows() <= 0)
            return true;
        else
            return false;
    }
}