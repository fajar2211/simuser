<html>
    <head>
        <?php $this->load->view('template/head');?>
    </head>
    <body>

        <!-- Main content -->
        <section class="content">
            <!-- Main row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <form action="<?php base_url('petugas/edit_petugas') ?>" method="post">
                                <input type="hidden" name="petugas_id" value="<?php echo $petugas_non['petugas_id'] ?>" />
                                <fieldset class="col-md-12"><h3>Data Petugas</h3></fieldset>
                                <?php if ($status === false) : ?>
                                    <div class="alert alert-warning">Gagal!</div>
                                <?php elseif ($status === true) : ?>
                                    <div class="alert alert-warning">Berhasil!</div>
                                <?php endif; ?>
                                <div class="row col-md-12"> 
                                    <div class="form-group col-md-3">
                                        <label for="id_jss">ID JSS</label>
                                        <!--<div class="input-group input-group-sm">-->

                                        <input class="form-control" type="text" name="id_jss" id="id_jss" value="" placeholder='Masukkan ID JSS disini, contoh : "JSS-A0001"; Lalu klik '>

<!--                      <span class="input-group-btn">
    <button type="button" class="btn btn-info" id="cari_id_jss"> <i class="fa fa-search"></i> </button>
</span>-->
                                        <!--</div>-->
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="user_nik">AKUN JSS</label>
                                        <input class="form-control" type="text" name="akun_jss" id="akun_jss" value="" placeholder="Akun JSS">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="nik">NIK</label>
                                        <input class="form-control" type="text" name="nik" id="nik" value="" placeholder="NIK">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="nama">Nama</label>
                                        <input class="form-control" type="text" name="nama" id="nama" value="" placeholder="Nama">
                                    </div>
                                    <!-- </div>
                                    <div class="row col-md-12"> -->
                                    <div class="form-group col-md-3">
                                        <label for="telp">Nomor Telp. / HP</label>
                                        <input class="form-control" type="text" name="telp" id="telp" value="<?php echo $petugas_non['petugas_no_telp'] ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" name="email" id="email" value="" placeholder="Email">
                                    </div>

                                    <!-- <div class="row col-md-12"> -->
                                    <div class="form-group col-md-3">
                                        <label for="nip">NIP</label>
                                        <input class="form-control" type="text" name="nip" id="nip" value="" placeholder="NIP">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="jabatan">Jabatan</label>
                                        <input class="form-control" type="text" name="jabatan" id="jabatan" value="" placeholder="Jabatan">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="profesi">Profesi</label>
                                        <input class="form-control" type="text" name="profesi" id="profesi" value="" placeholder="Profesi">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="petugas_alamat">Alamat</label>
                                        <input class="form-control" type="text" name="petugas_alamat" id="petugas_alamat" value="<?php echo $petugas_non['petugas_alamat'] ?>">
                                    </div>
                                </div>
                                <!-- </div> -->
                                <div class="row col-md-12">
                                    <fieldset class="col-md-12"><h3>Data Akun</h3></fieldset>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <!--                    <div class="form-group col-md-12">
                                                                  <label for="user_penname">Nama Pena</label>
                                                                  <input class="form-control" type="text" name="user_penname" id="user_penname" value="" placeholder="Nama Pena" required>
                                                                </div>-->
                                            <div class="form-group col-md-6">
                                                <label for="start_date">Start Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control float-right" id="start_date" name="start_date">
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
                                                    <input type="text" class="form-control float-right" id="end_date" name="end_date">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="user_name">Username</label>
                                                <input class="form-control" type="text" name="user_name" id="user_name" value="<?php echo $petugas_non['user_name'] ?>" placeholder="Username"  required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="passwd">Password</label>
                                                <input class="form-control" type="password" name="passwd" id="passwd" value="<?php echo $petugas_non['passwd'] ?>" placeholder="Sandi" data-rule-required="true" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="passwd_konfirm">Konfirmasi Ulang Password</label>
                                                <input class="form-control" type="password" name="passwd_konfirm" id="passwd_konfirm" value="" placeholder="Konfirmasi Ulang Sandi" data-rule-required="true">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="jenis_petugas_id">Jenis Petugas</label>
                                                <select class="form-control" type="jenis_petugas_id" name="jenis_petugas_id" id="jenis_petugas_id" value="" data-placeholder="Jenis Petugas" data-rule-required="true" required>
                                                    <option values="" selected>-- Pilih --</option>
                                                    <?php foreach ($jenis_petugas as $jenis_petugas1): ?>
                                                        <?php if ($petugas_non['jenis_petugas_id'] == $jenis_petugas1['jenis_petugas_id']) { ?>
                                                            <option value="<?php echo $jenis_petugas1['jenis_petugas_id']; ?>" selected="selected"><?php echo $jenis_petugas1['jenis_petugas']; ?></option>
                                                        <?php } else { ?>
                                                            <option value="<?php echo $jenis_petugas1['jenis_petugas_id']; ?>"><?php echo $jenis_petugas1['jenis_petugas']; ?></option>
                                                        <?php } endforeach; ?> 
                                                </select>    
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="hak_akses_id">Hak Akses Petugas</label>
                                                <select class="form-control" type="hak_akses_id" name="hak_akses_id" id="hak_akses_id" value="<?php echo $petugas_non['hak_akses_id'] ?>" data-placeholder="Hak Akses Petugas" data-rule-required="true">
                                                    <option value="" selected>-- Pilih --</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Administrasi</option>
                                                    <option value="3">Medis</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="puskesmas">Puskesmas</label>
                                                <select class="form-control" name="puskesmas" id="puskesmas" data-placeholder="Pilih Puskesmas" data-rule-required="true" >
                                                    <option values="" selected>-- Pilih --</option>
                                                    <option values="MG">Mergangsan</option>
                                                    <option values="JT">Jetis</option>
                                                    <option values="WB">Wirobrajan</option>
                                                    <option values="UH2">Umbulharjo 2</option>
                                                    <option values="DN1">Danurejan 1</option>
                                                    <option values="NG">Ngampilan</option>
                                                    <option values="PA">Pakualaman</option>
                                                    <option values="KT">Kraton</option>
                                                    <option values="UH1">Umbulharjo 1</option>
                                                    <option values="KG1">Kotagede 1</option>
                                                    <option values="KG2">Kotagede 2</option>
                                                    <option values="GK1">Gondokusuman 1</option>
                                                    <option values="GK2">Gondokusuman 2</option>
                                                    <option values="GM">Gondomanan</option>
                                                    <option values="GT">Gedongtengen</option>
                                                    <option values="TR">Tegalrejo</option>
                                                    <option values="DN2">Danurejan 2</option>
                                                    <option values="MJ">Mantrijeron</option>
                                                    <!--<option value="137" selected>Puskesmas Danurejan I</option>-->
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="is_aktif">Aktif</label>
                                                <select class="form-control" type="is_aktif" name="is_aktif" id="is_aktif" value="<?php echo $petugas_non['is_aktif'] ?>" data-placeholder="Aktif" data-rule-required="true" required>
                                                    <option value="" selected>-- Pilih --</option>
                                                    <option value="t">True</option>
                                                    <option value="f">False</option>
                                                </select>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                                <!--                  <div class="form-group col-md-6">
                                                    <label for="link-image">Avatar</label>
                                                    <br>
                                                    <div class="col-md-3">
                                                      <img id="showImage" src="https://danurejan1pusk.jogjakota.go.id/resources/users/no-user.png" alt="Avatar" class="img-circle" style="margin-top:10px; width:100px; height:auto;">
                                                    </div>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                
                                                      <span class="btn btn-default btn-file">
                                                        <span>Pilih Gambar</span>
                                                        <input type="file" name="user_avatar" value="" id="imageInput" accept="image/*">
                                                      </span>
                                                      <span id="imageName"><small>Belum ada gambar yang dipilih</small></span>
                                                      <span class="help-block" id="fileMax"> File Maximal 2MB</span>
                                                    </div>
                                
                                
                                                  </div>-->

                                <!--                <div class="col-md-12">
                                                  <div class="row">
                                                      <div class="form-group col-md-6">
                                                        <label for="user_role">Peran / Tugas</label>
                                                        <select class="form-control" name="user_role" id="user_role" data-placeholder="Pilih Peran / Tugas" data-rule-required="true" required>
                                                          <option></option>
                                                                                                                                            <option value="26|7" >Admin Instansi</option>
                                                                                                                  <option value="22|7" >Kontributor</option>
                                                                                                                  <option value="40|7" >Pegawai</option>
                                                                                  </select>
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                        <label for="id_instansi">Instansi / Wilayah</label>
                                                        <select class="form-control" name="id_instansi" id="id_instansi" data-placeholder="Pilih Instansi" >
                                                          <option></option>
                                                                                                                                            <option value="137" selected>Puskesmas Danurejan I</option>
                                                                                  </select>
                                                      </div>
                                                  </div>
                                                                    </div>-->
                                <div class="form-group col-md-12">
                                    <!--<button type="button" class="btn btn-default" onclick="window.history.back();"><i class="fa fa-chevron-left"></i> &nbsp; Kembali</button>-->
                                    <button type="button" class="btn btn-default" onclick="window.location.href = '/simuser/petugas/non_daftar';"><i class="fa fa-chevron-left"></i> &nbsp; Kembali</button>
                                    <button type="submit" class="btn btn-primary submit"><i class="fa fa-save"></i> &nbsp; Simpan</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
            </div>
            <!-- /.row (main row) -->

        </section>
        <!-- /.content -->

        <?php $this->load->view("template/js")?>
        
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
    </body>
</html>