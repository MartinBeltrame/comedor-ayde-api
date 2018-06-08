<?php

class Response_manager extends CI_Model
{
    public function response200()
    {
        $response = array(
            'code' => 200,
            'message' => 'OK',
        );

        $this->generateJSON(200, $response);
    }

    public function response201()
    {
        $response = array(
            'code' => 201,
            'message' => 'Created',
        );

        $this->generateJSON(201, $response);
    }

    public function response200JSON($json)
    {
        $this->generateJSON(200, $json);
    }

    public function response204()
    {
        $response = array(
            'code' => 204,
            'message' => 'OK',
            'description' => 'No results',
        );

        $this->generateJSON(204, $response);
    }

    public function response400($message)
    {
        $response = array(
            'code' => 400,
            'message' => 'Bad request',
            'description' => $message,
        );

        $this->generateJSON(400, $response);
    }

    public function response404()
    {
        $response = array(
            'code' => 404,
            'message' => 'Not found',
            'description' => 'The page you requested was not found',
        );

        $this->generateJSON(404, $response);
    }

    public function response409($message)
    {
        $response = array(
            'code' => 409,
            'message' => 'Conflict',
            'description' => $message,
        );

        $this->generateJSON(409, $response);
    }

    public function response401()
    {
        $response = array(
            'code' => 401,
            'message' => 'Unauthorized',
        );

        $this->generateJSON(401, $response);
    }

    public function response500($message)
    {
        $response = array(
            'code' => 500,
            'message' => 'Server error',
            'description' => $message,
        );

        $this->generateJSON(500, $response);
    }

    private function generateResponse($status_code, $response)
    {
        $this->output->set_status_header($status_code)->set_output($response);
    }

    private function generateJSON($status_code, $response)
    {
        $this->output->set_status_header($status_code)->set_content_type('application/json')->set_output(json_encode($response, JSON_NUMERIC_CHECK));
    }
}
