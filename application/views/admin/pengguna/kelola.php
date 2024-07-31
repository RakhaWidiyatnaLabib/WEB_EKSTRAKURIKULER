<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Pendaftar</h3>
                </div>
                <div class="panel-body">
                    <button class="btn btn-warning" onclick="add_supplier()">+ Tambah</button>
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
                                        <button class="btn btn-warning" onclick="edit_supplier(<?php echo $row->id_pembina; ?>)"><i class="fa fa-edit"></i> Edit</button>
                                        <?php echo anchor('pengguna/destroy/' . $row->id_pembina, '<button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>'); ?>
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

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog ">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Pembina</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('pengguna/create', array('id' => 'form')); ?>
                <input type="hidden" name="id_user" />

                <div class="form-group" id="nama">
                    <label>nama</label>
                    <input type="nama" name="nama" class="form-control">
                </div>

                <div class="form-group" id="jabatan">
                    <label>Jabatan</label>
                    <input type="nama" name="jabatan" class="form-control" id="jabatan">
                </div>

                <div class="modal-footer">
                    <input type="submit" name="submit" value="Tambah" class="btn btn-success" id="button-disabled">
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>