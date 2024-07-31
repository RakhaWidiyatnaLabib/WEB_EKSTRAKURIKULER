<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="brand">
            <a href="#"><b>WEBSITE PENDAFTARAN EKSKUL</b></a>
        </div>
        <div class="container-fluid">
            <div class="navbar-btn">
                <!--<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>-->
            </div>
            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"> 
                                <?php echo ($this->session->userdata('role') == 1) ? 'Admin' : 'Siswa'; ?>
                            </i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url('login/signout'); ?>">
                                    <i class="lnr lnr-exit"></i> <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- LEFT SIDEBAR -->
    <?php include 'menu.php'; ?>
    <!-- END LEFT SIDEBAR -->

    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <div class="panel-title">Pendaftaran Ekstrakurikuler regis</div>
                </div>
                <div class="panel-body">
                    <?php echo form_open('User/create'); ?>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>NISN</th>
                                    <td>: <input type="text" name="nisn" required></td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>: <input type="text" name="nama" required></td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td>: 
                                        <select name="kelas" required>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>: <textarea name="alamat" required></textarea></td>
                                </tr>
                                <tr>
                                    <th>Agama</th>
                                    <td>: 
                                        <select name="agama" required>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Konghucu">Konghucu</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Ektrakurikuler</th>
                                    <td>: 
                                        <select name="ekskul" required>
                                            <?php foreach ($set as $row) { ?>
                                            <option value="<?php echo $row->nama_ekskul; ?>"><?php echo $row->nama_ekskul; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td> :
                                        <select name="Jenis_kelamin" required>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Pria">Pria</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tempat Lahir</th>
                                    <td>: <input type="text" name="tempat_lahir" required></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td>: <input type="date" name="tanggal_lahir" required></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="panel-footer">*) Pramuka adalah Ekstrakurikuler Yang Wajib diambil</div>
            </div>

            <?php if (!empty($this->session->flashdata('notify'))) { ?>
                <div class="alert alert-info"><?php echo $this->session->flashdata('notify'); ?></div>
            <?php } ?>
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

            <!-- OVERVIEW -->
            <!-- <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Registrasi Ekskul</h3>
                    <p class="panel-subtitle">User / Registrasi Ekskul</p>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="display" id="data">
                            <thead>
                                <tr>
                                    <th>Nama Ekstrakurikuler</th>
                                    <th>Deskripsi</th>
                                    <th>Jadwal Ekskul</th>
                                    <th>Jumlah Pendaftar</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($set as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->nama_ekskul; ?></td>
                                        <td><?php echo $row->lokasi; ?></td>
                                        <td><?php echo $row->hari; ?>, <?php echo $row->jam_mulai; ?> - <?php echo $row->jam_selesai; ?></td>
                                        <td><?php echo $row->total; ?> Siswa</td>
                                        <td>
                                            <input type="checkbox" name="rombel" value="<?php echo $row->id_ekskul; ?>">
                                            <?php echo anchor('user/registered/' . $row->id_ekskul, 'Pilih', array('onclick' => 'return confirm("Anda yakin ingin mengikuti ekskul ini?")')); ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <button class="btn btn-warning"><i class="fa fa-check"></i> Daftar</button>
                    </div>
                </div>
            </div> -->
            <!-- END OVERVIEW -->
        </div>
    </div>
</div>