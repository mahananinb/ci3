<!DOCTYPE html>
<html>
<head>
	<title>Post Berita</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
</head>
<body>
	<div class="container">
	
		<nav class="navbar navbar-default" role="navigation">
						<div class="container-fluid">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="#">WEB Mahanani</a>
							</div>
					
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse navbar-ex1-collapse">
								<ul class="nav navbar-nav pull-right">
									<li> <a href="http://localhost/ci3/open/index">Home</a></li>
									<li> <a href="http://localhost/ci3/open/About">About</a></li>
									<li > <a href="http://localhost/ci3/open/news">Post</a></li>
									<li class="active"> <a href="http://localhost/ci3/katagori/index">Katagori</a></li>
							</div><!-- /.navbar-collapse -->
						</div>
					</nav>
				<p>
					<?php echo anchor('kategori/create', 'Buat Kategori Baru', array('class' => 'btn btn-primary')); ?>
				</p>
		<div class="album py-5 bg-light">
			<div class="container">
				<div class="row">

					<?php
						// Kita looping data dari controller
						foreach ($catagories as $key) :
					?>

					<div class="col-md-4">
						<!-- Kita format tampilan blog dalam bentuk card -->
						<!-- https://getbootstrap.com/docs/4.0/components/card/ -->
						<div class="card mb-4 box-shadow border-0">
														
							<div class="card-body">

								<!-- Batasi cuplikan konten dengan substr sederhana -->
								<h5><?php echo character_limiter($key->cat_name, 40) ?></h5>
								<p class="card-text"><?php echo word_limiter($key->cat_description, 20) ?></p>
								
								<div class="d-flex justify-content-between align-items-center">
									<div class="btn-group">
										<!-- Untuk link detail -->
										<a href="<?php echo base_url(). 'katagori/artikel/' . $key->id ?>" class="btn btn-outline-secondary">Baca</a>
										<a href="<?php echo base_url(). 'katagori/edit/' . $key->id ?>" class="btn btn-outline-secondary">Edit</a>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<?php endforeach; ?>

				</div>
			</div>
		</div>


		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>
