<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: maskedhawk
 * Date: 29/11/16
 * Time: 00:23
 */
class Custom_404 extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        if (strpos($_SERVER["HTTP_ACCEPT"],'text/html') !== false) {
            $this->data['page_title'] = 'Festoyons - 404';
            $this->render('templates/_parts/404');
        }
        else {
            $response = "404 : Page not Found";

            $this->output
                ->set_status_header(404)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
            exit;

        }
    }
}