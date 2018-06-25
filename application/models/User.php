<?php
class User extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all()
    {
        $users = $this->db->get('User')->result();
        return $users;
    }

    public function register($user)
    {
        $to = strrpos($user->email, "@");
        $username = substr($user->email, 0, $to);
        $new_user = array(
            'name' => $user->name,
            'username' => $username,
            'email' => $user->email,
            'confirmed' => false,
        );

        $this->db->insert('User', $new_user);
    }

    public function confirm($username)
    {
        $this->db->trans_begin();
        
        $this->db->where('username', $username);
        $this->db->set('confirmed', true);
        $this->db->update('User');

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
}
