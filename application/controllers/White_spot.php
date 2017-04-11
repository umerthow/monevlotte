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
    $id = $this->session->userdata('id');
    $str_code = $this->session->userdata('str_code');
    $data['detail'] = $this->white_spot_m->get_detail_trans_temp($id,$str_code);




    $kategories = $this->weekly_m->get_list_kategori();
    $opt = array(''=>'All Store');
    $opt2 = array('11'=>'All Kategori');
    foreach ($kategories as  $value) {
         $opt[$value->str_cd] = $value->str_nm;
         $opt2[$value->l1_cd] = $value->l1_nm;
         
    }

       
    $data['form_store']= form_dropdown('',$opt,'','id="filter_store" class="form-control"');
    $data['form_kategori']= form_dropdown('',$opt2,'','id="filter_kategori" class="form-control"');

   
		$this->template->load('template', 'white_spot/index',$data);

	}


  public function save_edit_trc(){

    $column = $this->input->post('column');
    $noid_tsc = $this->input->post('id');
    $value= $this->input->post('editval');


     $updatenya = $this->db->query("UPDATE ttransc_ws_temp set " .$column. " = '".$value."' WHERE  noid_tsc =".$noid_tsc."") ;
     $updatenya =           $this->db->affected_rows();

     if($updatenya){
       $status = array("STATUS"=>"true","msg"=>"Success edit coloumn"); 
       echo json_encode ($status) ;

     }else {

       $status = array("STATUS"=>"false","msg"=>"Failed  Edit column"); 
        echo json_encode ($status) ;
     }
  }


  public function ajax_delete($id){

       $this->white_spot_m->delete_by_id($id);
        echo json_encode(array("STATUS"=>"true","msg"=>"Success delete data"));
  }


  public function delivery_rules(){
    $id = $this->session->userdata('id');
    $str_code = $this->session->userdata('str_code');
    $data['total_order'] = $this->white_spot_m->get_detail_trans_temp($id,$str_code);
    $data['total_transc'] = $this->input->post('total_order'); 

     $this->template->load('template', 'white_spot/delivery_step',$data);

     
  }


  public function ajax_list_product(){

    $list = $this->white_spot_m->get_datatables_prod();
    $data = array();
    $no = $_POST['start'];

     foreach ($list as $reports) {
            $no++;
            $row = array();
            $row[] = '<input type="checkbox" class="text-warning" name="id[]" value="'.$reports->prod_cd.'">';
            $row[] = $reports->prod_cd;
            $row[] = $reports->str_cd;
            $row[] = '<input type="text" name="str_cd" class="hidden" value="'.$reports->str_cd.'"> '.$reports->prod_nm;
            $row[] = $reports->l1_cd;
            $row[] = $reports->stk_qty;
            $row[] =  number_format($reports->sale_prc,2,',',',');
            $data[] = $row;

       }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->white_spot_m->count_all(),
                        "recordsFiltered" => $this->white_spot_m->count_filtered(),
                        "data" => $data,
                );
        //output to json format
       
          echo json_encode($output);
  }



  //datatables end


  public function insert_trans_temp(){
  
  
   $query =  $this->white_spot_m->save_trans();
   if($query) {

            $status = array("STATUS"=>"true","msg"=>"Success insert product"); 
            echo json_encode ($status) ;

   } else {

        $status = array("STATUS"=>"false","msg"=>"failed insert product"); 
            echo json_encode ($status) ;
   } 


  }



  public function ajax_list_white_spot(){

    $list = $this->white_spot_m->get_ws();
    $data = array();
    $no = $_POST['start'];

     foreach ($list as $reports) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] =  $reports->noid;
            $row[] = $reports->nama_toko;
            $row[] = $reports->no_card;
            $row[] = $reports->daerah;
            $row[] = $reports->alamat;
            $data[] = $row;

       }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->white_spot_m->count_all_wo(),
                        "recordsFiltered" => $this->white_spot_m->count_filtered_wo(),
                        "data" => $data,
                );
        //output to json format
       
          echo json_encode($output);

  }

  public function get_wo_detail(){

   $noid = $this->input->get('noid');
      $data = $this->white_spot_m->get_by_id_ws($noid);
      if($data){

         echo json_encode($data);

      } else {

         $status = array("STATUS"=>"nodata","msg"=>"Data tidak ditemukan! Store belum mengupload data periode ini."); 
         echo json_encode ($status) ;

      } 
  }







public function get_finish(){
  date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post
  $datetime_variable = new DateTime();
  $datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
  $user =$this->session->userdata('username');
  $id = $this->session->userdata('id');
  $str_code = $this->session->userdata('str_code');
  $data = array(

        
        'wsid'=>$this->input->post('wsid'),
        'nama_toko'=>$this->input->post('ws_name'),
        'no_cust'=>$this->input->post('no_card'),
        'from_store' =>$str_code,
        'alamat'=>$this->input->post('alamat'),
        'alamat_pengiriman'=>$this->input->post('send_alamat'),
        'telp' => $this->input->post('no_telp'),
        'email' => $this->input->post('email'),
        'delivery_type'=>$this->input->post('delivery'),
        'distance'=>$this->input->post('distance'),
        'ex_delivery'=>$this->input->post('result_info'),
        'payment_type'=>$this->input->post('payment'),
        'duration_payt'=>$this->input->post('top_duration'),
        'cc_number'=>$this->input->post('cc_number'),
        'total_trx' => $this->input->post('tot_trans'),
        'createdDate'=>$datetime_formatted,
        'createdBy'=>$user,

    );

  $grt_tx = $this->white_spot_m->insert_result_trans($data);

   $insert_id = $this->db->insert_id('trransc_ws_result');

   if($grt_tx) {

      
      $grt ['detail_trx'] = $this->white_spot_m->grt_detail_ts($insert_id);
      
     

      $this->white_spot_m->delete_temp($id,$str_code);
      

      echo redirect('white_spot/get_invoice/'.$insert_id);




  } else {

      $status = array("STATUS"=>"false","msg"=>"Transaction Failed!"); 
      echo json_encode ($status) ;

  }

}



