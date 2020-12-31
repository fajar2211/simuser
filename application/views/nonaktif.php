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
                            <div class="col-sm-12">
                                <h1 class="m-0 text-dark">Penonaktifan User</h1>
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
                        <form action="<?php echo base_url('nonaktif/add_nonaktif') ?>" method="post" enctype="multipart/form-data" id="form">
                            <?php foreach ($nomornonaktif as $nomor1): ?>
                                <div class="row">
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="nomor">Nomor Permohonan</label>
                                        </div>
                                    </div>
                                    <div>
                                        <input class="form-control" type="text" name="nomor" id="nomor" value="<?php echo $nomor1['nomor'] ?>" placeholder="" readonly>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="jenis_mohon_trans">Jenis Permohonan</label>
                                        </div>
                                    </div>
                                    <div>
                                        <input class="form-control" type="text" name="jenis_mohon_trans" id="jenis_mohon_trans" value="<?php echo $nomor1['jenis_mohon'] ?>" placeholder="" readonly>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <?php foreach ($petugasnonaktif as $row): ?>
                                <div class="row">
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                        </div>
                                    </div>
                                    <div>
                                        <input class="form-control" type="text" name="nik" id="nik" value="<?php echo $row['nik'] ?>" placeholder="nik" readonly>
                                        
                                    </div>
                                    <!--                                <div class="col-lg-3 col-3">
                                                                        <button type="button" class="btn btn-primary button" onclick="<?php echo base_url('registrasi/cekNIK') ?>"><i class="fa fa-search"></i> &nbsp; Cek</button>
                                                                    </div>-->
                                    <div class="col-lg-3 col-3">
                                        <?php if ($this->session->flashdata('gagal')): { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <?php echo $this->session->flashdata('gagal'); ?>
                                                </div>
                                            <?php } endif ?>
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
                                        <input class="form-control" type="text" name="nama" id="nama" value="<?php echo $row['nama'] ?>" placeholder="nama" readonly>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="puskesmas">Puskesmas</label>
                                        </div>
                                    </div>
                                    <div>
                                        <select class="form-control" type="text" name="puskesmas" id="puskesmas" value="" data-placeholder="Pilih Puskesmas" readonly>
                                            <option value="<?php echo $row['kode_puskesmas'];?>"><?php echo $row['nama_puskesmas'];?></option>
                                        </select>        
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
                                        <input class="form-control" type="text" name="nip" id="nip" value="<?php echo $row['nip'] ?>" placeholder="nip" readonly>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="user_name">Username</label>
                                        </div>
                                    </div>
                                    <div>
                                        <input class="form-control" type="text" name="user_name" id="user_name" value="<?php echo $row['user_name'] ?>" placeholder="username" readonly>
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
                                        <input class="form-control" type="text" name="alamat" id="alamat" value="<?php echo $row['petugas_alamat'] ?>" placeholder="alamat" readonly>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="passwd">Password</label>
                                        </div>
                                    </div>
                                    <div>
                                        <input class="form-control" type="password" name="passwd" id="passwd" value="<?php echo $row['passwd'] ?>" placeholder="password" readonly>
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
                                        <input class="form-control" type="text" name="telp" id="telp" value="<?php echo $row['petugas_no_telp'] ?>" placeholder="telepon" readonly>
                                    </div>
