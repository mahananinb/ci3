<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
$this->load->view('templates/header');?>


					<div class="jumbotron">
						<div class="container">
							<center>
							<h1>My Blog</h1>
							Web ini menggunakan Bootstrap + Framework Codeigniter 
							</center>
						</div>
						<center><img src="<?php echo base_url(); ?>assets/button_ok.png" width="100px" > </center>
					</div>

			</div>
			<?php
			function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
			foreach ($artikel as $i) : ?>
		
		
		<div class="col-md-8 col-md-offset-2">
			<h2><?php echo $i->berita_judul ?></h2><hr/>
			<img src="assets/images/<?php echo $i->berita_image ?>;?>">
			<?php echo limit_words($i->berita_isi,30);?><a href="<?php echo base_url().'open/view/'.$i->berita_id;?>"> Selengkapnya ></a>
			<a href="<?php echo site_url('open/delete_news/'.$i->berita_id) ?>" class="btn btn-danger">Delete</a>
            <a href="<?php echo site_url('open/edit/'.$i->berita_id)?>" class="btn btn-primary" class="btn btn-success">Edit</a> &nbsp;
		</div>
		<?php endforeach;?>
	</div>
		</div>
		<center>
		<div>
		<?php if(isset($links)){
			echo $links;
		}
		?>
		</div>
		</center>

		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" type="text/css">
        <!-- Style tambahan
        Note: Jika menginginkan style CSS tambahan, gunakan file custom.css sehingga file CSS asli milik Bootstrap tetap orisinil. Tujuannya, agar nantinya jika ada update baru dari Bootstrap dan ingin kita implementasikan, maka custom style kita tidak tertimpa.
        -->
        <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/theme.min.css"> -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/css/custom.css">

        <script src="<?php echo base_url() ?>assets/assets/js/jquery-1.9.1.min.js"></script>

        <!-- Bootstrap core & jQuery JavaScript
		================================================== -->
		<script src="<?php echo base_url() ?>assets/assets/js/bootstrap.min.js"></script>

		<!-- Plugins -->
		<script src="<?php echo base_url() ?>assets/assets/js/holder.min.js"></script>

		<!-- Custom -->
		<script src="<?php echo base_url() ?>assets/assets/js/custom.js"></script>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>