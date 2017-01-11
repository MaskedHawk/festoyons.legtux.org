<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: maskedhawk
 * Date: 19/11/16
 * Time: 11:07
 */
class Welcome extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->data['page_title'] = 'Festoyons - Acceuil';
        $this->render('welcome_view');
    }
}