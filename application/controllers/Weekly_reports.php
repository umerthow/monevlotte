<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Weekly_reports extends CI_Controller {
public function __construct(){

   parent:: __construct(); 
    
    if (! $this->session->userdata('is_login')){
            
             redirect('user/login');
             //echo site_url('dashboard/page_down')
        }
    

}


   public function cek(){
       $status = $this->db->query('select * from price_cek');
      $jadi= $status->result();
       echo json_encode($jadi);

   }

   public function index(){

        $kategories = $this->weekly_m->get_list_kategori();
        $opt = array(''=>'All Store');
        $opt2 = array(''=>'All Kategori');
        foreach ($kategories as  $value) {
         $opt[$value->str_cd] = $value->str_nm;
         $opt2[$value->l1_cd] = $value->l1_nm;
         
        }

       
        $data['form_store']= form_dropdown('',$opt,'','id="filter_store" class="form-control"');
        $data['form_kategori']= form_dropdown('',$opt2,'','id="filter_kategori" class="form-control"');
        $this->template->load('template', 'reports/weekly_report_view',$data);
    

   }

    

   public function ajax_list_weekly_reports(){

      $list = $this->weekly_m->get_datatables_weeklys();
         $data = array();
          $no = $_POST['start'];

         foreach ($list as $reports) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $reports->id_prod;
            $row[] = $reports->str_nm;
           
            $row[] = $reports->l1_nm;
            $row[] = $reports->prod_cd;
            $row[] = $reports->prod_nm;
            $row[] = $reports->str_cd;
            $row[] = $reports->sale_qty;
            $row[] = number_format($reports->sale_amt,2,',',',');
            $row[] = $reports->profit;
    
            $row[] = $reports->stk_qty;
            $row[] = number_format($reports->stk_camt,0,',',',');
            $row[] = number_format($reports->stk_samt,0,',','.');
            $row[] = number_format($reports->buy_prc,0,',',',');
            $row[] = number_format($reports->sale_prc,0,',',',');
            $row[] = $reports->rt;
            $row[] = $reports->scm1;
            $row[] = $reports->dis1;
            $row[] =  number_format($reports->prc1,0,',',',');
 
            $row[] = $reports->scm2;
            $row[] = $reports->dis2;
            $row[] = number_format($reports->prc2,0,',',',');
  
            $row[] = $reports->scm3;
            $row[] = $reports->dis3;
            $row[] =number_format($reports->prc3,0,',',',');
  
            $row[] = $reports->limit;
            $row[] = $reports->ea;
            $row[] = $reports->uom;
            $row[] = number_format($reports->harga_termurah,0,',',',');
            $row[] = number_format($reports->prc_reg,0,',',',');
            $row[] = number_format($reports->prc_lv_1,0,',',',');
            $row[] = number_format($reports->prc_lv_2,0,',',',');
            $row[] = number_format($reports->prc_lv_3,0,',',',');
            $row[] = $reports->qty_low;
            $row[] = number_format($reports->prc_low,0,',',',');
            $row[] = round($reports->index1).'%'; 
            $row[] = number_format($reports->prc_point,0,',',',');
            $row[] = round($reports->index2).'%'; 
            $row[] = $reports->coment;
            $row[] = $reports->status;
        
            $row[] = 'null';
      
            $row[] = $reports->coment;;
             
            $data[] = $row;

         }

         $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->weekly_m->count_all(),
                        "recordsFiltered" => $this->weekly_m->count_filtered(),
                        "data" => $data,
                );
        //output to json format
       
          echo json_encode($output);
   }


   //datatbles end

   public function insert_pricecek(){
      date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post
      $datetime_variable = new DateTime();
      $datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
      $id_prod = $this->input->post('prod_cd');

      //harusnya dicek store code dan id prod_cd nya kalau gak ada insert kalau ada update
      $cek_data = $this->weekly_m->get_by_prod_cd($id_prod);


      $this->db->from("price_compare");
      $this->db->where("id_prod", $id_prod);
      $count = $this->db->get()->num_rows();

       $data = array(

        'id_prod' =>$this->input->post('prod_cd'),
        'prod_cd' =>$this->input->post('prod_x'),
         'str_cd' => $this->input->post('str_cd'),
         'str_name' => $this->input->post('str_name'),
         'prc_reg' =>$this->input->post('prc_reg'),
         'prc_lv_1' =>$this->input->post('prc_lv1'),
         'prc_lv_2' => $this->input->post('prc_lv2'),
         'prc_lv_3'=> $this->input->post('prc_lv3'),
         'qty_low' => $this->input->post('qty_low'),
         'prc_low' => $this->input->post('prc_low'),
         'prc_point' =>$this->input->post('prc_point'),
         'updateDate' =>$datetime_formatted,
         'updatedBy' => $this->session->userdata('username'),
         'keterangan' =>$this->input->post('coment'),
         'status'=>1

         );

          if($count>0){

               $updatenya = $this->weekly_m->update_pricecek(array('id_prod' => $this->input->post('prod_cd')), $data) ;
                if($updatenya){
                     $status = array("STATUS"=>"true"); 
                     echo json_encode ($status);
                  } else {
                     $status = array("STATUS"=>"false"); 
                     echo json_encode ($status) ;
                  }

         } else {

        
          $data2 = array(
       
         'id_prod' =>$this->input->post('prod_cd'),
         'prod_cd' =>$this->input->post('prod_x'),
         'str_cd' => $this->input->post('str_cd'),
         'str_name' => $this->input->post('str_name'),
         'prc_reg' =>$this->input->post('prc_reg'),
         'prc_lv_1' =>$this->input->post('prc_lv1'),
         'prc_lv_2' => $this->input->post('prc_lv2'),
         'prc_lv_3'=> $this->input->post('prc_lv3'),
         'qty_low' => $this->input->post('qty_low'),
         'prc_low' => $this->input->post('prc_low'),
         'prc_point' =>$this->input->post('prc_point'),
        
         'createdBy' =>$this->session->userdata('username'),
         'updatedBy' => $this->session->userdata('username'),
         'updateDate' =>$datetime_formatted,
         'keterangan' =>$this->input->post('coment'),
         'status'=>1

         );
              $updatenya = $this->weekly_m->insert_pricecek($data2) ;
         
               $status = array("STATUS"=>"true"); 
               echo json_encode ($status);

         }
       
       

       
     
   }





   public function edit_pricecek($id){

      $data = $this->weekly_m->get_by_prod_cd($id);
      if($data){

         echo json_encode($data);

      } else {

         $status = array("STATUS"=>"false"); 
         echo json_encode ($status) ;

      }
      
   }

   public function cek_ajaxnya(){

   }


   public function uploadpricecek(){
    date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post
    $datetime_variable = new DateTime();
    $datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
    $namagroup['nama_group'] = $this->input->post('groupname');
    $namagroup['date'] =$datetime_formatted;


 $this->form_validation->set_rules('groupname','groupname','required');
 if($this->form_validation->run() == FALSE ){
      $data['page_name']= 'sms/tambahgroup';
      $this->load->view('main_layout',$data);
    
    }else {   
          $this->sms_m->insertgroup($namagroup);
          $config['upload_path'] = './temp_file/';
          $config['allowed_types'] = 'xls|xlsx';
          $config['max_size'] = '5000';//2mb
          $config['file_name'] = 'kontak.xls';
          $config['overwrite'] = true;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          $this->load->library('excel');

          if(!$this->upload->do_upload('attachkontak'))
          {
            $error = array('error' => $this->upload->display_errors());
                    //$this->test_excel($error);
                    $result = array(
                      'isSuccess' => false,
                      'message' => $this->upload->display_errors('', '')
                   );

            //
          
          }else {
             $inputFileName = './temp_file/kontak.xls';
             $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
             $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
             $settingParameter = $this->sms_m->ambil_group()->row();

             if(!empty($sheetData)){
              $kontakData = array();
              foreach ($sheetData as $rowNo => $row) {


              $nomor = str_replace("+62", "0", $row["B"]);
              $nomor = str_replace("'", "", $row["B"]);
              $nomor = str_replace("(", "", $row["B"]);
              $nomor = str_replace(")", "", $row["B"]);
              $nomor = str_replace(".", "", $row["B"]);
              $nomor = str_replace(" ", "", $row["B"]);
              if(!preg_match('/[^+0-9]/',trim($row["B"]))){
                        // cek apakah no hp karakter 1-3 adalah +62
                          if(substr(trim($nomor), 0, 3)=='+62'){
                            $nomor = trim($nomor);
                        }
                        // cek apakah no hp karakter 1 adalah 0
                        else if(substr(trim($nomor), 0, 1)=='0'){
                            $nomor = '+62'.substr(trim($nomor), 1);
                        }
                          // cek apakah no hp karakter 1 adalah 8
                         else if(substr(trim($nomor), 0, 1)=='8'){
                            $nomor = '+62'.substr(trim($nomor), 0);
                        }

                          else if(substr(trim($nomor), 0, 2)=='62'){
                            $nomor = '+'.substr(trim($nomor), 0);
                        }




                        $nomor = substr_replace($nomor,'0',0,3); 
                         
                    }


              //$nomor = substr_replace($nomor,'0',0,3);  

             if($rowNo == 1) continue;
              $temp = array(
                  "idgroup" => $settingParameter->id_group,
                  // "nama" => $row["D"],
                  "nama" => $row["A"],
                  "kontak" => $nomor,
                );      
               $kontakData[] = $temp;
             }
            
              if ($this->sms_m->import_kontak($kontakData)) {
                              $this->session->set_flashdata('berhasil', ' Data Group SMS  berhasil diupload');
                  redirect('sms_gateway/smsblast');
                          }
          }

    }
}

}

   }

?>