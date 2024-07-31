<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Sistem Informasi Ekstrakurikuler MTsN 2 Palangka Raya</h3>
                    <p class="panel-subtitle">Data Ekstrakurikuler</p>
                </div>
                <div class="panel-body">
                    <button class="btn btn-warning" data-toggle="modal" data-target="#myModal">+ Tambah</button>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="display" id="data">
                            <thead>
                                <tr>
                                    <th width="120px">ID Ekskul</th>
                                    <th width="220px">Nama Ekstrakurikuler</th>
                                    <th width="220px">Hari</th>
                                    <th width="220px">Jam</th>
                                    <th width="220px">Pembina</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($set as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->id_ekskul; ?></td>
                                        <td><?php echo $row->nama_ekskul; ?> </td>
                                        <td><?php echo $row->hari; ?></td>
                                        <td><?php echo $row->jam_mulai; ?> - <?php echo $row->jam_selesai; ?></td>
                                        <td><?php echo $row->pembina; ?></td>
                                        <td>
                                            <button class="btn btn-warning" onclick="edit_ekskul(<?php echo $row->id_ekskul; ?>, '<?php echo $row->nama_ekskul; ?>', '<?php echo $row->hari; ?>', '<?php echo $row->jam_mulai; ?>', '<?php echo $row->jam_selesai; ?>', '<?php echo $row->pembina; ?>')"><i class="fa fa-edit"></i> Edit</button>
                                            <button class="btn btn-danger" onclick="confirmDelete('<?php echo site_url('ekskul/destroy/' . $row->id_ekskul); ?>')"><i class="fa fa-trash"></i> Hapus</button>
                                        </td>
                                    </tr>
                                <?php } ?>
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
    function confirmDelete(url) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            window.location.href = url;
        }
    }
    function edit_ekskul(id, nama_ekskul, hari, jam_dimulai, jam_selesai, pembina) {
        $('#editId').val(id);
        $('#editNamaEkstrakurikuler').val(nama_ekskul);
        $('#editHari').val(hari);
        $('#editJamDimulai').val(jam_dimulai);
        $('#editJamSelesai').val(jam_selesai);
        $('#editPenanggungJawab').val(pembina);
        $('#editModal').modal('show');
    }
</script>

<!-- modal menambahkan ekskul -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Siswa</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('ekskul/create', array('id' => 'form')); ?>
                <input type="hidden" name="id_ekskul" />
                <div class="form-group">
                    <label>Nama Ekstrakurikuler</label>
                    <input type="text" name="nama_ekskul" class="form-control">
                </div>
                <div class="form-group">
                    <label>Hari</label>
                    <select name="hari" class="form-control">
                        <option value="senin">Senin</option>
                        <option value="selasa">Selasa</option>
                        <option value="rabu">Rabu</option>
                        <option value="kamis">Kamis</option>
                        <option value="jumat">Jumat</option>
                        <option value="sabtu">Sabtu</option>
                        <option value="minggu">Minggu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jam Dimulai</label>
                    <input type="time" name="jam_dimulai" class="form-control">
                </div>
                <div class="form-group">
                    <label>Jam Selesai</label>
                    <input type="time" name="jam_selesai" class="form-control">
                </div>
                <div class="form-group">
                    <label>Pembina</label>
                    <select name="pembina" class="form-control">
                        <?php foreach ($pembina as $row) { ?>
                            <option value="<?php echo $row->nama; ?>"><?php echo $row->nama; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit" value="Tambah" class="btn btn-success" id="button-disabled">
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal mengedit ekskul -->
<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Ekstrakurikuler</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('ekskul/update', array('id' => 'editForm')); ?>
                <input type="hidden" name="id_ekskul" id="editId" />
                <div class="form-group">
                    <label>Nama Ekstrakurikuler</label>
                    <input type="text" name="nama_ekskul" class="form-control" id="editNamaEkstrakurikuler">
                </div>
                <div class="form-group">
                    <label>Hari</label>
                    <select name="hari" class="form-control" id="editHari">
                        <option value="senin">Senin</option>
                        <option value="selasa">Selasa</option>
                        <option value="rabu">Rabu</option>
                        <option value="kamis">Kamis</option>
                        <option value="jumat">Jumat</option>
                        <option value="sabtu">Sabtu</option>
                        <option value="minggu">Minggu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jam Dimulai</label>
                    <input type="time" name="jam_dimulai" class="form-control" id="editJamDimulai">
                </div>
                <div class="form-group">
                    <label>Jam Selesai</label>
                    <input type="time" name="jam_selesai" class="form-control" id="editJamSelesai">
                </div>
                <div class="form-group">
                    <label>Pembina</label>
                    <select name="pembina" class="form-control" id="editPenanggungJawab">
                        <?php foreach ($pembina as $row) { ?>
                            <option value="<?php echo $row->nama; ?>"><?php echo $row->nama; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit" value="Simpan" class="btn btn-success">
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
