<?php
class Json_decoder extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function decode_JSON()
    {
        return json_decode(file_get_contents('php://input'));
    }
}
