<?php
defined('BASEPATH') OR exit('No direct script access allowed');


Class User extends CI_Controller {
 
 public function login() {

        if ($this->session->userdata('is_login') ){
            
            
         if ($this->session->userdata('status') >0  ) {  

                 redirect('Welcome/dashboard1');


             } else {
                
                redirect('welcome/change_password_must');

             }


        } else {

            $data['page_name'] = 'dashboard/index';
             $this->load->view('login',$data);
        

        }

        
    }


    public function auth_login(){

         $user    =  $_POST['username'];
         $pass    =  $_POST['password'];

         $user= $this->user_m->get_by_username_password($user,$pass);

         if ($user)
            {
                $data_user = array(
                    'nama_lengkap' => $user->nama_lengkap,
                    'username' => $user->username,
                    'kode' => $user->code,
                    'alamat' => $user->alamat,
                    'str_code' => $user->store_cd,
                    'level' => $user->level,
                    'status' => $user->status,
                    'is_login' => TRUE
                    );

            $this->session->set_userdata($data_user);


            $status = array("STATUS"=>"true"); 
            echo json_encode ($status) ;

            } else {

                $status = array("STATUS"=>"gagal"); 
                 echo json_encode ($status) ;

            }

         
    }


    public function logout(){

        $data_user = array (
        'nama_lengkap',
        'username',
        'kode',
        'alamat',
        'str_code',
        'level',
        'status',
        'is_login',       
        );

        $this->session->unset_userdata($data_user);
        
        redirect('User/login');
    }

    public function get_karyawan(){
    	  $status = $this->user_m->get_all_karyawan();
            echo json_encode ($status) ;
    }

    public function ajax_list_user(){

    	$list = $this->user_m->get_datatables_user();
   		$data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $person->code;
            $row[] = $person->username;
            $row[] = $person->nama_lengkap;

   			if($person->level == 0) {

 				$row[] ='<span class="label label-default">no level</span>';

 			} else if ($person->level == 1 ){

 				$row[] ='<span class="label label-success">Administrator</span>';

 			} else if ($person->level == 2) {

 				$row[] = '<span class="label label-info">User HO</span>';

 			} else if ($person->level == 3) {

 				$row[] = '<span class="label label-primary">User Store</span>';

 			};        
          


            
            $row[] = $person->last_visit;
 			$row[] = $person->last_logout;
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary btn-xs" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->noid."'".')"><i class="glyphicon glyphicon-pencil"></i> </a>
                  <a class="btn btn-sm btn-danger btn-xs" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->noid."'".')"><i class="glyphicon glyphicon-trash"></i> </a>
                  <a class="btn btn-sm btn-info btn-xs" href="javascript:void(0)" title="Edit Password" onclick="edit_psswd('."'".$person->noid."'".')"><i class="glyphicon glyphicon-lock"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->user_m->count_all(),
                        "recordsFiltered" => $this->user_m->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);

    }

    public function add_user(){

    	$no = $this->input->post('emp_no');
    	$nomernya = $this->user_m->get_row_karyawan($no);
    	$username = $this->input->post('username');
    	$data = array(
    		'code' =>$nomernya->emp_no,
    		'store_cd' => $nomernya->str_cd,
    		'username'=> $this->input->post('username'),
    		'password' =>sha1($this->input->post('password')),
    		'nama_lengkap' => $nomernya->emp_nm,
    		'level'=>$this->input->post('level'),
    		'status'=>1

    		);

    	$cek_username = $this->user_m->get_cek_username($username);

        if(!$cek_username) {

            if($nomernya) {
            $this->user_m->insert_user($data);  
            $status = array("STATUS"=>"true"); 
            echo json_encode ($status) ;

             } else {
                        $status = array("STATUS"=>"gagal"); 
                        echo json_encode ($status) ;

        } 
    	
   
    } else {

            $status = array("STATUS"=>"ada"); 
             echo json_encode ($status) ;
        

        }
    	// $no = $this->input->post('emp_no');
    	// $status = array("STATUS"=>$no); 
    	// echo json_encode ($status) ;


    	
    }


    public function edit_user($id){
        $data = $this->user_m->get_by_id($id);
        echo json_encode($data);
    }


    public function update_password($id){
        $pass1 = $this->input->post('password');
        $pass2 = $this->input->post('password2');

    if($pass2 == $pass1) {

        $data = array(
          
            'password' => sha1($pass2),
            'status'=>1

            );

        $update =  $this->user_m->update_data_user(array('noid' => $id), $data);  

         if($update) {

         $status = array("STATUS"=>"true"); 
         echo json_encode ($status) ;
        
        }  
    } else {

         $status = array("STATUS"=>"false"); 
            echo json_encode ($status);

    }



    }


    public function update_user(){
        $id = $this->input->post('id');

        $data = array(
            'username'=> $this->input->post('username'),
            'level'=>$this->input->post('level')

            );

           $update =  $this->user_m->update_data_user(array('noid' => $this->input->post('id')), $data);  
    if($update) {
            $status = array("STATUS"=>"true"); 
            echo json_encode ($status) ;
        
    } else {
        $status = array("STATUS"=>"gagal"); 
                 echo json_encode ($status) ;
    }

    }

    public function ajax_delete($id){

        $this->user_m->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

 }

?>