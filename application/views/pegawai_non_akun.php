<html>
    <head>
        <?php $this->load->view('template/head');?>
    </head>
    <body>
        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Akun JSS</th>
                        <th>Puskesmas</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>Aktif</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pegawai_non as $pegawai_nonall): ?>
                        <tr>
                            <td width="150">
                                <?php echo $pegawai_nonall['jss_akun'] ?>
                            </td>
                            <td width="150">
                                <?php echo $pegawai_nonall['puskesmas'] ?>
                            </td>
                            <td  width="350">
                                <?php echo $pegawai_nonall['nama'] ?>
                            </td>
                            <td  width="350">
                                <?php echo $pegawai_nonall['nik'] ?>
                            </td>
                            <td  width="350">
                                <?php echo $pegawai_nonall['nip'] ?>
                            </td>
                            <td  width="350">
                                <?php echo $pegawai_nonall['jabatan'] ?>
                            </td>
                            <td>
                                <?php echo $pegawai_nonall['is_aktif'] ?>
                            </td>
                            <td width="150">
                                <a href="<?php echo site_url('pegawai/edit_pegawai/' . $pegawai_nonall['pegawai_id']) ?>"
                                   class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        
        <?php $this->load->view("template/js")?>
        
        <script type="text/javascript">
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
        </script>
    <!--        <script>
      $(function () {
        $("#dataTable").DataTable();
    //    $('#example2').DataTable({
    //      "paging": true,
    //      "lengthChange": false,
    //      "searching": false,
    //      "ordering": true,
    //      "info": true,
    //      "autoWidth": false,
    //    });
      });
    </script>-->
    </body>
</html>