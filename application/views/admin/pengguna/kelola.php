<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <?php echo $this->session->flashdata('notify'); ?>
            <?php echo validation_errors(); ?>
            <!-- OVERVIEW -->
            <div class="panel panel-headline">

                <div class="panel-heading">
                    <h3 class="panel-title">Data Pendaftar</h3>

                </div>
                <div class="panel-body">
                    <button class="btn btn-warning" onclick="add_supplier()">+ Tambah</button>
                    <a href="<?php echo base_url('admin/export_excel') ?>"></a> <?php echo anchor('admin/export_excel', '<button class="btn btn-info"> Export Excel</button>'); ?>

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

                            <?php $no = $this->uri->segment('3') + 1;
                            foreach ($set as $row) { ?>
                                <tr>
                                    <td><?php echo $row->id_pembina; ?></td>
                                    <td><?php echo $row->nama; ?></td>
                                    <td><?php echo $row->jabatan; ?></td>
                                    <td>
                                        <button class="btn btn-warning" onclick="edit_supplier(<?php echo $row->id_pembina; ?>)"><i class="fa fa-edit"></i> Edit</button>
                                        <?php echo anchor('pengguna/destroy/' . $row->id_pembina, '<button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>'); ?>
                                    </td>
                                </tr>
                            <?php $no++;
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- END MAIN CONTENT -->
        </div>
    </div>
</div>

<script>
    function add_supplier() {
        $('#form')[0].reset();
        $("#myModal").modal('show');
        $('.modal-title').text('Tambah Pengguna'); // Set title to Bootstrap modal title
        $('#passwordnew').css('display', 'none');
        $('#password').show();
        $('#pengguna').show();
        $('#pegawai').show();
        $('#email').show();
        $('#password label').text('Password');
        $('[name=submit]').val('Tambah').show();
        $('#form').attr('action', '<?php echo site_url('pengguna/create'); ?>');
        $('.modal-footer').show();
    }

    function edit_supplier(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo base_url('pengguna/get') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id_pembina"]').val(data.id_pembina);
                $('[name="nama_siswa"]').val(data.nama_siswa);
                $('[name="password"]').val(data.password);
                $('#password').css('display', 'none');
                $('#passwordnew').css('display', 'none');
                $('#confirm').css('display', 'none');
                $('#myModal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Pengguna'); // Set title to Bootstrap modal title
                $('[name=submit]').val('Edit').show();
                $('.modal-footer').show();
                $('#form').attr('action', '<?php echo site_url('pengguna/update'); ?>');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax' + jqXHR);
            }
        });
    }

    function reset(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo base_url('pengguna/get') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id_pembina"]').val(data.id_pembina);
                $('#pengguna').css('display', 'none');
                $('#nama_siswa').css('display', 'none');
                $('#password').show();
                $('#password label').text('Password Lama');
                $('#passwordnew').show();
                $('#confirm').css('display', 'none');
                $('#myModal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Reset Password'); // Set title to Bootstrap modal title
                $('[name=submit]').val('Reset').show();
                $('.modal-footer').show();
                $('#form').attr('action', '<?php echo site_url('pengguna/reset-password'); ?>');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax' + jqXHR);
            }
        });
    }
</script>

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