public function get_invoice($insert_id){
if (empty ($insert_id)) {
  
 redirect('white_spot/transaction');
} else {

    $this->load->library('waktu');
    $data['detail_trx'] = $this->white_spot_m->get_DETAIL_TRX($insert_id);
    $data['detail_tail'] = $this->white_spot_m->get_detail_tail($insert_id);
    $data['detail_store'] = $this->white_spot_m->detail_store();
   $this->template->load('template', 'white_spot/get_invoice',$data);
}
}







public function rekap_transc(){
  $data['page_name'] = 'White Spot / White Spot Rekaptulasi Transaksi';

  $data['trasaksi'] = $this->white_spot_m->rekap_transaksi();
  $this->template->load('template', 'white_spot/rekapitulasi',$data);

}


public function event_white_spot(){


    $kategories = $this->weekly_m->get_list_kategori();
    $opt = array('06001'=>'All Store');
    $opt2 = array('11'=>'All Kategori');
    foreach ($kategories as  $value) {
         $opt[$value->str_cd] = $value->str_nm;
         $opt2[$value->l1_cd] = $value->l1_nm;
         
    }

       
 $data['form_store']= form_dropdown('',$opt,'','id="filter_store2" class="form-control"');
 // $data['form_store2']= form_dropdown('',$opt,'','name="filter_store2" class="form-control"');
 $data['form_kategori']= form_dropdown('',$opt2,'','id="filter_kategori" class="form-control"');

 $data['list_evt'] = $this->white_spot_m->get_ws_evt();
 $data['store_lokasi'] = $this->geolocation_m->get_list_store();
 $data['storex'] = $this->input->post('filter_store2');
 $this->template->load('template', 'white_spot/event_ws',$data);


}

public function insert_event_ws(){

   $query =  $this->white_spot_m->save_ws_event();
   if($query) {

            $status = array("STATUS"=>"true","msg"=>"Success insert product"); 
            echo json_encode ($status) ;

   } else {

        $status = array("STATUS"=>"false","msg"=>"failed insert product"); 
            echo json_encode ($status) ;
   } 


}


public function delete_evt($id){
       $this->db->where('noid', $id);
       $this->db->delete('tws_event');
       $delete = $this->db->affected_rows();
   if($delete) {
      echo json_encode(array("STATUS"=>"true","msg"=>"Success delete data"));
   
   } else {

       echo json_encode(array("STATUS"=>"false","msg"=>"Failed delete data"));
   }
}


public function save_edit_evt(){
    $column = $this->input->post('column');
    $noid_tsc = $this->input->post('id');
    $value= $this->input->post('editval');


     $updatenya = $this->db->query("UPDATE tws_event set " .$column. " = '".$value."' WHERE  noid =".$noid_tsc."") ;
     $updatenya =           $this->db->affected_rows();

     if($updatenya){
       $status = array("STATUS"=>"true","msg"=>"Success edit coloumn"); 
       echo json_encode ($status) ;

     }else {

       $status = array("STATUS"=>"false","msg"=>"Failed  Edit column"); 
        echo json_encode ($status) ;
     }

}



public function  insert_event_ws_chek(){
   
    
        $query =  $this->white_spot_m->save_ws_event_selected();

         // $output = array('data' => $data);
          if($query) {

            $status = array("STATUS"=>"true","msg"=>"Success insert product"); 
            echo json_encode ($status) ;

         } else {

        $status = array("STATUS"=>"false","msg"=>"failed insert product"); 
            echo json_encode ($status) ;
        } 
        
 
}


public function report_detail_trasaksi($id){
   $this->load->library('waktu');
    $data['detail_trx'] = $this->white_spot_m->get_DETAIL_TRX($id);
    $data['detail_tail'] = $this->white_spot_m->get_detail_tail($id);
    $data['id'] = $id;
    $this->template->load('template', 'white_spot/detail_report_ws',$data);

}


public function ajax_list_claim(){
    $percen = $this->input->post('percentance');
    $list = $this->ws_trans_m->get_datatables_shar();
    $data = array();
    $no = $_POST['start'];

     foreach ($list as $reports) {
            $no++;
            $row = array();
             $row[] = $no;
            $row[] = $reports->from_store;
          
            $row[] = $reports->prod_cd;
            $row[] = $reports->prod_nm;
            $row[] = $reports->qty_order;
            $row[] = number_format($reports->sale_prc,2,',',',');
            $row[] = number_format($reports->spec_prc,2,',',',');
            $row[] = number_format($reports->buy_incl,2,',',',');
            $row[] = number_format($reports->qty_order*$reports->buy_incl,2,',',',');
            $row[] =  number_format($reports->qty_order*$reports->buy_incl*$percen,2,',',',');
            $data[] = $row;

       }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->ws_trans_m->count_all(),
                        "recordsFiltered" => $this->ws_trans_m->count_filtered(),
                        "data" => $data,
                );
        //output to json format
       
          echo json_encode($output);
}




}


?>