<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class masyarakat extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index
	 *	- or -
	 * 		http://example.com/index/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function beranda()
	{
		$this->load->view('masyarakat/beranda');
    }
    
	public function pengaduan()
	{
		$this->load->view('masyarakat/pengaduan');
	}
}
