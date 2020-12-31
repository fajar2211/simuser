<!-- Modal -->
<div id="regModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Data berhasil simpan dan menunggu persetujuan oleh Kepala Puskesmas, silakan cek email Anda.</p>
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Logout Modal -->
<div id="logoutModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin akan keluar ?.</p>
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a class="btn btn-primary" href="<?php echo base_url('Auth/logout'); ?>">Logout</a>
      </div>
    </div>
  </div>
</div>

<!--<div id="regModalCekNIK" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <?php if ($this->session->flashdata('gagal')): { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('gagal'); ?>
                    </div>
                <?php } elseif ($this->session->flashdata('sukses')):{ ?>
                      <div class="alert alert-danger" role="alert">
			<?php echo $this->session->flashdata('gagal'); ?>
                    </div>
                <?php } endif; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>-->

<!-- Modal Sah Setuju Atasan -->
<div id="regModalSetuju" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url('sah/simpanSahAtasan') ?>">
          <input type="hidden" name="jenis_mohon_id" value="<?php echo $sah['jenis_mohon_id']; ?>">
      <div class="modal-body">
        <div class="row col-md-12"> 
            <div class="form-group">  
                <p style="text-align:center">Apakah Anda yakin akan menyetujui permohonan ini ?
                Masukkan alasan pengesahan permohonan.</p>
            </div>
        </div>
        <div class="row">   
            <div class="col-2">
                <label class="control-label col-xs-3" >Alasan</label>
            </div>    
                <div>
                    <select required name="alasan_sah_atasan" class="form-control">
                        <option value="" selected>-- Pilih --</option>
                        <option value="Permohonan sesuai dengan berkas lampiran">Permohonan sesuai dengan berkas lampiran</option>
                    </select>
                </div>
        </div>
          
      </div>
      <div class="modal-footer">
          <input type="hidden" name="petugas_sah_atasan" value="<?php echo $this->session->userdata('nama') ?>" />
          <input type="hidden" name="status_id" value="2" />
        <!--<button type="submit" class="btn btn-success" name="flag_sah_atasan" value="S" data-toggle="modal" data-target="#regModalTelahSetuju" id="telahsetuju"><i class="fa fa-check"></i> &nbsp; Ya</button>-->
        <button type="submit" class="btn btn-success" name="flag_sah_atasan" value="S"><i class="fa fa-check"></i> &nbsp; Ya</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> &nbsp; Tidak</button>
      </div>
      </form>    
    </div>
  </div>
</div>

<!-- Modal Sah Telah Setuju Atasan -->
<!--<div id="regModalTelahSetuju" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url('sah/simpanSahAtasan') ?>">
      <div class="modal-body">
        <div class="row col-md-12"> 
            <div class="form-group">  
                <p style="text-align:center">Data berhasil simpan, pengesahan permohonan telah disetujui.</p>
            </div>
        </div>
        
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> &nbsp; Keluar</button>
      </div>
      </form>    
    </div>
  </div>
</div>-->


<!-- Modal Sah Tolak Atasan -->
<div id="regModalTolak" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url('sah/simpanSahAtasanTolak') ?>">
          <input type="hidden" name="jenis_mohon_id" value="<?php echo $sah['jenis_mohon_id']; ?>">
      <div class="modal-body">
        <div class="row col-md-12"> 
            <div class="form-group">  
                <p style="text-align:center">Apakah Anda yakin akan menolak permohonan ini ?
                Masukkan alasan penolakan.</p>
            </div>
        </div>
        <div class="row">   
            <div class="col-2">
                <label class="control-label col-xs-3" >Alasan</label>
            </div>    
                <div>
                    <select required name="alasan_sah_atasan" class="form-control">
                        <option value="" selected>-- Pilih --</option>
                        <option value="Permohonan tidak sesuai dengan berkas lampiran.">Permohonan tidak sesuai dengan berkas lampiran.</option>
                    </select>
                </div>
        </div>
          
      </div>
      <div class="modal-footer">
          <input type="hidden" name="petugas_sah_atasan" value="<?php echo $this->session->userdata('nama') ?>" />
          <input type="hidden" name="status_id" value="4" />
        <button type="submit" class="btn btn-success" name="flag_sah_atasan" value="T"><i class="fa fa-check"></i> &nbsp; Ya</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> &nbsp; Tidak</button>
      </div>
      </form>     
    </div>
  </div>
</div>

<!-- Modal Sah Setuju Admin -->
<div id="regModalSetujuAdmin" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url('sah/simpanSahAdmin') ?>">    
          <input type="hidden" name="jenis_mohon_id" value="<?php echo $sah['jenis_mohon_id']; ?>">
      <div class="modal-body">
        <div class="row col-md-12"> 
            <div class="form-group">  
                <p style="text-align:center">Apakah Anda yakin akan menyetujui permohonan ini ?
                Masukkan alasan pengesahan permohonan.</p>
            </div>
        </div>
        <div class="row">   
            <div class="col-2">
                <label class="control-label col-xs-3" >Alasan</label>
            </div>    
                <div>
                    <select required name="alasan_sah_admin" class="form-control">
                        <option value="" selected>-- Pilih --</option>
                        <option value="Permohonan sesuai dengan berkas lampiran">Permohonan sesuai dengan berkas lampiran</option>
                    </select>
                </div>
        </div>
          
      </div>
      <div class="modal-footer">
          <input type="hidden" name="petugas_sah_admin" value="<?php echo $this->session->userdata('nama') ?>" />
          <input type="hidden" name="status_id" value="3" />
        <button type="submit" class="btn btn-success" name="flag_sah_admin" value="S"><i class="fa fa-check"></i> &nbsp; Ya</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> &nbsp; Tidak</button>
      </div>
      </form>  
    </div>
  </div>
</div>

<!-- Modal Sah Tolak Admin -->
<div id="regModalTolakAdmin" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url('sah/simpanSahAdminTolak') ?>">
          <input type="hidden" name="jenis_mohon_id" value="<?php echo $sah['jenis_mohon_id']; ?>">
      <div class="modal-body">
        <div class="row col-md-12"> 
            <div class="form-group">  
                <p style="text-align:center">Apakah Anda yakin akan menolak permohonan ini ?
                Masukkan alasan penolakan.</p>
            </div>
        </div>
        <div class="row">   
            <div class="col-2">
                <label class="control-label col-xs-3" >Alasan</label>
            </div>    
                <div>
                    <select required name="alasan_sah_admin" class="form-control">
                        <option value="" selected>-- Pilih --</option>
                        <option value="Permohonan tidak sesuai dengan berkas lampiran.">Permohonan tidak sesuai dengan berkas lampiran.</option>
                    </select>
                </div>
        </div>
          
      </div>
      <div class="modal-footer">
          <input type="hidden" name="petugas_sah_admin" value="<?php echo $this->session->userdata('nama') ?>" />
          <input type="hidden" name="status_id" value="4" />
        <button type="submit" class="btn btn-success" name="flag_sah_admin" value="T"><i class="fa fa-check"></i> &nbsp; Ya</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> &nbsp; Tidak</button>
      </div>
      </form>     
    </div>
  </div>
</div>