<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: maskedhawk
 * Date: 19/11/16
 * Time: 11:08
 */
class form extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('subscribe_model');
    }
    function index()
    {
        $this->data['page_title'] = 'Festoyons - Inscription';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name','Prénom','trim|required');
        $this->form_validation->set_rules('last_name','Nom de famille','trim|required');
        $this->form_validation->set_rules('phone','Téléphone','trim|required');
        $this->form_validation->set_rules('address','Adresse','trim|required');
        $this->form_validation->set_rules('postal','Postal','trim|required|callback_postal');
        $this->form_validation->set_rules('gender', 'Genre', 'required');
        $this->form_validation->set_rules('birth', 'Naissance', 'trim|required');
        $this->form_validation->set_rules('how', 'How', 'trim');
        $this->form_validation->set_rules('cosplay', 'Cosplay', 'trim');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[event.email]');
        $this->form_validation->set_rules('g-recaptcha-response','Captcha','callback_recaptcha');

        if($this->form_validation->run()===FALSE)
        {
            $this->load->helper('form');
            $this->render('subscription/create_user_view');
        }
        else
        {
            $email = $this->input->post('email');
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $phone = $this->input->post('phone');
            $address = $this->input->post('address');
            $postal = $this->input->post('postal');
            $gender = $this->input->post('gender');
            $birth = $this->input->post('birth');
            $how = $this->input->post('how');
            $copslay = $this->input->post('cosplay');
            $this->subscribe_model->add($first_name, $last_name, $phone, $email, $postal, $address, $gender, $birth, $how, $copslay);

            redirect('Welcome');
        }
    }

    public function postal($postal) {
        if (preg_match('#^[0-9]{5}$#', $postal ) )
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('postal', 'Entrez un code postale valide');
            return FALSE;
        }
    }

    public function recaptcha($str='')
    {
        $google_url="https://www.google.com/recaptcha/api/siteverify";
        $secret='6LetlwwUAAAAACFc6zbbV9fIS63gVKjbYbLxnm3p';
        $ip=$_SERVER['REMOTE_ADDR'];
        $url=$google_url."?secret=".$secret."&response=".$str."&remoteip=".$ip;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
        $res = curl_exec($curl);
        curl_close($curl);
        $res= json_decode($res, true);
        //reCaptcha success check
        if($res['success'])
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('recaptcha', 'Le CAPTCHA n\'est pas valide. Veuillez réessayer ?');
            return FALSE;
        }
    }
}