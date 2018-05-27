<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
$this->load->view('templates/header');?>

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