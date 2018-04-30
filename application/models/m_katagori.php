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


    public function update_category($data, $id) 
    {
        if ( !empty($data) && !empty($id) ){
            $update = $this->db->update( 'tbl_katagori', $data, array('id_katagori'=>$id) );
            return $update ? true : false;
        } else {
            return false;
        }
    }

    public function delete_category($id_katagori){
            $this->db->where('id_katagori', $id_katagori);
            return $this->db->delete('tbl_katagori');
        }

    public function generate_cat_dropdown()
    {

        // Mendapatkan data ID dan nama kategori saja
        $this->db->select ('
            categories.cat_id,
            categories.cat_name
        ');

        // Urut abjad
        $this->db->order_by('cat_name');

        $result = $this->db->get('categories');
        
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dropdown[''] = 'Please Select';

        if ($result->num_rows() > 0) {
            
            foreach ($result->result_array() as $row) {
                // Buat array berisi 'value' (id kategori) dan 'nama' (nama kategori)
                $dropdown[$row['cat_id']] = $row['cat_name'];
            }
        }

        return $dropdown;
    }
}
