<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
$this->load->view('templates/header');?>


			<div class="jumbotron">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
				<?php    
						$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
					?>
					<?php echo validation_errors(); ?>

					<?php echo form_open( 'katagori/create', array('class' => 'needs-validation', 'novalidate' => '') ); ?>

				<form>
				<h2>Portal Berita</h2><hr/>
					<?php echo form_open( 'katagori/create', array('class' => 'needs-validation', 'novalidate' => '') ); ?>
					<div class="form-group">
						<label for="cat_name">Nama Kategori</label>
						<input type="text" class="form-control" name="nama_katagori" value="<?php echo set_value('nama_katagori') ?>" required>
						<div class="invalid-feedback">Isi judul dulu gan</div>
					</div>
					<div class="form-group"> 
						<label for="text">Deskripsi</label>
						<input type="text" class="form-control" name="desk_katagori" value="<?php echo set_value('desk_katagori') ?>" required>
						<div class="invalid-feedback">Isi deskripsinya dulu gan</div>
					</div>
					<button id="submitBtn" type="submit" class="btn btn-primary">Simpan</button>
				</form>

			</div>
		</div>
	</div>

	
	<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>
