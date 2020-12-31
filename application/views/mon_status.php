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