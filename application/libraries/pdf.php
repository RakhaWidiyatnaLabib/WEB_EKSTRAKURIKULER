<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
use Mpdf\Mpdf;

class Pdf
{
    protected $ci;
    protected $mpdf;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->mpdf = new Mpdf();
    }

    public function generate($html, $filename = '', $stream = TRUE, $paper = 'A4', $orientation = 'portrait')
    {
        $this->mpdf->AddPage($orientation, '', '', '', '', 10, 10, 10, 10, 10, 10);
        $this->mpdf->WriteHTML($html);

        if ($stream) {
            $this->mpdf->Output($filename . ".pdf", "I");
        } else {
            $this->mpdf->Output(FCPATH . 'uploads/' . $filename . ".pdf", "F");
        }
    }
}
