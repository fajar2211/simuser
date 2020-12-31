<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SIMUSER | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>html/assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>html/assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>html/assets/AdminLTE/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?php echo base_url('Auth'); ?>"><b>SIMUSER</b></a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    
                        <p class="login-box-msg">Login</p>
                    
                    <form action="<?php echo base_url('auth/cek_login') ?>" method="post">
                        <?php echo $this->session->flashdata('msg'); ?>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" name="user_name" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                    <!--<p><?php echo form_error('user_name'); ?></p>-->
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="passwd" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    <!--<p><?php echo form_error('passwd'); ?></p>-->
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group mb-3">
                            <!--<input type="text" class="form-control" placeholder="" name="">-->
                            <select class="custom-select">
                                <?php foreach ($puskesmas as $pusk): ?>
                                <option value="<?php echo $pusk->kode; ?>"><?php echo $pusk->nama; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa-ambulance"></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group mb-3"> 
                                <div class="input-group-append"> 
                                    <div id="captcha-img"><?php echo $captcha; ?></div>
                                    <input type="text" name="captcha" class="form-control" placeholder="Captcha" required>
                                    <a href="javascript:void(0);" class="refresh-captcha btn btn-info">
                                        <i class="fa fa-sync" aria-hidden="true"></i></a>
                                </div>
                        </div>  
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>

                            <!-- /.col -->
                        </div>
                        <div class="row">  
                            <div class="col-8">
                                <label><a href="<?php echo base_url('registrasi') ?>"> Registrasi User </a></label>
                            </div>  
                        </div>
                        <div class="row">   
                            <div class="col-10">  
                                <?php echo $this->session->flashdata('pesan'); ?>
                            </div>  
                        </div> 
                    </form>

                    <!--      <div class="social-auth-links text-center mb-3">
                            <p>- OR -</p>
                            <a href="#" class="btn btn-block btn-primary">
                              <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                            </a>
                            <a href="#" class="btn btn-block btn-danger">
                              <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                            </a>
                          </div>
                           /.social-auth-links 
                    
                          <p class="mb-1">
                            <a href="forgot-password.html">I forgot my password</a>
                          </p>
                          <p class="mb-0">
                            <a href="register.html" class="text-center">Register a new membership</a>
                          </p>-->
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

        <!--         jQuery 
                <script src="<?php echo base_url(); ?>html/assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
                 Bootstrap 4 
                <script src="<?php echo base_url(); ?>html/assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                 AdminLTE App 
                <script src="<?php echo base_url(); ?>html/assets/AdminLTE/dist/js/adminlte.min.js"></script>-->
        <?php $this->load->view("template/js") ?>
        <script>
            jQuery(document).ready(function () {
                jQuery('a.refresh-captcha').on('click', function () {
                    jQuery.get('<?php print base_url() . 'auth/refreshCaptcha'; ?>', function (data) {
                        jQuery('div#captcha-img').html(data);
                    });
                });
            });
        </script>

    </body>
</html>