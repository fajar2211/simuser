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
                                <h1 class="m-0 text-dark">Info Status Permohonan</h1>
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
                        <form method="post" action="<?php echo base_url('monitoring/tampil') ?>">
                            <div class="row">
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <label for="keyword">Nomor Permohonan</label>
                                    </div>
                                </div>    
                                <div>
                                    <input class="form-control" type="text" id="keyword" name="keyword">
                                </div>
                                <div class="col-3">
                                    <button type="submit" id="btn-search" class="btn btn-primary"><i class="fa fa-search"></i> &nbsp; Cari</button>
                                </div>
                            </div>
                        </form>    


                        <!-- Main row -->
                        <!-- Main node for this component -->                            
                        <!--<div class="container">-->
                        <?php if (!empty($tampil)) { ?>
                            <?php foreach ($tampil as $row): { ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--      <div class="page-header">
                                                    <h1>Horizontal timeline</h1>
                                                  </div>-->
                                            <div style="display:inline-block;width:100%;overflow-y:auto;">
                                                <ul class="timeline timeline-horizontal">
                                                    <li class="timeline-item">
                                                        <?php if ($row->tgl_mohon == TRUE) { ?>
                                                            <?php echo '<div class="timeline-badge success"><i class="fa fa-check"></i></div>' ?>
                                                        <?php } elseif ($row->tgl_mohon == FALSE) { ?>
                                                            <?php echo '<div class="timeline-badge danger"><i class="fa fa-times"></i></div>' ?>
                                                        <?php } ?>    
                                                        <div class="timeline-panel">
                                                            <!--              <div class="timeline-heading">
                                                                            <h4 class="timeline-title">Mussum ipsum cacilds 1</h4>
                                                                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
                                                                          </div>-->
                                                            <div class="timeline-body">
                                                                <p>Permohonan</p>
                                                                <!--<p><small class="text-muted"><i class="fas fa-time"></i> <?php echo substr($row->tgl_mohon, 0, 10) ?></small></p>-->
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item">
                                                        <?php if ($row->tgl_sah_atasan == TRUE && $row->flag_sah_atasan == 'S') { ?>
                                                            <?php echo '<div class="timeline-badge success"><i class="fa fa-check"></i></div>' ?>
                                                        <?php } elseif ($row->tgl_sah_atasan == TRUE && $row->flag_sah_atasan == 'T') { ?>
                                                            <?php echo '<div class="timeline-badge danger"><i class="fa fa-times"></i></div>' ?>
                                                        <?php } elseif ($row->tgl_sah_atasan == FALSE && $row->flag_sah_atasan == 'T') { ?>
                                                            <?php echo '<div class="timeline-badge danger"><i class="fa fa-times"></i></div>' ?>
                                                        <?php } elseif ($row->tgl_sah_atasan == NULL && $row->flag_sah_atasan == NULL) { ?>
                                                            <?php echo '<div class="timeline-badge"><i class="fa fa-pause"></i></div>' ?>
                                                        <?php } ?>
                                                        <div class="timeline-panel">
                                                            <!--              <div class="timeline-heading">
                                                                            <h4 class="timeline-title">Mussum ipsum cacilds 2</h4>
                                                                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
                                                                          </div>-->
                                                            <div class="timeline-body">
                                                                <p>Persetujuan Atasan</p>
                                                                <!--<p><small class="text-muted"><i class="fas fa-time"></i> <?php echo substr($row->tgl_sah_atasan, 0, 10) ?></small></p>-->
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item">
                                                        <?php if ($row->tgl_sah_admin == TRUE && $row->flag_sah_admin == 'S') { ?>
                                                            <?php echo '<div class="timeline-badge success"><i class="fa fa-check"></i></div>' ?>
                                                        <?php } elseif ($row->tgl_sah_admin == TRUE && $row->flag_sah_admin == 'T') { ?>
                                                            <?php echo '<div class="timeline-badge danger"><i class="fa fa-times"></i></div>' ?>
                                                        <?php } elseif ($row->tgl_sah_admin == FALSE && $row->flag_sah_admin == 'T') { ?>
                                                            <?php echo '<div class="timeline-badge danger"><i class="fa fa-times"></i></div>' ?>
                                                        <?php } elseif ($row->tgl_sah_admin == NULL && $row->flag_sah_admin == NULL  && $row->flag_sah_atasan == 'T') { ?>
                                                            <?php echo '<div class="timeline-badge danger"><i class="fa fa-times"></i></div>' ?>
                                                        <?php } elseif ($row->tgl_sah_admin == NULL && $row->flag_sah_admin == NULL) { ?>
                                                            <?php echo '<div class="timeline-badge"><i class="fa fa-pause"></i></div>' ?>
                                                        <?php } ?>
                                                        <div class="timeline-panel">
                                                            <!--              <div class="timeline-heading">
                                                                            <h4 class="timeline-title">Mussum ipsum cacilds 3</h4>
                                                                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
                                                                          </div>-->
                                                            <div class="timeline-body">
                                                                <p>Persetujuan Admin User</p>
                                                                <!--<p><small class="text-muted"><i class="fas fa-time"></i> <?php echo substr($row->tgl_sah_admin, 0, 10) ?></small></p>-->
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item">
                                                        <?php if ($row->tgl_sah_admin == TRUE && $row->flag_sah_admin == 'S') { ?>
                                                            <?php echo '<div class="timeline-badge success"><i class="fa fa-check"></i></div>' ?>
                                                        <?php } elseif ($row->tgl_sah_admin == TRUE && $row->flag_sah_admin == 'T') { ?>
                                                            <?php echo '<div class="timeline-badge danger"><i class="fa fa-times"></i></div>' ?>
                                                        <?php } elseif ($row->tgl_sah_admin == FALSE && $row->flag_sah_admin == 'T') { ?>
                                                            <?php echo '<div class="timeline-badge danger"><i class="fa fa-times"></i></div>' ?>
                                                        <?php } elseif ($row->tgl_sah_admin == NULL && $row->flag_sah_admin == NULL  && $row->flag_sah_atasan == 'T') { ?>
                                                            <?php echo '<div class="timeline-badge danger"><i class="fa fa-times"></i></div>' ?>
                                                        <?php } elseif ($row->tgl_sah_admin == NULL && $row->flag_sah_admin == NULL) { ?>
                                                            <?php echo '<div class="timeline-badge"><i class="fa fa-pause"></i></div>' ?>
                                                        <?php } ?>
                                                        <div class="timeline-panel">
                                                            <!--              <div class="timeline-heading">
                                                                            <h4 class="timeline-title">Mussum ipsum cacilds 4</h4>
                                                                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
                                                                          </div>-->
                                                            <div class="timeline-body">
                                                                <p>Selesai</p>
                                                                <!--<p><small class="text-muted"><i class="fas fa-time"></i> <?php echo substr($row->tgl_sah_admin, 0, 10) ?></small></p>-->
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5><?php echo $row->jenis_mohon_id ?></h5>
                                            </div>
                                            <div class="col-md-6" style='text-align: right'>
                                                <h5><?php echo $row->jenis_mohon_trans ?></h5>
                                            </div>
                                        </div>
                                        <!--<br>-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Tanggal</th>
                                                            <th>Flag</th>
                                                            <th>Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo substr($row->tgl_mohon, 0, 10) ?></td>
                                                            <?php if ($row->tgl_mohon == TRUE) { ?>
                                                                <?php echo '<td>Setuju</td>' ?>
                                                                <?php echo '<td>Pengajuan ' . "$row->jenis_mohon_trans" . '</td>' ?>
                                                            <?php } elseif ($row->tgl_mohon == FALSE) { ?>
                                                                <?php echo '<td>Tolak</td>' ?>
                                                                <?php echo '<td>Pengajuan ' . "$row->jenis_mohon_trans" . '</td>' ?>
                                                            <?php } ?>

                                                        </tr>    
                                                        <tr>
                                                            <td><?php echo substr($row->tgl_sah_atasan, 0, 10) ?></td>
                                                            <?php if ($row->flag_sah_atasan == 'S') { ?>
                                                                <?php echo '<td>Setuju</td>' ?>
                                                                <?php echo '<td>Pengajuan ' . "$row->jenis_mohon_trans" . ' sudah disetujui oleh Atasan</td>' ?>
                                                            <?php } elseif ($row->flag_sah_atasan == 'T') { ?>
                                                                <?php echo '<td>Tolak</td>' ?>
                                                                <?php echo '<td>Pengajuan ' . "$row->jenis_mohon_trans" . ' ditolak oleh Atasan</td>' ?>
                                                            <?php } ?>

                                                        </tr>    
                                                        <tr>
                                                            <td><?php echo substr($row->tgl_sah_admin, 0, 10) ?></td>
                                                            <?php if ($row->flag_sah_admin == 'S') { ?>
                                                                <?php echo '<td>Setuju</td>' ?>
                                                                <?php echo '<td>Pengajuan ' . "$row->jenis_mohon_trans" . ' sudah disetujui oleh Admin User</td>' ?>
                                                            <?php } elseif ($row->flag_sah_admin == 'T') { ?>
                                                                <?php echo '<td>Tolak</td>' ?>
                                                                <?php echo '<td>Pengajuan ' . "$row->jenis_mohon_trans" . ' ditolak oleh Admin User</td>' ?>
                                                            <?php } ?>
                                                        </tr>
                                                    </tbody>
                                                </table> 
                                            </div>    
                                        </div>
                                    </div>
                                <?php } endforeach; ?>  
                        <?php } else { ?>
                            Data tidak ditemukan.
                        <?php } ?>
                    </div>
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
