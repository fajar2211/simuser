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
										<!--<th>Action</th>-->
									</tr>
								</thead>
								<tbody>
									<?php foreach ($petugas as $petugasall): ?>
									<tr>
										<td width="350">
											<?php echo $petugasall['petugas_nama'] ?>
										</td>
                                                                                <td width="150">
											<?php echo $petugasall['user_name'] ?>
										</td>
										<td  width="150">
											<?php echo $petugasall['jenis_petugas'] ?>
										</td>
                                                                                <td  width="150">
											<?php echo $petugasall['hak_akses_id'] ?>
										</td>
                                                                                <td  width="150">
											<?php echo $petugasall['is_aktif'] ?>
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