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
									<li> <a href="http://localhost/ci3/dataTable/index">Data</a></li>

							</div><!-- /.navbar-collapse -->
						</div>
					</nav>
					<div class="jumbotron">
						<div class="container">
							<center>
							<h1>List Katagori</h1>
							</center>
						</div>
					</div>
				<p>
					<?php echo anchor('katagori/create', 'Buat Kategori Baru', array('class' => 'btn btn-primary')); ?>
				</p>
			</div>

		<?php if( !empty($categories) ) : ?>
		<div class="album py-5 bg-light">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<!-- Kita format tampilan blog dalam bentuk card -->
						<!-- https://getbootstrap.com/docs/4.0/components/card/ -->
						<div class="card mb-4 box-shadow border-0">							
							<div class="card-body">
								<table class="table" >
									<thead>
										<tr>
											<th>#</th>
											<th>Nama</th>
											<th>Description</th>
											<th>Selengkapnya</th>
										</tr>
									</thead>
									<tbody>
										<!-- ISI DATA AKAN MUNCUL DISINI -->
										<?php
											// Kita looping data dari controller
											foreach ($categories as $key) :
										?>
										<tr>
											<td><?php echo $key->id_katagori ?></td>
											<td><?php echo character_limiter($key->nama_katagori, 40) ?></td>
											<td><?php echo word_limiter($key->desk_katagori, 20) ?></td>
											<td>
												<a href="<?php echo base_url('katagori/'.$key->id_katagori) ?>" class="btn btn-primary">Lihat Artikel</a>
												<a href="<?php echo base_url(). 'katagori/edit/' . $key->id_katagori ?>" class="btn btn-primary">edit</a>
												<a href="<?php echo base_url(). 'katagori/delete/' . $key->id_katagori ?>" class="btn btn-primary btn-danger">Delete</a>
											</td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<?php else : ?>
		<p><center>Belum ada data</p>
		<?php endif; ?>
		

		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>
