<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: maskedhawk
 * Date: 21/11/16
 * Time: 20:12
 */

class Event extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('subscribe_model');
    }
    public function index()
    {
        $this->data['page_title'] = 'Fetoyons - Utilisateur inscrit';
        $this->data['users'] = $this->subscribe_model->users('1')->result();
        $this->render('admin/event/list_register_view');
        $this->session->set_userdata('referred_from', current_url());
    }
    public function show_person($user_id = NULL)
    {
        $this->data['page_title'] = 'Festoyons - Inscrit';
        $this->data['reffered_from'] = $this->session->userdata('referred_from');
        if($user_id != NULL){
            $this->data['user'] = $this->subscribe_model->user($user_id);
        }
        $this->render('admin/event/show_register_view');
    }
    public function decline($user_id = NULL)
    {
        if(is_null($user_id))
        {
            $this->session->set_flashdata('message','There\'s no user to delete');
        }
        else
        {
            $this->load->model('subscribe_model');
            $this->subscribe_model->decline($user_id);
        }
        redirect('admin/event');
    }
    public function accept($user_id = NULL)
    {
        if(is_null($user_id))
        {
            $this->session->set_flashdata('message','There\'s no user to accept');
        }
        else
        {
            $this->load->model('subscribe_model');
            $this->subscribe_model->accept($user_id);
        }
        redirect('admin/event');
    }
}