<?php

if (defined('basepath')) exit('no direct access script allowed');

class Ekskul extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('GlobalCrud', 'crud');
	}

	public function create()
	{
		$this->validation();

		if ($this->form_validation->run() == FALSE) {
			$this->message = "Komponen Ekskul Wajib Diisi !";
			$this->session->set_flashdata('warning', $this->message);
			redirect('admin/ekskul');
		} else {
			// Mengumpulkan data dari form
			$query = array(
				'nama_ekskul' => $this->input->post('nama_ekskul'),
				'pembina' => $this->input->post('pembina'),
				'hari' => $this->input->post('hari'),
				'jam_mulai' => $this->input->post('jam_dimulai'),
				'jam_selesai' => $this->input->post('jam_selesai')
			);

			// Insert data ke tabel ekskul
			$this->crud->insert('ekskul', $query);

			// Set pesan sukses dan redirect
			$this->message = "Data Ekskul Berhasil Disimpan !";
			$this->session->set_flashdata('success', $this->message);
			redirect('admin/ekskul');
		}
	}

	public function update()
	{
		// Validasi input
		$this->validation();

		// Cek apakah validasi form berhasil
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('warning', "Komponen Ekstrakurikuler Wajib Diisi !");
			redirect('admin/ekskul');
		} else {
			// Ambil data dari form
			$query = array(
				'nama_ekskul' => $this->input->post('nama_ekskul'),
				'hari' => $this->input->post('hari'),
				'jam_mulai' => $this->input->post('jam_dimulai'), // Perhatikan penamaan field di form
				'jam_selesai' => $this->input->post('jam_selesai'),
				'pembina' => $this->input->post('pembina')
			);

			// Update data di database
			$this->crud->update('ekskul', $query, 'id_ekskul', $this->input->post('id_ekskul'));

			// Set pesan sukses
			$this->message = "Data Ekstrakurikuler Berhasil Diubah !";
			$this->session->set_flashdata('success', $this->message);

			// Redirect ke halaman eksekul
			redirect('admin/ekskul');
		}
	}

	function destroy($id)
	{
		$this->crud->delete('ekskul', 'id_ekskul', $id);
		$this->message = "Data Ekskul Berhasil Dihapus !";
		$this->session->set_flashdata('success', $this->message);
		redirect('admin/ekskul');
	}

	function validation()
	{
		$this->form_validation->set_rules('nama_ekskul', 'Nama Ekstrakurikuler', 'required');
		$this->form_validation->set_rules('hari', 'Hari', 'required');
		$this->form_validation->set_rules('jam_dimulai', 'Jam Dimulai', 'required');
		$this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required');
		$this->form_validation->set_rules('pembina', 'pembina', 'required');
	}
}
