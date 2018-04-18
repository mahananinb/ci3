<?php
class M_berita extends CI_Model{

	function simpan_berita($jdl,$berita,$gambar,$berita_author,$email_author,$sumber_berita){
		$hsl=$this->db->query("INSERT INTO tbl_berita 
			(berita_judul,berita_isi,berita_image,berita_author,email_author,sumber_berita) 
			VALUES 
			('$jdl','$berita','$gambar','$berita_author','$email_author','$sumber_berita')");
		return $hsl;
	}

	function get_berita_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_berita WHERE berita_id='$kode'");
		return $hsl;
	}

	function get_all_berita(){
		$hsl=$this->db->query("SELECT * FROM tbl_berita ORDER BY berita_id DESC");
		return $hsl;
	}

	function get_single($id){
		$data = array();
  		$options = array('berita_id' => $id);
  		$Q = $this->db->get_where('tbl_berita',$options,1);
    		if ($Q->num_rows() > 0){
      			$data = $Q->row_array();
   			}
  		$Q->free_result();
 		return $data;
	}

	public function update($post, $id){
		//parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
		$berita_judul = $this->db->escape($post['berita_judul']);
		$berita_isi = $this->db->escape($post['berita_isi']);
		$berita_author = $this->db->escape($post['berita_author']);
		$email_author = $this->db->escape($post['email_author']);
		$sumber_berita = $this->db->escape($post['sumber_berita']);

		$sql = $this->db->query("UPDATE tbl_berita SET 
			berita_judul = $berita_judul, berita_isi = $berita_isi, berita_author = $berita_author, email_author = $email_author, sumber_berita = $sumber_berita
			WHERE berita_id = ".intval($id));

		return true;
	}

	public function delete_news($kode){
			$this->db->where('berita_id', $kode);
			return $this->db->delete('tbl_berita');
		}
}