<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Error extends CI_Controller {

		Public function __construct(){

			parent::__construct();

		}



		public function index(){
				$data['heading'] = "Sorry but we couldn't find this page";
				$data['message'] = 'This page you are looking for does not exist.';
				$this->load->view('errors/html/error_404.php',$data);

		}
}

?>
