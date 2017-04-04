<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	public function __construct(){

   parent:: __construct(); 
    
    if (! $this->session->userdata('is_login')){
            
             redirect('user/login');
             //echo site_url('dashboard/page_down')
        }
    

}

	


	public function create_event(){
		$kategories = $this->event_m->get_list_kategori();
        $opt = array(''=>'All Store');
        $opt2 = array(''=>'All Kategori');
        foreach ($kategories as  $value) {
         $opt[$value->str_cd] = $value->str_nm;
         $opt2[$value->l1_cd] = $value->l1_nm;
         
        }

       
        $data['form_store']= form_dropdown('',$opt,'','id="filter_store"   class="form-control"');
        $data['form_kategori']= form_dropdown('',$opt2,'','id="filter_kategori" name="cd_cat" class="form-control"');
		 $data['page']= 'event_baru';
		 $this->template->load('template', 'events/event_baru',$data);
		
	}


    public function all_event(){
        $kategories = $this->event_m->get_list_kategori();
        $opt2 = array(''=>'All Kategori');
        foreach ($kategories as  $value) {
         $opt[$value->str_cd] = $value->str_nm;
         $opt2[$value->l1_cd] = $value->l1_nm;
         
        }
         $data['form_kategori']= form_dropdown('',$opt2,'','id="filter_kategori" name="cd_cat" class="form-control"');
         $data['page']= 'Semua Event';
         $this->template->load('template', 'events/event_all',$data);
    }


    public function store_location(){

        $prod_cd = $this->input->post('prod_cd');
        $prod_cat =  $this->input->post('prod_cat');
        $price_ref = $this->input->post('ref_price');

        $data['prod_name'] = $this->event_m->get_store_loc_prod($prod_cd,$prod_cat);
        $data['ref_price'] = $price_ref;

         $data['storenya'] =  $this->event_m->get_store_loc($prod_cd,$prod_cat);

       
        $this->load->view('events/formtable_evt',$data);
      



    }


    public function insert_evt(){
       
        $ev_name = $this->input->post('ev_name');
        $prod_cd = $this->input->post('prod_cd');
        $str_cd = $this->input->post('str_cd');
        $event_start = $this->input->post('event_start');
        $event_end = $this->input->post('event_end');
        $description = $this->input->post('description');
        

       $count = count($_POST['options']);
      
       // for($i =1; $i<=$count;$i++) {
       
       //   echo $this->input->post('str_cd[]');

       //   echo '<br/>';

       //    $data = array (
       //      'id_prod' => ($this->input->post('str_cd['.$i.']').$prod_cd),
       //      'str_cd' => $this->input->post('str_cd['.$i.']'),
       //      'event_prc' => $this->input->post('prc_event['.$i.']'),
       //       'prod_cd' => $prod_cd,
       //       'nama_event' => $ev_name,
       //       'detail_event' => $description,
       //       'start_date' => $event_start,
       //       'finish_date' => $event_end

       //      );

       //     $this->db->insert('tevent', $data);

       //  }


       if(!empty ($_POST['options'])) {
         foreach ($_POST['options'] as $key) {

            
          $data = array_merge($key, array('prod_cd' => $prod_cd,
             'nama_event' => $ev_name,
             'detail_event' => $description,
             'start_date' => $event_start,
             'finish_date' => $event_end));

            $inserto = $this->db->insert('tevent', $data);


         }

     }
    if($inserto) {
        $this->session->set_flashdata('berhasil','Event berhasil ditambahkan. '); // $this->panel_user_m->input_evaluasi_3($data);
        redirect('Event/all_event');
    } else {
         $this->session->set_flashdata('error','Event Gagal ditambahkan! '); // $this->panel_user_m->input_evaluasi_3($data);
         redirect('Event/all_event');
        
    }
 

}

//datatables start here

public function ajax_list_all_events(){

     $list = $this->event_m->get_datatables_events();
     $data = array();
     $no = $_POST['start'];

     foreach ($list as $reports) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $reports->id_evt;
            $row[] = $reports->prod_cd;
            $row[] = $reports->prod_nm;
            $row[] = $reports->ven_cd;

            $row[] = $reports->buy_prc;
            $row[] = $reports->std_buy_prc;
            $row[] = $reports->sale_prc;
            $row[] = $reports->curr_sale_prc;
            $row[] = $reports->sale_stk_qty;
            $row[] = $reports->str_cd;
            $row[] = $reports->nama_event;
            $row[] = $reports->event_prc;
            $row[] = $reports->detail_event;
            $row[] = $reports->start_date;
            $row[] = $reports->finish_date;
            $data[] = $row;
        }

                $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->event_m->count_all(),
                        "recordsFiltered" => $this->event_m->count_filtered(),
                        "data" => $data,
                );

      echo json_encode($output);           


}

public function ajax_list_event_baru(){

     $list = $this->event_m->get_datatables_events();
     $data = array();
     $no = $_POST['start'];

     foreach ($list as $reports) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $reports->id_evt;
            $row[] = $reports->prod_cd;
            $row[] = $reports->prod_nm;
            $row[] = $reports->ven_cd;

            $row[] = $reports->buy_prc;
            $row[] = $reports->std_buy_prc;
            $row[] = $reports->sale_prc;
            $row[] = $reports->curr_sale_prc;
            $row[] = $reports->sale_stk_qty;
            $row[] = $reports->str_cd;
             $row[] = $reports->event_prc;
            $data[] = $row;
        }

                $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->event_m->count_all(),
                        "recordsFiltered" => $this->event_m->count_filtered(),
                        "data" => $data,
                );

      echo json_encode($output);           


}








public function edit_event($id){

    $data = $this->event_m->get_by_id($id);

    if($data){

         echo json_encode($data);

      } else {

         $status = array("STATUS"=>"false"); 
         echo json_encode ($status) ;

      }


}


public function proc_updateevent(){

    $id_evt = $this->input->post('evt_code');
    $id_prod = $this->input->post('prod_x');
    $str_cd = $this->input->post('str_cd');

    $data = array(
        'event_prc' => $this->input->post('prod_ev_prc'),
        'nama_event' =>  $this->input->post('ev_name'),
        'start_date' =>  $this->input->post('event_start'),
        'finish_date' =>  $this->input->post('event_end'),
        'detail_event' =>  $this->input->post('detail_evt')

        );


    $update_x = $this->event_m->update_ev(array('id_evt' => $id_evt), $data);

    if($update_x) {

         $status = array("STATUS"=>"true"); 
         echo json_encode ($status);

    } else {

         $status = array("STATUS"=>"false"); 
         echo json_encode ($status) ;
    }

}

public function ajax_delete($id){

     $this->event_m->delete_by_id($id);
    echo json_encode(array("status" => TRUE));

}

}


?>