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
										<!--<th>Action</th>-->
									</tr>
								</thead>
								<tbody>
									<?php foreach ($pegawai as $pegawaiall): ?>
									<tr>
										<td width="150">
											<?php echo $pegawaiall['jss_akun'] ?>
										</td>
                                                                                <td width="150">
											<?php echo $pegawaiall['puskesmas'] ?>
										</td>
										<td  width="350">
											<?php echo $pegawaiall['nama'] ?>
										</td>
                                                                                <td  width="350">
											<?php echo $pegawaiall['nik'] ?>
										</td>
                                                                                <td  width="350">
											<?php echo $pegawaiall['nip'] ?>
										</td>
                                                                                <td  width="350">
											<?php echo $pegawaiall['jabatan'] ?>
										</td>
                                                                                <td>
											<?php echo $pegawaiall['is_aktif'] ?>
										</td>

									</tr>
                                                                        
                                                                                    <?php  endforeach;  ?>

								</tbody>
							</table>
						</div>
    <?php $this->load->view("template/js")?>
        
    <script type="text/javascript">
    $(document).ready( function () {
      $('#dataTable').DataTable();
    } );
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