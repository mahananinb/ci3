<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
$this->load->view('templates/header');?>

	<div class="container">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<center><h2><?php echo $b['berita_judul'];?></h2><hr/>
			<img src="<?php echo base_url().'assets/images/'.$b['berita_image'];?>"></center><br/>
			<br><b><?php echo $b['sumber_berita'];?><br/></b>
			<?php echo $b['berita_isi'];?><br/>
			<p align="right"><b><?php echo $b ['email_author']?></b></p>
		</div>
		
	</div>
	</ul>
	</div>
	</div>
	</nav>
	</div>
	</div>
	<script src="<?php echo base_url().'assets/jquery/jquery-2.2.3.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
</body>
</html>