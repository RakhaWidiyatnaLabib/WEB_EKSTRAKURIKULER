<!-- WRAPPER -->
<div id="wrapper">
	<!-- NAVBAR -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="brand">
			<a href="#"><b>SIE-MTsN2</b></a>
		</div>
		<div class="container-fluid">
			<div class="navbar-btn">
				<!--<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>-->
			</div>

			<?php if ($this->session->userdata('role') == 1) { ?>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">

						<li class="dropdown">

							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"> Admin</i>

							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url('login/signout'); ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>

					</ul>
				</div>
			<?php } else { ?>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">

						<li class="dropdown">

							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"> Siswa</i>

							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url('login/signout'); ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>

					</ul>
				</div>
			<?php } ?>
		</div>
	</nav>

	<!-- LEFT SIDEBAR -->
	<div id="sidebar-nav" class="sidebar">
		<div class="sidebar-scroll">
			<ul class="nav">
				<?php if ($this->session->userdata('role') == 1) { ?>
					<center>
						<img src="<?php echo base_url(); ?>assets/img/images.jpeg" alt="Logo SMAN 1 Tempuran" width="100" height="100" style="margin-bottom: 30px;">
					</center>

					<li>
						<a href="<?php echo site_url('admin');  ?>" class="<?php echo $this->uri->segment(2) == '' ? 'active open' : ''; ?>">
							<span>Beranda</span>
						</a>
					</li>
					<li>
						<a href="<?php echo site_url('admin/ekskul'); ?>" class="<?php echo $this->uri->segment(2) == 'ekskul' ? 'active open' : ''; ?>">
							<span>Data Ekstrakurikuler</span>
						</a>
					</li>

					<li>
						<a href="<?php echo site_url('admin/pengguna'); ?>" class="<?php echo $this->uri->segment(2) == 'pengguna' ? 'active open' : ''; ?>">
							<span>Daftar Pembina</span>
						</a>
					</li>

					<li>
						<a href="<?php echo site_url('admin/siswa'); ?>" class="<?php echo $this->uri->segment(2) == 'siswa' ? 'active open' : ''; ?>">
							<span>Data Anggota</span>
						</a>
					</li>

					

					<!--<li><a href="<?php echo site_url('admin/penjadwalan'); ?>" ><span>Penjadwalan</span></a></li>-->
					<!-- <li><a href="<?php echo site_url('admin/pengumuman'); ?>"><span>Pengumuman</span></a></li>
					<li><a href="<?php echo site_url('admin/laporan'); ?>"><span>Laporan</span></a></li>
					<li><a href="<?php echo site_url('admin/pengguna'); ?>"><span>Data Admin</span></a></li> -->
					<li><a href="<?php echo base_url('login/signout'); ?>"><span>Logout</span></a></li>
				<?php } else { ?>

					<li><a href="<?php echo site_url('user/register'); ?>"><span>Registrasi Ekskul</span></a></li>
					<li><a href="<?php echo site_url('user/galeri'); ?>"><span>Galeri Ekstrakurikuler</span></a></li>


				<?php } ?>
			</ul>
		</div>
	</div>
	<!-- END LEFT SIDEBAR -->