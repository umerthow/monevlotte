<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
public function __construct(){
    parent:: __construct(); 
    
    if (! $this->session->userdata('is_login')){
            
             redirect('user/login');
             //echo site_url('dashboard/page_down')
        }
    
    
    }


    public function index() {
        $this->template->load('template', 'dashboard1');
    }


    public function change_password_must(){
        $data['page_name'] = 'dashboard/passwordbaru';

         if (! $this->session->userdata('status')== '1'){
            $this->load->view('passwordchange',$data);
        } else {

            $this->index();

        }
        //$this->template->load('template', 'passwordchange');
    }

    public function ubah_password(){

         $this->template->load('template', 'ubah_password');

    }

    function dashboard1() {

    $this->template->load('template', 'dashboard1');
        
    }

    function form_general() {
        $this->template->load('template', 'general_form');
    }

    function form_advanced() {
        $this->template->load('template', 'form_advanced');
    }

    function form_validation() {
        $this->template->load('template', 'form_validation');
    }

    function form_wizard() {
        $this->template->load('template', 'form_wizard');
    }

    function form_upload() {
        $this->template->load('template', 'form_upload');
    }

    function form_button() {
        $this->template->load('template', 'form_button');
    }

    function table() {
        $this->template->load('template', 'table');
    }

    function table_dynamic() {
        $this->template->load('template', 'table_dynamic');
    }
    
    function contact() {
        $this->template->load('template', 'contact');
    }

    

    function weekly_report(){

        $this->template->load('template', 'table_dynamic');
    }

   
   function usermng(){
    $data['usernya'] =  $this->user_m->get_all_user();
     $data['karyawan'] = $this->user_m->get_all_karyawan();
    $this->template->load('template', 'user_mgnt',$data);
   }







}
