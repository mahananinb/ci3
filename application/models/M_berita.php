<?php
class M_berita extends CI_Model{

	function simpan_berita($jdl,$berita,$gambar){
		$hsl=$this->db->query("INSERT INTO tbl_berita (berita_judul,berita_isi,berita_image) VALUES ('$jdl','$berita','$gambar')");
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

	public function update($upload, $kode){
		if ($upload['result']=='success') {
			$data = array(
				'berita_judul' => $this->input->post('berita_judul'),
				'berita_isi' => $this->input->post('berita_isi'),
				'berita_image' => $upload['file']['file_name']
			);
		} else {
			$data = array(
				'berita_judul' => $this->input->post('berita_judul'),
				'berita_isi' => $this->input->post('berita_isi'),
			);
		}
		$this->db->where('berita_id', $kode);
		$this->db->update('open', $data);
	}

	public function delete_news($kode){
			$this->db->where('berita_id', $kode);
			return $this->db->delete('tbl_berita');
		}
}