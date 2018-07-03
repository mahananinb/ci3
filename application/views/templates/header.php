<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Mahanani Nur B</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" type="text/css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>

							</button>
							<a class="navbar-brand" href="#">WEB Mahanani</a>
						</div>
				
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav pull-right">
								<li class="active"> <a href="http://localhost/ci3/open/index">Home</a></li>
									<li > <a href="http://localhost/ci3/open/About">About</a></li>
									<!-- <li> <a href="http://localhost/ci3/open/news">Post</a></li>
									<li> <a href="http://localhost/ci3/katagori/index">Katagori</a></li>								
									<li> <a href="http://localhost/ci3/dataTable/index">Data</a></li> -->

							<?php if(!$this->session->userdata('logged_in')) : ?>
									<li > <a href="<?php echo base_url('user/register') ?>">Register</a></li>
									<li > <a href="<?php echo base_url('user/login') ?>">Login</a></li>
                    <!-- <div class="btn-group" role="group" aria-label="Data baru">

                        <?php echo anchor('user/register', 'Register', array('class' => 'btn btn-outline-light')); ?>
                        <?php echo anchor('user/login', 'Login', array('class' => 'btn btn-outline-light')); ?>

                    </div> -->

                			<?php endif; ?>

                	<?php if($this->session->userdata('logged_in')) : ?>
        			<!-- <div class="btn-group" role="group" aria-label="Data baru"> -->
          				<?php echo anchor('Open/simpan_post', 'Artikel Baru', array('class' => 'btn btn-outline-light')); ?>
          				<?php echo anchor('katagori/create', 'Kategori Baru', array('class' => 'btn btn-outline-light')); ?>
         				<?php echo anchor('User/logout', 'Logout', array('class' => 'btn btn-outline-light')); ?>
       					<!-- </div> -->
      <?php endif; ?>
							</ul>
						</div>
				</nav>