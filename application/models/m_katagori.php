<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_katagori extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function get_all_categories()
    {
        // Urutkan berdasar abjad
        $this->db->order_by('nama_katagori');

        $query = $this->db->get('tbl_katagori');
        return $query->result();
    }

    public function create_category()
    {                     
        $data = array(
            'nama_katagori'=> $this->input->post('nama_katagori'),
            'desk_katagori'=> $this->input->post('desk_katagori')
        );

        return $this->db->insert('tbl_katagori', $data);
    }

    // Dapatkan kategori berdasar ID
    public function get_category_by_id($id)
    {
        $query = $this->db->get_where('tbl_katagori', array('id_katagori ' => $id));
        return $query->row();
    }
}
