<!--<table border="1" cellpadding="8">-->
<div class="table-responsive">
    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nomor Permohonan</th>
                <th>Permohonan</th>
                <th>Tanggal Permohonan</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Puskesmas</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>

            <?php if (!empty($mohon)) { ?>
                <?php foreach ($mohon as $row): { ?>
                        <tr>
                            <td>
                                <?php echo $row->jenis_mohon_id ?>
                            </td>
                            <td>
                                <?php echo $row->jenis_mohon_trans ?>
                            </td>
                            <td>
                                <?php echo substr($row->tgl_mohon, 0, 10) ?>
                            </td>
                            <td>
                                <?php echo $row->nip ?>
                            </td>
                            <td>
                                <?php echo $row->nama ?>
                            </td>
                            <td>
                                <?php echo $row->jabatan ?>
                            </td>
                            <td>
                                <?php echo $row->nama_puskesmas ?>
                            </td>
                            <td>
                                <?php if ($row->status_id === '1') {
                                    echo 'Menunggu Persetujuan Atasan'
                                    ?>
                                <?php } elseif ($row->status_id === '2') { ?> 
                                    <?php echo 'Menunggu Persetujuan Admin User' ?>                                               
                                <?php } elseif ($row->status_id === '3') { ?>
                                    <?php echo 'Selesai' ?>
                                <?php } elseif ($row->status_id === '4') { ?>
                                    <?php echo 'Ditolak' ?>
                            <?php } ?>
                            </td>
        <?php } endforeach; ?>       

                </tr>
<?php } else { ?>
                <tr>
                    <td>
                        Data tidak ditemukan.
                    </td>
                </tr>
<?php } ?>

        </tbody>
    </table>
</div>
<script type="text/javascript">
            $(document).ready(function () {
                $('#dataTable').DataTable();
            });
        </script>