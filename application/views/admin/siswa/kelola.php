<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Sistem Informasi Ekstrakurikuler MTsN 2 Palangka Raya</h3>
                    <p class="panel-subtitle">Data Siswa</p>
                </div>

                <div class="panel-body">
                    <button class="btn btn-success" onclick="exportToPDF()">Export PDF</button>
                    <button class="btn btn-info" onclick="exportToExcel()">Export Excel</button>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="display" id="data">
                            <thead>
                                <tr>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Ekskul</th>
                                    <th>Kelas</th>
                                    <th>Alamat</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    <th>Agama</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = $this->uri->segment('3') + 1;
                                foreach ($set as $row) { ?>
                                    <?php $date = date_create($row->tanggal_lahir);
                                    $new_date = date_format($date, "d-F-Y"); ?>
                                    <tr>
                                        <td><?php echo $row->nisn; ?></td>
                                        <td><?php echo $row->nama; ?></td>
                                        <td><?php echo $row->ekskul; ?></td>
                                        <th><?php echo $row->kelas; ?></th>
                                        <th><?php echo $row->alamat; ?></th>
                                        <td><?php echo $row->tempat_lahir . ' - ' . date_format(date_create($row->tanggal_lahir), "d F Y"); ?></td>
                                        <th><?php echo $row->agama; ?></th>
                                        <td>
                                            <button class="btn btn-warning" onclick="editSupplier(<?php echo $row->id_siswa; ?>, '<?php echo $row->nisn; ?>', '<?php echo $row->nama; ?>', '<?php echo $row->ekskul; ?>', '<?php echo $row->kelas; ?>', '<?php echo $row->alamat; ?>', '<?php echo $row->tempat_lahir; ?>', '<?php echo $row->tanggal_lahir; ?>', '<?php echo $row->agama; ?>')"><i class="fa fa-edit"></i> Edit</button>
                                            <button class="btn btn-danger" onclick="confirmDelete('<?php echo site_url('siswa/destroy/' . $row->id_siswa); ?>')"><i class="fa fa-trash"></i> Hapus</button>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
    </div>
</div>

<script>
    function exportToPDF() {
        window.open("<?php echo site_url('siswa/export/pdf'); ?>", '_blank');
    }

    function exportToExcel() {
        window.open("<?php echo site_url('siswa/export/excel'); ?>", '_blank');
    }

    function confirmDelete(url) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            window.location.href = url;
        }
    }

    function editSupplier(id, nisn, nama, ekskul, kelas, alamat, tempat_lahir, tanggal_lahir, agama) {
        $('#myModal').modal('show');
        $('#form')[0].reset();
        $('.modal-title').text('Edit Siswa');
        $('input[name="id_siswa"]').val(id);
        $('input[name="nisn"]').val(nisn);
        $('input[name="nama"]').val(nama);
        $('select[name="ekskul"]').val(ekskul);
        $('select[name="ekskul"]').val(ekskul);
        $('input[name="alamat"]').val(alamat);
        $('input[name="tempat_lahir"]').val(tempat_lahir);
        $('input[name="tanggal_lahir"]').val(tanggal_lahir);
        $('input[name="agama"]').val(agama);

        $('#form').attr('action', '<?php echo site_url('siswa/update'); ?>');
        $('#button-disabled').val('Update');
    }
</script>

<!-- Modal untuk Edit Siswa -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Siswa</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('siswa/create', array('id' => 'form')); ?>
                <input type="hidden" name="id_siswa" />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" id="nisn">
                            <label>NISN</label>
                            <input type="text" name="nisn" class="form-control">
                        </div>

                        <div class="form-group" id="nama">
                            <label>Nama Siswa</label>
                            <input type="text" name="nama" class="form-control">
                        </div>

                        <div class="form-group" id="alamat">
                            <label>Alamat Siswa</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>

                        <div class="form-group" id="kelas">
                            <label>Kelas</label>
                            <select name="kelas" id="kelas" class="form-control">
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>

                        <!-- <div class="form-group" id="jekel">
                            <label>Jenis Kelamin</label>
                            <select name="Jenis_kelamin" id="jekel" class="form-control">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div> -->
                    </div>

                    <div class="col-md-6">
                        <div class="form-group" id="email">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control">
                        </div>

                        <div class="form-group" id="email">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control">
                        </div>

                        <div class="form-group" id="email">
                            <label>Agama</label>
                            <input type="text" name="agama" class="form-control">
                        </div>

                        <div class="form-group">
                            <?php
                            $tgl = date('Y-m-d'); { ?>
                                <input type="hidden" class="form-control" name="tanggal_daftar" required="" value="<?php echo $tgl; ?>">
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label for="">Ekstrakurikuler</label>
                            <select name="ekskul" id="" class="form-control">
                                <?php foreach ($dtbidang->result() as $row) { ?>
                                    <option value="<?php echo $row->id_ekskul; ?>"><?php echo $row->nama_ekskul; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit" value="Tambah" class="btn btn-success" id="button-disabled">
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>