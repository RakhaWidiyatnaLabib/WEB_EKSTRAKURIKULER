<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel
{
    public function generate($data, $filename = 'data_siswa')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header di kolom pertama
        $sheet->setCellValue('A1', 'NISN');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Kelas');
        // ... tambahkan kolom sesuai kebutuhan

        // Isi data
        $row = 2; // Dimulai dari baris ke-2
        foreach ($data as $siswa) {
            $sheet->setCellValue('A' . $row, $siswa->nisn);
            $sheet->setCellValue('B' . $row, $siswa->nama);
            $sheet->setCellValue('C' . $row, $siswa->kelas);
            // ... tambahkan data sesuai kebutuhan
            $row++;
        }

        // Proses unduh file
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}
