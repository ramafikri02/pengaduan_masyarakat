<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sistem extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('m_masyarakat');
        $this->load->model('m_admin');
    }

    public function preview()
    {
        $data['pengaduan'] = $this->m_admin->get_pengaduan_selesai();
        $this->load->view('cetak/preview', $data);
    }

    public function cetak_pdf()
    {
        ob_start();
        $data['pengaduan'] = $this->m_admin->get_pengaduan_selesai(); 
        $this->load->view('cetak/print_p', $data);
        $html = ob_get_contents();
        ob_end_clean();
        require './assets/html2pdf/autoload.php';
        $pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Pengaduan.pdf', 'D');
    }

    // public function cetak_pdf()
    // {
    //     $html_content = '<h3 align="center">Laporan Pengaduan</h3>';
    //     $html_content .= $this->m_admin->cetak_pdf_pengaduan();
    //     $this->pdf->loadHtml($html_content);
    //     $this->pdf->render();
    //     $this->pdf->stream("Data Pengaduan", array("Attachment" => 0));
    // }

    public function cetak_xls()
    {
        header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet");
        header('Content-Disposition: attachment; filename="Data Pengaduan.xls"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $data['pengaduan'] = $this->m_admin->get_pengaduan_selesai();
        $this->load->view('cetak/print_e', $data);
    }
}
