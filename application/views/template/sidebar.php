<?php if($this->session->userdata('jabatan_id')==='0'):?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!--<img src="<?php echo base_url(); ?>html/assets/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
                <img src="<?php echo base_url(); ?>html/assets/AdminLTE/dist/img/users_400x400.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $this->session->userdata('nama') ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                
                    <a href="<?php echo base_url('home') ?>" class="nav-link <?php if($this->uri->segment(1)=='home'||$this->uri->segment(1)==''){echo 'active';}?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <!--<i class="right fas fa-angle-left"></i>-->
                        </p>
                    </a>             
                    <!--                                            <ul class="nav nav-treeview">
                                                                  <li class="nav-item">
                                                                    <a href="<?php echo base_url(); ?>html/assets/AdminLTE/index.html" class="nav-link active">
                                                                      <i class="far fa-circle nav-icon"></i>
                                                                      <p>Dashboard v1</p>
                                                                    </a>
                                                                  </li>
                                                                  <li class="nav-item">
                                                                    <a href="<?php echo base_url(); ?>html/assets/AdminLTE/index2.html" class="nav-link">
                                                                      <i class="far fa-circle nav-icon"></i>
                                                                      <p>Dashboard v2</p>
                                                                    </a>
                                                                  </li>
                                                                  <li class="nav-item">
                                                                    <a href="<?php echo base_url(); ?>html/assets/AdminLTE/index3.html" class="nav-link">
                                                                      <i class="far fa-circle nav-icon"></i>
                                                                      <p>Dashboard v3</p>
                                                                    </a>
                                                                  </li>
                                                                </ul>-->
                    
                </li>
                <li class="nav-item has-treeview <?php if($this->uri->segment(1)=='registrasi' || $this->uri->segment(1)=='nonaktif'){echo 'menu-open';} ?>">
                    <a href="" class="nav-link <?php if($this->uri->segment(1)=='registrasi' || $this->uri->segment(1)=='nonaktif'){echo 'active';}?>">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Permohonan
                            <!--<span class="right badge badge-danger">New</span>-->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('registrasi') ?>" class="nav-link <?php if($this->uri->segment(1)=='registrasi'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengajuan User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Perubahan User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('nonaktif') ?>" class="nav-link <?php if($this->uri->segment(1)=='nonaktif'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penonaktifan User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?php if($this->uri->segment(1)=='sah'){echo 'menu-open';}?>">
                    <a href="" class="nav-link <?php if($this->uri->segment(1)=='sah'){echo 'active';}?>">
                        <i class="nav-icon fas fa-gavel"></i>
                        <p>
                            Pengesahan
                            <!--<span class="right badge badge-danger">New</span>-->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('sah') ?>" class="nav-link <?php if($this->uri->segment(1)=='sah'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengesahan Mohon</p>
                            </a>
                        </li>
                    </ul>          
                </li>
                <li class="nav-item has-treeview <?php if($this->uri->segment(1)=='monitoring'){echo 'menu-open';}?>">
                    <a href="" class="nav-link <?php if($this->uri->segment(1)=='monitoring'){echo 'active';}?>">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            Monitoring
                            <!--<span class="right badge badge-danger">New</span>-->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('monitoring/mohon') ?>" class="nav-link <?php if($this->uri->segment(2)=='mohon'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Monitoring Permohonan</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('monitoring/status') ?>" class="nav-link <?php if($this->uri->segment(2)=='status'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Informasi Status</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Logout
                            <!--<span class="right badge badge-danger">New</span>-->
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php elseif($this->session->userdata('jabatan_id')==='101' || $this->session->userdata('jabatan_id')==='102'):?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url(); ?>html/assets/AdminLTE/dist/img/users_400x400.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $this->session->userdata('nama') ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                
                    <a href="<?php echo base_url('home') ?>" class="nav-link <?php if($this->uri->segment(1)=='home'||$this->uri->segment(1)==''){echo 'active';}?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <!--<i class="right fas fa-angle-left"></i>-->
                        </p>
                    </a>             
                    <!--                                            <ul class="nav nav-treeview">
                                                                  <li class="nav-item">
                                                                    <a href="<?php echo base_url(); ?>html/assets/AdminLTE/index.html" class="nav-link active">
                                                                      <i class="far fa-circle nav-icon"></i>
                                                                      <p>Dashboard v1</p>
                                                                    </a>
                                                                  </li>
                                                                  <li class="nav-item">
                                                                    <a href="<?php echo base_url(); ?>html/assets/AdminLTE/index2.html" class="nav-link">
                                                                      <i class="far fa-circle nav-icon"></i>
                                                                      <p>Dashboard v2</p>
                                                                    </a>
                                                                  </li>
                                                                  <li class="nav-item">
                                                                    <a href="<?php echo base_url(); ?>html/assets/AdminLTE/index3.html" class="nav-link">
                                                                      <i class="far fa-circle nav-icon"></i>
                                                                      <p>Dashboard v3</p>
                                                                    </a>
                                                                  </li>
                                                                </ul>-->
                    
                </li>
                <li class="nav-item has-treeview <?php if($this->uri->segment(1)=='registrasi' || $this->uri->segment(1)=='nonaktif'){echo 'menu-open';} ?>">
                    <a href="" class="nav-link <?php if($this->uri->segment(1)=='registrasi' || $this->uri->segment(1)=='nonaktif'){echo 'active';}?>">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Permohonan
                            <!--<span class="right badge badge-danger">New</span>-->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('registrasi') ?>" class="nav-link <?php if($this->uri->segment(1)=='registrasi'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengajuan User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Perubahan User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('nonaktif') ?>" class="nav-link <?php if($this->uri->segment(1)=='nonaktif'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penonaktifan User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?php if($this->uri->segment(1)=='sah'){echo 'menu-open';}?>">
                    <a href="" class="nav-link <?php if($this->uri->segment(1)=='sah'){echo 'active';}?>">
                        <i class="nav-icon fas fa-gavel"></i>
                        <p>
                            Pengesahan
                            <!--<span class="right badge badge-danger">New</span>-->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('sah') ?>" class="nav-link <?php if($this->uri->segment(1)=='sah'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengesahan Mohon</p>
                            </a>
                        </li>
                    </ul>          
                </li>
                <li class="nav-item has-treeview <?php if($this->uri->segment(1)=='monitoring'){echo 'menu-open';}?>">
                    <a href="" class="nav-link <?php if($this->uri->segment(1)=='monitoring'){echo 'active';}?>">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            Monitoring
                            <!--<span class="right badge badge-danger">New</span>-->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('monitoring/mohon') ?>" class="nav-link <?php if($this->uri->segment(2)=='mohon'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Monitoring Permohonan</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('monitoring/status') ?>" class="nav-link <?php if($this->uri->segment(2)=='status'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Informasi Status</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Logout
                            <!--<span class="right badge badge-danger">New</span>-->
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php elseif($this->session->userdata('jabatan_id')===NULL):?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url(); ?>html/assets/AdminLTE/dist/img/users_400x400.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $this->session->userdata('nama') ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                
                    <a href="<?php echo base_url('home') ?>" class="nav-link <?php if($this->uri->segment(1)=='home'||$this->uri->segment(1)==''){echo 'active';}?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <!--<i class="right fas fa-angle-left"></i>-->
                        </p>
                    </a>             
                    <!--                                            <ul class="nav nav-treeview">
                                                                  <li class="nav-item">
                                                                    <a href="<?php echo base_url(); ?>html/assets/AdminLTE/index.html" class="nav-link active">
                                                                      <i class="far fa-circle nav-icon"></i>
                                                                      <p>Dashboard v1</p>
                                                                    </a>
                                                                  </li>
                                                                  <li class="nav-item">
                                                                    <a href="<?php echo base_url(); ?>html/assets/AdminLTE/index2.html" class="nav-link">
                                                                      <i class="far fa-circle nav-icon"></i>
                                                                      <p>Dashboard v2</p>
                                                                    </a>
                                                                  </li>
                                                                  <li class="nav-item">
                                                                    <a href="<?php echo base_url(); ?>html/assets/AdminLTE/index3.html" class="nav-link">
                                                                      <i class="far fa-circle nav-icon"></i>
                                                                      <p>Dashboard v3</p>
                                                                    </a>
                                                                  </li>
                                                                </ul>-->
                    
                </li>
                <li class="nav-item has-treeview <?php if($this->uri->segment(1)=='registrasi' || $this->uri->segment(1)=='nonaktif'){echo 'menu-open';} ?>">
                    <a href="" class="nav-link <?php if($this->uri->segment(1)=='registrasi' || $this->uri->segment(1)=='nonaktif'){echo 'active';}?>">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Permohonan
                            <!--<span class="right badge badge-danger">New</span>-->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
<!--                        <li class="nav-item">
                            <a href="<?php echo base_url('registrasi') ?>" class="nav-link <?php if($this->uri->segment(1)=='registrasi'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengajuan User</p>
                            </a>
                        </li>-->
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Perubahan User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('nonaktif') ?>" class="nav-link <?php if($this->uri->segment(1)=='nonaktif'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penonaktifan User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?php if($this->uri->segment(1)=='monitoring'){echo 'menu-open';}?>">
                    <a href="" class="nav-link <?php if($this->uri->segment(1)=='monitoring'){echo 'active';}?>">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            Monitoring
                            <!--<span class="right badge badge-danger">New</span>-->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('monitoring/mohon') ?>" class="nav-link <?php if($this->uri->segment(2)=='mohon'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Monitoring Permohonan</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('monitoring/status') ?>" class="nav-link <?php if($this->uri->segment(2)=='status'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Informasi Status</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Logout
                            <!--<span class="right badge badge-danger">New</span>-->
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php endif; ?>
