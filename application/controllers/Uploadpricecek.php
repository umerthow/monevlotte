<?php
defined('BASEPATH') OR exit('No direct script access allowed');


Class Uploadpricecek extends CI_Controller {

	public function index(){
		 $this->template->load('template', 'reports/form_upload_pricecek');	
		$this->template->load('template', 'form_upload_priccek');
	}

}

?>

