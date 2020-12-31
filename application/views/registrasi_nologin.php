<html>
    <head>
        <?php $this->load->view('template/head'); ?>  

    </head>
    <body>

        <!-- Main content -->
        <section class="content">
            <!-- Main row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <form action="<?php echo base_url('registrasi/add_registrasi') ?>" method="post" enctype="multipart/form-data">
                                <fieldset class="col-md-12"><h3>Permohonan User</h3></fieldset>
                                <div class="row col-md-12">
                                    <div class="form-group col-md-3">
                                        <label for="nomor">Nomor Permohonan</label>
                                        <?php foreach ($nomor as $nomor1): ?>
                                            <input class="form-control" type="text" name="nomor" id="nomor" value="<?php echo $nomor1['nomor']; ?>" placeholder="" readonly>
                                        <?php endforeach ?>        
                                    </div>
                                    <div class="form-group col-md-3" hidden>
                                        <label for="jenis_mohon_trans">Jenis Permohonan</label>
                                        <?php foreach ($nomor as $nomor1): ?>
                                            <input class="form-control" type="text" name="jenis_mohon_trans" id="jenis_mohon_trans" value="<?php echo $nomor1['jenis_mohon']; ?>" placeholder="" readonly>
                                        <?php endforeach ?>        
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="jss_akun">Akun JSS*</label>
                                        <input class="form-control" type="text" name="jss_akun" id="jss_akun" value="" placeholder='Akun JSS, contoh : "JSS-A0001"'required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="jss_user">User JSS*</label>
                                        <input class="form-control" type="text" name="jss_user" id="jss_user" value="" placeholder="User JSS"  required>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="nama">Nama*</label>
                                        <input class="form-control" type="text" name="nama" id="nama" value="" placeholder="Nama"  required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="nik">NIK*</label>
                                        <input class="form-control" type="text" name="nik" id="nik" value="" placeholder="NIK"  required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="nip">NIP*</label>
                                        <input class="form-control" type="text" name="nip" id="nip" value="" placeholder="NIP"  required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="petugas_alamat">Alamat*</label>
                                        <input class="form-control" type="text" name="alamat" id="alamat" value="" placeholder="Alamat"  required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="telp">Telp./HP*</label>
                                        <input class="form-control" type="text" name="telp" id="telp" value="" placeholder="Telp"  required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="email">Email*</label>
                                        <input class="form-control" type="email" name="email" id="email" value="" placeholder="Email"  required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="jabatan">Jabatan*</label>
                                        <input class="form-control" type="text" name="jabatan" id="jabatan" value="" placeholder="Jabatan"  required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="profesi">Profesi*</label>
                                        <input class="form-control" type="text" name="profesi" id="profesi" value="" placeholder="Profesi"  required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="puskesmas">Puskesmas*</label>
                                        <select class="form-control" type="text" name="puskesmas" id="puskesmas" value="" data-placeholder="Pilih Puskesmas"  data-rule-required="true" required >
                                            <option value="" selected>-- Pilih --</option>
                                            <option value="1">Mergangsan</option>
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
                                            <option value="19">Mantrijeron</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="start_date">Start Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control float-right" id="start_date" name="start_date" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="end_date">Expired Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control float-right" id="end_date" name="end_date" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="user_name">Username*</label>
                                        <input class="form-control" type="text" name="user_name" id="user_name" value="" placeholder="Username"  required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="jenis_petugas_id">Jenis Petugas*</label>
                                        <select class="form-control" type="jenis_petugas_id" name="jenis_petugas_id" id="jenis_petugas_id" value="" data-placeholder="Jenis Petugas" data-rule-required="true" required>
                                            <option values="" selected>-- Pilih --</option>
                                            <?php foreach ($jenis_petugas as $jenis_petugas1): ?>  
                                                <option value="<?php echo $jenis_petugas1['jenis_petugas_id']; ?>"><?php echo $jenis_petugas1['jenis_petugas']; ?></option>
                                            <?php endforeach; ?> 
                                        </select>    
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="passwd">Password*</label>
                                        <input class="form-control" type="password" name="passwd" id="passwd" value="" placeholder="Sandi" data-rule-required="true" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="hak_akses_id">Hak Akses Petugas*</label>
                                        <select class="form-control" type="hak_akses_id" name="hak_akses_id" id="hak_akses_id" value="" data-placeholder="Hak Akses Petugas" data-rule-required="true" required>
                                            <option value="" selected>-- Pilih --</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Administrasi</option>
                                            <option value="3">Medis</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="passwd_konfirm">Konfirmasi Ulang Password*</label>
                                        <input class="form-control" type="password" name="passwd_konfirm" id="passwd_konfirm" value="" placeholder="Konfirmasi Ulang Sandi" data-rule-required="true" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lampiran">Lampiran*</label>
                                        <div class="form-group">
                                            <input type="file" class="form-control-file" name="lampiran" id="lampiran" required>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row col-md-12">
                                    <!--<button type="button" class="btn btn-default" onclick="window.history.back();"><i class="fa fa-chevron-left"></i> &nbsp; Kembali</button>-->
                                    <button type="button" class="btn btn-default" onclick="window.location.href = '/simuser/home';"><i class="fa fa-chevron-left"></i> &nbsp; Kembali</button>
                                    <button type="submit" class="btn btn-primary submit" data-toggle="modal" data-target="#regModal" id="simpan"><i class="fa fa-save"></i> &nbsp; Simpan</button>
                                    <!--<input class="btn btn-success" type="submit" name="btn" value="Save" />-->
                                </div>
                                
                                
                            </form>
                        </div>
                    </div> 
                </div>
                <!-- /.box -->

            </div>

            <!-- /.row (main row) -->

        </section>
        <!-- /.content -->

        <?php $this->load->view("template/js") ?>
        
        <?php $this->load->view("template/modal") ?>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#dataTable').DataTable();
            });
        </script>
        <script>
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
        </script>
        <script>
            function myFunction() {
                var x = document.getElementById("simpan");
                x.disabled = true;
            }
        </script>

    </body>
</html>