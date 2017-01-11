<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: maskedhawk
 * Date: 15/11/16
 * Time: 12:39
 */


class Dashboard extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('subscribe_model');
        $this->session->set_userdata('referred_from', current_url());
    }

    public function index()
    {
        $this->data['counter'] = $this->subscribe_model->count_user();
        $this->data['users'] = $this->subscribe_model->users('0')->result();
        $this->render('admin/dashboard_view');
    }
}