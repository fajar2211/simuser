<html>
    <head>
        <?php $this->load->view('template/head');?>
    </head>
    <body>
        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Jenis Petugas</th>
                        <th>Hak Akses</th>
                        <th>Aktif</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($petugas_non as $petugas_nonall): ?>
                        <tr>
                            <td width="350">
                                <?php echo $petugas_nonall['petugas_nama'] ?>
                            </td>
                            <td width="150">
                                <?php echo $petugas_nonall['user_name'] ?>
                            </td>
                            <td  width="150">
                                <?php echo $petugas_nonall['jenis_petugas'] ?>
                            </td>
                            <td  width="150">
                                <?php echo $petugas_nonall['hak_akses_id'] ?>
                            </td>
                            <td  width="150">
                                <?php echo $petugas_nonall['is_aktif'] ?>
                            </td>
                            <td width="150">
                                <a href="<?php echo site_url('petugas/edit_petugas/' . $petugas_nonall['petugas_id']) ?>"
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