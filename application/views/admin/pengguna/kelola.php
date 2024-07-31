<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Pendaftar</h3>
                </div>
                <div class="panel-body">
                    <button class="btn btn-warning" onclick="showAddModal()">+ Tambah</button>
                </div>
                <div class="panel-body">
                    <table class="display" id="data">
                        <thead>
                            <tr>
                                <th>Id Pembina</th>
                                <th>Nama Pembina</th>
                                <th>Jabatan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($set as $row) { ?>
                                <tr>
                                    <td><?php echo $row->id_pembina; ?></td>
                                    <td><?php echo $row->nama; ?></td>
                                    <td><?php echo $row->jabatan; ?></td>
                                    <td>
                                        <button class="btn btn-warning" onclick="edit_supplier(<?php echo $row->id_pembina; ?>, '<?php echo $row->nama; ?>', '<?php echo $row->jabatan; ?>')"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger" onclick="confirmDelete('<?php echo site_url('pengguna/destroy/' . $row->id_pembina); ?>')"><i class="fa fa-trash"></i> Hapus</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Pembina</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('', array('id' => 'form')); ?>
                <input type="hidden" name="id_pembina" id="modal_id_pembina" />

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" id="modal_nama" class="form-control">
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" id="modal_jabatan" class="form-control">
                </div>

                <div class="modal-footer">
                    <input type="submit" name="submit" value="Tambah" class="btn btn-success" id="modal_submit_button">
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Pembina</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('pengguna/update', array('id' => 'editForm')); ?>
                <input type="hidden" name="id_pembina" id="editId" />

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" id="editNama">
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" id="editJabatan">
                </div>

                <div class="modal-footer">
                    <input type="submit" name="submit" value="Simpan" class="btn btn-success">
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function showAddModal() {
        $('#form')[0].reset();
        $("#myModal").modal('show');
        $('.modal-title').text('Tambah Pembina');
        $('#modal_submit_button').val('Tambah');
        $('#form').attr('action', '<?php echo site_url('pengguna/create'); ?>');
    }

    function edit_supplier(id, nama, jabatan) {
        $('#editId').val(id);
        $('#editNama').val(nama);
        $('#editJabatan').val(jabatan);
        $('#editModal').modal('show');
    }

    function confirmDelete(url) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            window.location.href = url;
        }
    }

</script>
