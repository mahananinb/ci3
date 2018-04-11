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
									<li class="active"> <a href="http://localhost/ci3/open/news">Post</a></li>
							</div><!-- /.navbar-collapse -->
						</div>
					</nav>

	<!-- halaman tambah -->
		<div class="col-md-8 col-md-offset-2">
			<h2>Portal Berita</h2><hr/>
			<form action="<?php echo base_url().'open/edit_news'?>" method="post" enctype="multipart/form-data">
	            <input type="text" name="judul" class="form-control" placeholder="Judul berita" required/><br/>
	            <textarea id="ckeditor" name="berita" class="form-control" required></textarea><br/>
	            <input type="file" name="filefoto" required><br>
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