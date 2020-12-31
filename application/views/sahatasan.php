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
                
                <input type="hidden" name="jenis_mohon_id" value="<?php echo $sah['jenis_mohon_id'] ?>" />
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <h1 class="m-0 text-dark">Pengesahan Permohonan <?php echo $sah['jenis_mohon_id'] ?></h1>
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
                        <!--<form action="">-->
                            <div class="row">
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <label for="nomor">Nomor Permohonan</label>
                                    </div>
                                </div>
                                <div>
                                        <input class="form-control" type="text" name="nomor" id="nomor" value="<?php echo $sah['jenis_mohon_id'] ?>" placeholder="" disabled>
                                </div>
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <label for="jenis_mohon_trans">Jenis Permohonan</label>
                                    </div>
                                </div>
                                <div>
                                        <input class="form-control" type="text" name="jenis_mohon_trans" id="jenis_mohon_trans" value="<?php echo $sah['jenis_mohon_trans'] ?>" placeholder="" disabled>
                                </div>
                            </div>    
                                <!-- ./col -->
<!--                            <div class="row">    
                                
                            </div>-->
                            <!-- ./col -->
                            <div class="row">    
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <label for="jss_akun">Akun JSS</label>
                                    </div>
                                </div>
                                <div>
                                        <input class="form-control" type="text" name="jss_akun" id="jss_akun" value="<?php echo $sah['jss_akun'] ?>" placeholder="" disabled>
                                </div>
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <label for="puskesmas">Puskesmas</label>
                                    </div>
                                </div>
                                <div>
                                        <input class="form-control" type="text" name="puskesmas" id="puskesmas" value="<?php echo $sah['nama_puskesmas'] ?>" placeholder="" disabled>
                                </div>
                            </div>
                                <!-- ./col -->
                            <div class="row">    
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                    </div>
                                </div>
                                <div>
                                        <input class="form-control" type="text" name="nama" id="nama" value="<?php echo $sah['nama'] ?>" placeholder="" disabled>
                                </div>
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                    </div>
                                </div>
                                <div>
                                        <input class="form-control" type="text" name="jabatan" id="jabatan" value="<?php echo $sah['jabatan'] ?>" placeholder="" disabled>
                                </div>
                                
                            </div>     
                                <!-- ./col -->
                            <div class="row">    
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                    </div>
                                </div>
                                <div>
                                        <input class="form-control" type="text" name="nik" id="nik" value="<?php echo $sah['nik'] ?>" placeholder="" disabled>
                                </div>
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <label for="profesi">Profesi</label>
                                    </div>
                                </div>
                                <div>
                                        <input class="form-control" type="text" name="profesi" id="profesi" value="<?php echo $sah['profesi'] ?>" placeholder="" disabled>
                                </div>
                            </div>
                                <!-- ./col -->
                            <div class="row">    
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <label for="nip">NIP</label>
                                    </div>
                                </div>
                                <div>
                                        <input class="form-control" type="text" name="nip" id="nip" value="<?php echo $sah['nip'] ?>" placeholder="" disabled>
                                </div>
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <label for="start_date">Tanggal Aktif</label>
                                    </div>
                                </div>
                                <div>
                                        <input class="form-control" type="text" name="start_date" id="start_date" value="<?php echo $sah['tgl_mulai_aktif'] ?>" placeholder="" disabled>
                                </div>
                            </div>
                             <!-- ./col -->
                            <div class="row">    
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                    </div>
                                </div>
                                <div>
                                        <input class="form-control" type="text" name="alamat" id="alamat" value="<?php echo $sah['alamat'] ?>" placeholder="" disabled>
                                </div>
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <label for="end_date">Tanggal Expired</label>
                                    </div>
                                </div>
                                <div>
                                        <input class="form-control" type="text" name="end_date" id="end_date" value="<?php echo $sah['tgl_expired'] ?>" placeholder="" disabled>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="row">    
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <label for="telp">Telp./HP</label>
                                    </div>
                                </div>
                                <div>
                                        <input class="form-control" type="text" name="telp" id="telp" value="<?php echo $sah['telp'] ?>" placeholder="" disabled>
                                </div>
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <label for="lampiran">Lampiran</label>
                                    </div>
                                </div>
                                <div>
                                    <a href="<?php echo base_url('/upload/lampiran/'.$sah['lampiran']) ?>" name="lampiran" id="lampiran"target="_blank"><?php echo $sah['lampiran'] ?></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="row">    
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div>
                                        <input class="form-control" type="text" name="email" id="email" value="<?php echo $sah['email'] ?>" placeholder="" disabled>
                                </div>
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <label for="petugas_sah_atasan">Petugas Sah</label>
                                    </div>
                                </div>
                                <div>
                                        <input class="form-control" type="text" name="petugas_sah_atasan" id="petugas_sah_atasan" value="<?php echo $this->session->userdata('nama') ?>" placeholder="" disabled>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-default" onclick="window.location.href = '/simuser/sah';"><i class="fa fa-chevron-left"></i> &nbsp; Kembali</button>
                                </div>
                                <div class="col-md-6" style='text-align: right'>
                                    <?php if($this->session->userdata('jabatan_id')==='0'):?>
                                        <?php echo '<button type="submit" class="btn btn-primary submit" data-toggle="modal" data-target="#regModalSetujuAdmin" id="setuju"><i class="fa fa-check"></i> &nbsp; Setuju</button>'?>
                                        <?php echo '<button type="submit" class="btn btn-danger submit" data-toggle="modal" data-target="#regModalTolakAdmin" id="tolak"><i class="fa fa-times"></i> &nbsp; Tolak</button>'?>
                                    <?php elseif($this->session->userdata('jabatan_id')==='101' || $this->session->userdata('jabatan_id')==='102'):?>
                                        <?php echo '<button type="submit" class="btn btn-primary submit" data-toggle="modal" data-target="#regModalSetuju" id="setuju"><i class="fa fa-check"></i> &nbsp; Setuju</button>'?>
                                        <?php echo '<button type="submit" class="btn btn-danger submit" data-toggle="modal" data-target="#regModalTolak" id="tolak"><i class="fa fa-times"></i> &nbsp; Tolak</button>'?>
                                    <?php endif; ?>  
                                </div>
                            </div>
                        <!--</form>-->   
                        <!-- /.row -->
                        <!-- Main row -->
                            
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