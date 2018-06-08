<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
defined('BASEPATH') or exit('No direct script access allowed');

class Emails extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('email');
        $this->load->model('response_manager');
        $this->load->model('json_decoder');
    }

    public function index()
    {
        $body = $this->json_decoder->decode_JSON();
        $email_was_sent = $this->email->send_email($body->emails, $body->message);

        if ($email_was_sent) {
            $this->response_manager->response200();
        } else {
            $this->response_manager->response500("Ocurrió un error.");
        }
    }
}
