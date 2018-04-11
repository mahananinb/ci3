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
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="#">WEB Mahanani</a>
							</div>
					
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse navbar-ex1-collapse">
								<ul class="nav navbar-nav pull-right">
									<li class="active"> <a href="http://localhost/ci3/open/lists">Home</a></li>
									<li> <a href="http://localhost/ci3/open/About">About</a></li>
									<li> <a href="http://localhost/ci3/open/news">Post</a></li>
							</div><!-- /.navbar-collapse -->
						</div>
					</nav>
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
			foreach ($data->result_array() as $i) :
				$id=$i['berita_id'];
				$judul=$i['berita_judul'];
				$image=$i['berita_image'];
				$isi=$i['berita_isi'];
		?>
		
		<div class="col-md-8 col-md-offset-2">
			<h2><?php echo $judul;?></h2><hr/>
			<img src="<?php echo base_url().'assets/images/'.$image;?>">
			<?php echo limit_words($isi,30);?><a href="<?php echo base_url().'open/view/'.$id;?>"> Selengkapnya ></a>
			<a href="<?php echo site_url('open/delete_news/'.$i['berita_id']) ?>" class="btn btn-danger">Delete</a>
            <a href="<?php echo site_url('open/edit_news/'.$i['berita_id'])?>" class="btn btn-primary" class="btn btn-success">Edit</a> &nbsp;
		</div>
		<?php endforeach;?>
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