<!--                                    <div class="col-lg-3 col-3">
                                         small box 
                                        <div class="form-group">
                                            <label for="konfirm_passwd">Konfirmasi Password</label>
                                        </div>
                                    </div>
                                    <div>
                                        <input class="form-control" type="password" name="konfirm_passwd" id="konfirm_passwd" placeholder="konfirmasi password" readonly>
                                    </div>        -->
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
                                        <input class="form-control" type="text" name="email" id="email" value="<?php echo $row['email'] ?>" placeholder="email" readonly>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="jenis_petugas_id">Jenis Petugas</label>
                                        </div>
                                    </div>
                                    <div>
                                        <select class="form-control" type="jenis_petugas_id" name="jenis_petugas_id" id="jenis_petugas_id" value="<?php echo $row['jenis_petugas'] ?>" data-placeholder="Jenis Petugas" readonly>
                                            <option value="<?php echo $row['jenis_petugas_id'];?>"><?php echo $row['jenis_petugas'];?></option>
                                        </select>    
                                    </div>    
                                </div>
                                <!-- ./col -->
                                <div class="row">
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="jss_akun">Akun JSS</label>
                                        </div>
                                    </div>
                                    <div>
                                        <input class="form-control" type="text" name="jss_akun" id="jss_akun" value="<?php echo $row['jss_akun'] ?>" placeholder="akun jss" readonly>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="hak_akses_id">Hak Akses</label>
                                        </div>
                                    </div>
                                    <div>
                                        <select class="form-control" type="hak_akses_id" name="hak_akses_id" id="hak_akses_id" data-placeholder="Hak Akses Petugas" readonly>
                                            <?php if($row['hak_akses_id'] ==1){ ?>
                                            <option value="1" selected>Admin</option>
                                            <?php } elseif($row['hak_akses_id'] ==2){ ?>        
                                            <option value="2" selected>Administrasi</option>
                                            <?php } elseif($row['hak_akses_id'] ==3){ ?>   
                                            <option value="3" selected>Medis</option>
                                            <?php } ?>
                                        </select>
                                    </div>   
                                </div>
                                <div class="row">    
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="jss_user">User JSS</label>
                                        </div>
                                    </div>
                                    <div>
                                        <input class="form-control" type="text" name="jss_user" id="jss_user" value="<?php echo $row['jss_user'] ?>" placeholder="user jss" readonly>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="start_date">Tanggal Aktif</label>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="input-group">

                                            <input type="text" class="form-control float-right" id="start_date" name="start_date" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="jabatan">Jabatan</label>
                                        </div>
                                    </div>
                                    <div>
                                        <input class="form-control" type="text" name="jabatan" id="jabatan" value="<?php echo $row['jabatan'] ?>" placeholder="jabatan" readonly>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="end_date">Tanggal Expired</label>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="input-group">

                                            <input type="text" class="form-control float-right" id="end_date" name="end_date" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="profesi">Profesi</label>
                                        </div>
                                    </div>
                                    <div>
                                        <input class="form-control" type="text" name="profesi" id="profesi" value="<?php echo $row['profesi'] ?>" placeholder="profesi" readonly>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="lampiran">Lampiran</label>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="file" class="form-control-file" name="lampiran" id="lampiran" required>
                                    </div>
                                </div>

                                <div class="row col-md-12">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-default" onclick="window.location.href = '/simuser/';"><i class="fa fa-chevron-left"></i> &nbsp; Kembali</button>
                                    </div>
                                    <div class="col-md-6" style='text-align: right'>
                                        <!--<button type="submit" class="btn btn-disabled" data-toggle="modal" data-target="#regModal" id="simpan" disabled><i class="fa fa-save"></i> &nbsp; Simpan</button>-->
                                        <button type="submit" class="btn btn-primary submit" id="simpan"><i class="fa fa-save"></i> &nbsp; Simpan</button>
                                    </div>
                                </div>
                            <?php endforeach ?>   
                        </form>   
                        <!-- /.row -->
                        <!-- Main row -->

                        <!-- /.row (main row) -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->

            </div>
            <!-- /.content-wrapper -->
                <?php $this->load->view("template/footer") ?>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>

        <?php $this->load->view("template/modal") ?>

        <?php $this->load->view("template/js") ?>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#dataTable').DataTable();
            });
        </script>
        <script>
            $(document).ready(function () {
    <?php $dt1thlagi = (date('Y') + 1) . (date('-m-d')); ?>
                $('#start_date').daterangepicker({
                    locale: {"format": 'YYYY-MM-DD'},
                    "singleDatePicker": true
                            //                ,"startDate": "20/12/2019"
                    , "maxDate": "<?php echo $dt1thlagi ?>"
                });
                $('#start_date').on('apply.daterangepicker', function (ev, picker) {
                    // console.log(picker.startDate.format('YYYY-MM-DD'));
                    // console.log(picker.endDate.format('YYYY-MM-DD'));
                    //                var year = parseInt(picker.startDate.format('YYYY')) + 1;
                    //                $('#end_date').data('daterangepicker').setStartDate(year + picker.startDate.format('-MM-DD'));
                    $('#end_date').data('daterangepicker').minDate = picker.startDate;
                    //                $('#end_date').data('daterangepicker').setStartDate(picker.startDate.format('YYYY-MM-DD'));
                });
                $('#end_date').daterangepicker({
                    locale: {"format": 'YYYY-MM-DD'},
                    "singleDatePicker": true
                    , "startDate": "<?php echo $dt1thlagi; ?>"
                    , "minDate": "<?php echo date('Y-m-d'); ?>"
                });
                $('#end_date').on('apply.daterangepicker', function (ev, picker) {
                    // console.log(picker.startDate.format('YYYY-MM-DD'));
                    // console.log(picker.endDate.format('YYYY-MM-DD'));
                    //                var year = parseInt(picker.startDate.format('YYYY')) + 1;
                    //                $('#end_date').data('daterangepicker').setStartDate(picker.startDate.format('MM/DD/') + year);
                    $('#start_date').data('daterangepicker').maxDate = picker.startDate;
                    //                $('#start_date').data('daterangepicker').setStartDate(picker.startDate.format('YYYY-MM-DD'));
                });
                
                // nambah cek perubahan
                function enable_form() {
                    $('#simpan').removeClass('btn-disabled');
                    $('#simpan').addClass('btn-primary');
                    $('#simpan').removeAttr("disabled");
                }
                $('#form input').on('change', enable_form);
                $('#form select').on('change', enable_form);
            });
        </script>

    </body>
</html>