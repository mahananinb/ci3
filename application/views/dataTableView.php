 <!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mahanani Nur B</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" type="text/css">
         <script src="<?php echo base_url() ?>assets/js/jquery-1.9.1.min.js"></script>


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
                                    <li> <a href="http://localhost/ci3/open/lists">Home</a></li>
                                    <li> <a href="http://localhost/ci3/open/About">About</a></li>
                                    <li> <a href="http://localhost/ci3/open/news">Post</a></li>
                                    <li> <a href="http://localhost/ci3/katagori/index">Katagori</a></li>
                                    
                                    <li class="active"> <a href="http://localhost/ci3/dataTable/index">Data</a></li>

                            </div><!-- /.navbar-collapse -->
                        </div>
                    </nav>
 <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <table id="dt-basic" class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                             <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Penulis</th>
                            <th>Sumber</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $d) :
                           
                      ?>
                        <tr>
                        <td><?php echo $d->berita_id ?></td>
                            <td><?php echo $d->berita_judul ?></td>
                            <td><?php echo $d->kategori_berita ?></td>
                            <td><?php echo $d->berita_tanggal ?></td>
                            <td><?php echo $d->berita_author ?></td>
                            <td><?php echo $d->sumber_berita ?></td>
                        <td><a href='ctrNasabah/edit/<?php echo $id_nasabah ?>' class='btn btn-sm btn-info'>Update</a>
                        <a href='ctrNasabah/delete/<?php echo $id_nasabah; ?>' class='btn btn-sm btn-danger'>Delete</a></td>
                  </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    </div>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.dataTables.min.css">
    <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.bootstrap4.min.js"></script>
    <script>
        jQuery(document).ready(function(){

            // Contoh inisialisasi Datatable tanpa konfigurasi apapun
            // #dt-basic adalah id html dari tabel yang diinisialisasi
            $('#dt-basic').DataTable();
        });

    </script>

        </div>
    </body>
</html>