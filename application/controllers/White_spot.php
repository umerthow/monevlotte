<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class White_spot extends CI_Controller {

   public function __construct(){

   parent:: __construct(); 
    
    if (! $this->session->userdata('is_login')){
            
             redirect('user/login');
             //echo site_url('dashboard/page_down')
        }
    

	}




	public function transaction(){

		  $this->template->load('template', 'white_spot/index');

	}


  public function delivery_rules(){
     $this->template->load('template', 'white_spot/delivery_step');

     
  }































}


?>