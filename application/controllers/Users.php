<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('response_manager');
        $this->load->model('json_decoder');
    }

    public function index()
    {
        $confirmed_users = $this->user->get_confirmed_users();
        $this->response_manager->response200JSON($confirmed_users);
    }

    public function register()
    {
        $user = $this->json_decoder->decode_JSON();
        $this->user->register($user);
    }

    public function confirm($username)
    {
        $user_was_confirmed = $this->user->confirm($username);
        if ($user_was_confirmed) {
            $this->response_manager->response200();
            // $this->view->load('confirmation_view');
        } else {
            $this->response_manager->response500('Ocurrió un error al confirmar el usuario.');
            // $this->view->load('confirmation_error_view');
        }
    }
}
