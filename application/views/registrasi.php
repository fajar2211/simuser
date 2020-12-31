<html>
    <head>
        <?php $this->load->view('template/head'); ?>  

    </head>
    <body>

        <div class="wrapper">

            <!-- Navbar -->
            <?php if ($this->session->userdata('logged_in') == TRUE) { ?>
                <?php $this->load->view('template/navbar'); ?>
            <?php } ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?php if ($this->session->userdata('logged_in') == TRUE) { ?>
                <?php $this->load->view('template/sidebar'); ?>
            <?php } ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">


                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <h1 class="m-0 text-dark">Registrasi Permohonan User Baru</h1>
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
                        <form action="<?php echo base_url('registrasi/add_registrasi') ?>" method="post" enctype="multipart/form-data" id="form">
                            <?php foreach ($nomor as $nomor1): ?>
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
                                <div class="row">

                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                        </div>
                                    </div>
                                    <div>
                                        <input class="form-control" type="text" name="nik" id="nik" value="<?php echo set_value('nik'); ?>" placeholder="nik" required>
                                        
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
                                        <input class="form-control" type="text" name="nama" id="nama" value="" placeholder="nama" required>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="puskesmas">Puskesmas</label>
                                        </div>
                                    </div>
                                    <div>
                                        <select class="form-control" type="text" name="puskesmas" id="puskesmas" value="" data-placeholder="Pilih Puskesmas"  data-rule-required="true" required>
                                            <option value="" selected>-- Pilih --</option>
                                            <?php foreach ($puskesmas as $row): ?>  
                                                <option value="<?php echo $row['kode_puskesmas'];?>"><?php echo $row['nama_puskesmas'];?></option>
                                            <?php endforeach;?>                                          
<!--                                        <option value="1">Mergangsan</option>
                                            <option value="2">Jetis</option>
                                            <option value="3">Wirobrajan</option>
                                            <option value="5">Umbulharjo 2</option>
                                            <option value="6">Danurejan 1</option>
                                            <option value="7">Ngampilan</option>
                                            <option value="8">Pakualaman</option>
                                            <option value="9">Kraton</option>
                                            <option value="10">Umbulharjo 1</option>
                                            <option value="11">Kotagede 1</option>
                                            <option value="12">Kotagede 2</option>
                                            <option value="13">Gondokusuman 1</option>
                                            <option value="14">Gondokusuman 2</option>
                                            <option value="15">Gondomanan</option>
                                            <option value="16">Gedongtengen</option>
                                            <option value="17">Tegalrejo</option>
                                            <option value="18">Danurejan 2</option>
                                            <option value="19">Mantrijeron</option>-->
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
                                        <input class="form-control" type="text" name="nip" id="nip" value="" placeholder="nip" required>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="user_name">Username</label>
                                        </div>
                                    </div>
                                    <div>
                                        <input class="form-control" type="text" name="user_name" id="user_name" value="" placeholder="username" required>
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
                                        <input class="form-control" type="text" name="alamat" id="alamat" value="" placeholder="alamat" required>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="passwd">Password</label>
                                        </div>
                                    </div>
                                    <div>
                                        <input class="form-control" type="password" name="passwd" id="passwd" value="" placeholder="password" required>
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
                                        <input class="form-control" type="text" name="telp" id="telp" value="" placeholder="telepon" required>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="konfirm_passwd">Konfirmasi Password</label>
                                        </div>
                                    </div>
                                    <div>
                                        <input class="form-control" type="password" name="konfirm_passwd" id="konfirm_passwd" placeholder="konfirmasi password" required>
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
                                        <input class="form-control" type="text" name="email" id="email" value="" placeholder="email" required>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="jenis_petugas_id">Jenis Petugas</label>
                                        </div>
                                    </div>
                                    <div>
                                        <select class="form-control" type="jenis_petugas_id" name="jenis_petugas_id" id="jenis_petugas_id" value="" data-placeholder="Jenis Petugas" data-rule-required="true" required>
                                            <option values="" selected>-- Pilih --</option>
                                            <?php foreach ($jenis_petugas as $jenis_petugas1): ?>  
                                                <option value="<?php echo $jenis_petugas1['jenis_petugas_id']; ?>"><?php echo $jenis_petugas1['jenis_petugas']; ?></option>
                                            <?php endforeach; ?> 
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
                                        <input class="form-control" type="text" name="jss_akun" id="jss_akun" value="" placeholder="akun jss" required>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <!-- small box -->
                                        <div class="form-group">
                                            <label for="hak_akses_id">Hak Akses</label>
                                        </div>
                                    </div>
                                    <div>
                                        <select class="form-control" type="hak_akses_id" name="hak_akses_id" id="hak_akses_id" value="" data-placeholder="Hak Akses Petugas" data-rule-required="true" required>
                                            <option value="" selected>-- Pilih --</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Administrasi</option>
                                            <option value="3">Medis</option>
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
                                        <input class="form-control" type="text" name="jss_user" id="jss_user" value="" placeholder="user jss" required>
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
                                        <input class="form-control" type="text" name="jabatan" id="jabatan" value="" placeholder="jabatan" required>
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
                                        <input class="form-control" type="text" name="profesi" id="profesi" value="" placeholder="profesi" required>
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
            <?php if ($this->session->userdata('logged_in') == TRUE) { ?>
                <?php $this->load->view("template/footer") ?>
            <?php } ?>

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