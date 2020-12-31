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
                                <h1 class="m-0 text-dark">Pengesahan Permohonan</h1>
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
                        <form action="<?php echo base_url('sah/tampil')?>" method="post">
                            <div class="row">
                                <!-- ./col -->
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal</label>
                                    </div>
                                </div>
                                <div>
                                    <div  class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                    <!--<input class="form-control" type="date" name="start_date" id="start_date" value="<?php echo set_value('start_date'); ?>" placeholder="">-->
                                        <input class="form-control float-right" type="text" name="start_date" id="start_date" value="<?php echo set_value('start_date'); ?>" placeholder="">
                                    </div>
                                </div>    
                                <div>
                                    <div>
                                        <label for="range">&nbsp;s/d&nbsp;</label>
                                    </div>
                                </div>
                                <div>
                                    <div  class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                    <!--<input class="form-control" type="date" name="end_date" id="end_date" value="<?php echo set_value('end_date'); ?>" placeholder="">-->
                                        <input class="form-control float-right" type="text" name="end_date" id="end_date" value="<?php echo set_value('end_date'); ?>" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <select name="opsi" class="form-control">
                                            <option value="" <?php echo (set_value('opsi') != '') ? '' : 'selected'; ?> >-- Pilih --</option>
                                            <option value="jenis_mohon_id" <?php echo (set_value('opsi') != 'jenis_mohon_id') ? '' : 'selected'; ?> >Nomor Permohonan</option>
                                            <option value="nama" <?php echo (set_value('opsi') != 'nama') ? '' : 'selected'; ?> >Nama</option>
                                            <option value="nip" <?php echo (set_value('opsi') != 'nip') ? '' : 'selected'; ?> >NIP</option>
                                        </select>
                                    </div>
                                </div>    
                                    <div>
                                        <input class="form-control" type="text" name="nilai" id="nilai" value="<?php echo set_value('nilai'); ?>" placeholder="">
                                    </div>
         
                            </div>
<!--                            <div class="row">
                                 ./col 
                                <div class="col-lg-3 col-3">
                                     small box 
                                    <div class="form-group">
                                        <label for="status">Status Pengesahan</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <select name="status" class="form-control">
                                            <option value="" selected>-- Pilih --</option>
                                            <option value="1">Belum Disahkan</option>
                                            <option value="2">Sudah Disahkan</option>
                                        </select>
                                    </div>
                                
                            </div>-->
                            
                            <div class="row">
                                <div class="col-3">
                                        <button type="submit" class="btn btn-primary submit"><i class="fa fa-search"></i> &nbsp; Cari</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <!-- /.row -->
                        <!-- Main row -->
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <!--<th>No</th>-->
                                        <th>Nomor Permohonan</th>
                                        <th>Permohonan</th>
                                        <th>Tanggal Permohonan</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Puskesmas</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($searchsah as $row): ?>
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
                                            <td>
                                            <?php if($this->session->userdata('jabatan_id')==='0'):?>    
                                                <form action="<?php echo base_url('sah/atasan/' . $row['jenis_mohon_id']) ?>" method="post">
                                                    <input type="hidden" name="jenis_mohon_id" value="<?php echo $row['jenis_mohon_id'] ?>" />
                                                <?php if ($row['status_id'] === '1') {
                                                    echo '<button type="submit" class="btn btn-warning" disabled><i class="fa fa-gavel"></i> Sah</button>' ?>
                                                <?php } elseif ($row['status_id'] === '2') { ?>
                                                    <?php echo '<button class="btn btn-primary"><i class="fa fa-gavel"></i> Sah</button>' ?>
                                                <?php } elseif ($row['status_id'] === '3') { ?>
                                                    <?php echo '<button class="btn btn-success" disabled><i class="fa fa-gavel"></i> Sah</button>' ?>
                                                <?php } elseif ($row['status_id'] === '4') { ?>
                                                    <?php echo '<button class="btn btn-danger" disabled><i class="fa fa-gavel"></i> Sah</button>' ?>
                                                <?php } ?>
                                            <?php elseif($this->session->userdata('jabatan_id')==='101' || $this->session->userdata('jabatan_id')==='102'):?>
                                                    <form action="<?php echo base_url('sah/atasan/' . $row['jenis_mohon_id']) ?>" method="post">
                                                    <input type="hidden" name="jenis_mohon_id" value="<?php echo $row['jenis_mohon_id'] ?>" />
                                                <?php if ($row['status_id'] === '1') {
                                                    echo '<button type="submit" class="btn btn-warning"><i class="fa fa-gavel"></i> Sah</button>' ?>
                                                <?php } elseif ($row['status_id'] === '2') { ?>
                                                    <?php echo '<button class="btn btn-primary" disabled><i class="fa fa-gavel"></i> Sah</button>' ?>
                                                <?php } elseif ($row['status_id'] === '3') { ?>
                                                    <?php echo '<button class="btn btn-success" disabled><i class="fa fa-gavel"></i> Sah</button>' ?>
                                                <?php } elseif ($row['status_id'] === '4') { ?>
                                                    <?php echo '<button class="btn btn-danger" disabled><i class="fa fa-gavel"></i> Sah</button>' ?>
                                                <?php } ?>
                                            <?php endif; ?>        
                                                </form>    
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
        <script>
            $('#start_date').daterangepicker({
                locale: {"format": 'YYYY-MM-DD'},
                "singleDatePicker": true
            });
            $('#end_date').daterangepicker({
                locale: {"format": 'YYYY-MM-DD'},
                "singleDatePicker": true
            });
        </script>

    </body>
</html>