<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('template/head'); ?>
        
        <script>
            var baseurl = "<?php echo base_url(); ?>"; // Buat variabel baseurl untuk nanti di akses pada file config.js
        </script>
        <script src="<?php echo base_url("html/assets/AdminLTE/plugins/jquery/jquery.min.js"); ?>"></script> 
        <script>
            $(document).ready(function(){
  $("#btn-search").click(function(){ // Ketika tombol simpan di klik
    // Ubah text tombol search menjadi SEARCHING... 
    // Dan tambahkan atribut disable pada tombol nya agar tidak bisa diklik lagi
    $(this).html("Mencari...").attr("disabled", "disabled");
    
    $.ajax({
      url: baseurl + 'monitoring/search', // File tujuan
      type: 'POST', // Tentukan type nya POST atau GET
      data: {keyword: $("#keyword").val()}, // Set data yang akan dikirim
      dataType: "json",
      beforeSend: function(e) {
        if(e && e.overrideMimeType) {
          e.overrideMimeType("application/json;charset=UTF-8");
        }
      },
      success: function(response){ // Ketika proses pengiriman berhasil
        // Ubah kembali text button search menjadi SEARCH
        // Dan hapus atribut disabled untuk meng-enable kembali button search nya
        $("#btn-search").html("Cari").removeAttr("disabled");
        
        // Ganti isi dari div view dengan view yang diambil dari controller siswa function search
        $("#view").html(response.hasil);
      },
      error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
        alert(xhr.responseText); // munculkan alert
      }
    });
  });
});
</script>
        
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
                                <h1 class="m-0 text-dark">Monitoring Permohonan</h1>
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
                        
                            <div class="row">
                                <div class="col-lg-3 col-3">
                                    <!-- small box -->
                                    <div class="form-group">
                                        <label for="keyword">Nomor Permohonan</label>
                                    </div>
                                </div>    
                                    <div>
                                        <input class="form-control" type="text" id="keyword">
                                    </div>
                                    <div class="col-3">
                                        <button type="button" id="btn-search" class="btn btn-primary"><i class="fa fa-search"></i> &nbsp; Cari</button>
                                    </div>
                                    <br>
                                    <div id="view">
                                      <?php $this->load->view('mon_mohon_view', array('mohon'=>$mohon)); // Load file view.php dan kirim data mohon ?>
                                    </div>
                                
                                <!-- ./col -->
                                
                                <!-- ./col -->

                                <!-- ./col -->

                                <!-- ./col -->

                                <!-- ./col -->

                            </div>
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