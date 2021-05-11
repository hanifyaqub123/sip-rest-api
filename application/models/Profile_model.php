<?php

class Profile_model extends CI_Model
{
    public function getProfile($id = null)
    {
        if ($id === null) {
            // return $this->db->get('user_profile')->result_array();
        } else {
            return $this->db->get_where('user_profile', ['nik' => $id])->result_array();
        }
    }

    public function deleteProfile($id)
    {
        $this->db->delete('user_profile', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createProfile($data)
    {
        $this->db->insert('user_profile', $data);
        return $this->db->affected_rows();
    }

    public function updateProfile($data, $id)
    {
        $this->db->update('user_profile', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
