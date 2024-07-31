<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Siswa extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('GlobalCrud','crud');
        $this->load->library('pdf');
        
    }

    function create(){
        $this->validation();
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('warning', "Komponen Siswa Wajib Diisi !");
            redirect('admin/siswa');
        } else {
            $query = array(
                'nis' => $this->input->post('nis'),
                'nama_siswa' => $this->input->post('nama_siswa'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'alamat' => $this->input->post('alamat'),
                'kelas' => $this->input->post('kelas'),
                'password' => $this->input->post('password'),
                'tanggal_daftar' => $this->input->post('tanggal_daftar'),
                'rombel' => $this->input->post('rombel')
            );
            $this->crud->insert('siswa', $query);
            $this->session->set_flashdata('success', "Data Siswa Berhasil Disimpan !");
            redirect('admin/siswa');
        }
    }

    function update(){
        $query = array(
            'nisn' => $this->input->post('nisn'),
            'nama' => $this->input->post('nama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'kelas' => $this->input->post('kelas'),
            'rombel' => $this->input->post('rombel')
        );
        $this->crud->update('siswa', $query, 'id_siswa', $this->input->post('id_siswa'));
        $this->session->set_flashdata('success', "Data Siswa Berhasil Diubah !");
        redirect('admin/siswa');
    }

    function destroy($id){
        $this->crud->delete('siswa', 'id_siswa', $id);
        $this->session->set_flashdata('success', "Data Siswa Berhasil Dihapus !");
        redirect('admin/siswa');
    }

    function validation(){
        $this->form_validation->set_rules('nisn', '', 'required');
        $this->form_validation->set_rules('nama_siswa', '', 'required');
        $this->form_validation->set_rules('tempat_lahir', '', 'required');
        $this->form_validation->set_rules('tanggal_lahir', '', 'required');
        $this->form_validation->set_rules('alamat', '', 'required');
        $this->form_validation->set_rules('kelas', '', 'required');
        $this->form_validation->set_rules('rombel', '', 'required');
    }

	function export($type) {
        $data['siswa'] = $this->crud->get('siswa')->result();

        if ($type == 'pdf') {
            $html = $this->load->view('pdf', $data, true); // View untuk data PDF
            $this->pdf->generate($html, 'data_siswa'); // Nama file PDF yang akan dihasilkan
        } else if ($type == 'excel') {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Set header
            $sheet->setCellValue('A1', 'NISN');
            $sheet->setCellValue('B1', 'Nama');
            $sheet->setCellValue('C1', 'Ekskul');
            $sheet->setCellValue('D1', 'Kelas');
            $sheet->setCellValue('E1', 'Tanggal Lahir');
            $sheet->setCellValue('F1', 'Agama');

            // Set data
            $rowNumber = 2;
            foreach ($data['siswa'] as $row) {
                $sheet->setCellValue('A' . $rowNumber, $row->nisn);
                $sheet->setCellValue('B' . $rowNumber, $row->nama);
                $sheet->setCellValue('C' . $rowNumber, $row->ekskul);
                $sheet->setCellValue('D' . $rowNumber, $row->kelas);
                $sheet->setCellValue('E' . $rowNumber, $row->tempat_lahir . ' - ' . date_format(date_create($row->tanggal_lahir), "d-F-Y"));
                $sheet->setCellValue('F' . $rowNumber, $row->agama);
                $rowNumber++;
            }

            $writer = new Xlsx($spreadsheet);
            $filename = 'data_siswa.xlsx';

            // Redirect output to a client’s web browser
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
            exit;
        }
    }   
}
