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
        $this->reset_confirmed_users();

        foreach ($users_emails as $user_email) {

            $this->ci_email->from('sergio-ayde@googlegroups.com', 'AyDE Solutions');
            $this->ci_email->to($user_email);
            $this->ci_email->subject("Menú del día");
            $this->ci_email->set_mailtype('html');

            $to = strrpos($user_email, "@");
            $username = substr($user_email, 0, $to);
            $url = "http://belarisdev.com/ayde/api/index.php/users/" . $username;

            $email_params = array(
                'confirmation_url' => $url,
                'message' => $message,
            );

            $body = $this->load->view('emails/confirmation', $email_params, true);
            $this->ci_email->message($body);

            $this->ci_email->send();
        }
    }

    private function reset_confirmed_users()
    {
        $this->db->set('confirmed', false);
        $this->db->update('User');
    }
}
