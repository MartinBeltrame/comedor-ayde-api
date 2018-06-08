<?php
class Email extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->library('email', null, 'ci_email');
    }

    public function send_email($users_emails, $message)
    {
        $this->ci_email->from('sergio-ayde@googlegroups.com', 'AyDE Solutions', 'guillermo.arispe@gmail.com');
        $this->ci_email->to($users_emails);
        $this->ci_email->subject("Comedor");
        $this->ci_email->set_mailtype('html');
        $this->ci_email->message($message);

        // $email_params = array(
        //     'user' => $user_email,
        //     'message' => $message,
        // );

        // $body = $this->load->view('emails/confirmation', $email_params, true);
        // $this->ci_email->message($body);

        if (!$this->ci_email->send()) {
            return false;
        }

        return true;
        /*
        foreach ($users_emails as $user_email) {

            $this->ci_email->clear();

            $this->ci_email->from('sergio-ayde@googlegroups.com', 'AyDE Solutions', 'guillermo.arispe@gmail.com');
            $this->ci_email->to($user_email);
            $this->ci_email->subject("Comedor");
            $this->ci_email->set_mailtype('html');
            $this->ci_email->message($message);

            // $email_params = array(
            //     'user' => $user_email,
            //     'message' => $message,
            // );

            // $body = $this->load->view('emails/confirmation', $email_params, true);
            // $this->ci_email->message($body);

            $this->ci_email->send();
        }
        */
    }
}