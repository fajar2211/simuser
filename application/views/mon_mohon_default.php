<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('template/head'); ?>  
    </head>
    <body>
        <div class="wrapper">

            <!-- Navbar -->
            <?php $this->load->view('template/navbar'); ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?php $this->load->view('template/sidebar'); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Monitoring Permohonan</h1>
                            </div><!-- /.col -->
                            <!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <label for="keyword">Nomor Permohonan</label>
                                    </div>
                                </div>    
                                    <div>
                                        <input class="form-control" type="text" name="keyword" id="keyword" value="" placeholder="">
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-primary submit"><i class="fa fa-search"></i> &nbsp; Cari</button>
                                    </div>
                                
                                <!-- ./col -->
                                
                                <!-- ./col -->

                                <!-- ./col -->

                                <!-- ./col -->

                                <!-- ./col -->

                            </div>
                        </form>   
                        <!-- /.row -->
                        <!-- Main row -->
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <!--<th>No</th>-->
                                        <th>Nomor Permohonan</th>
                                        <th>Permohonan</th>
                                        <th>Tanggal</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Puskesmas</th>
                                        <th>Status</th>
 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($mohon as $row): ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['jenis_mohon_id'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['jenis_mohon_trans'] ?>
                                            </td>
                                            <td>
                                                <?php echo substr($row['tgl_mohon'], 0, 10) ?>
                                            </td>
                                            <td>
                                                <?php echo $row['nip'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['nama'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['jabatan'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['nama_puskesmas'] ?>
                                            </td>
                                            <td>
                                                <?php if ($row['status_id'] === '1') {
                                                    echo 'Menunggu Persetujuan Atasan' ?>
                                                <?php } elseif ($row['status_id'] === '2') { ?> 
                                                    <?php echo 'Menunggu Persetujuan Admin User' ?>                                               
                                                <?php } elseif ($row['status_id'] === '3') { ?>
                                                    <?php echo 'Selesai' ?>
                                                <?php } elseif ($row['status_id'] === '4') { ?>
                                                    <?php echo 'Ditolak' ?>
                                                <?php } ?>
                                            </td>
                                            

                                        </tr>

<?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>    
                        <!-- /.row (main row) -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

<?php $this->load->view("template/footer") ?>
            <?php $this->load->view("template/modal") ?>
            

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
<?php $this->load->view("template/js") ?>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#dataTable').DataTable();
            });
        </script>

    </body>
</html>