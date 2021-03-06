<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
$this->load->view('templates/header');?>

	<!-- halaman tambah -->
		<div class="col-md-8 col-md-offset-2">
			<h2>Portal Berita</h2><hr/>
			<form action="<?php echo base_url().'open/simpan_post'?>" method="post" enctype="multipart/form-data">
				<input type="text" name="id" class="form-control" placeholder="Id Berita" disabled/><br/>
	            <input type="text" name="judul" class="form-control" placeholder="Judul berita"><br/>
	          <!--  <div class="form-group">
                        <select class="form-control" name="provinsi" id="provinsi">
                            <option value="">Katagori Berita</option>
                            <?php
                            foreach ($Katagori as $kat) {
                                ?>
                                <option <?php echo $katagori == $data->id_katagori ? 'selected="selected"' : '' ?> 
                                    value="<?php echo $kat->id_katagori ?>"><?php echo $kat->nama_katagori ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div> -->

                    <tr>
          <label>Kategori</label>
            <select name="id_katagori" class="form-control" required>
              <option value="">Pilih Kategori</option>
              <?php foreach($category as $kat): ?>
              <option value="<?php echo $kat->id_katagori; ?>"><?php echo $kat->nama_katagori; ?></option>
              <?php endforeach; ?>
            </select>
        </tr>
	            <textarea id="ckeditor" name="berita" class="form-control" placeholder="Isi Berita" required/></textarea><br/>
	             <input type="text" name="author" class="form-control" placeholder="Author" required/><br/>
	              <input type="text" name="emailAuthor" class="form-control" placeholder="Email Author" required/><br/>
	               <input type="text" name="sumberBerita" class="form-control" placeholder="Sumber berita" required/><br/>
	            <input type="file" name="filefoto" required/><br>
	            <button class="btn btn-primary btn-lg" type="submit">Post Berita</button> 
            </form>
		</div>

	</div>
	
	<script src="<?php echo base_url().'assets/jquery/jquery-2.2.3.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
	<script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
	<script type="text/javascript">
	  $(function () {
	    CKEDITOR.replace('ckeditor');
	  });
	</script>
</body>
</html>