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
            $row[] = $reports->noid_prc;
            $row[] = $reports->str_nm;
           
            $row[] = $reports->l1_nm;
            $row[] = $reports->prod_cd;
            $row[] = $reports->prod_nm;
            $row[] = $reports->str_cd;
            $row[] =  number_format($reports->buy_incl,2,',',',');
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
            $row[] = number_format($reports->harga_buyer,0,',',',');
            $row[] = round($reports->profit_buyer).'%';
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
      $this->db->where("noid_prc", $id_prod);
      $count = $this->db->get()->num_rows();

       $data = array(

        'noid_prc' =>$this->input->post('prod_cd'),
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
         'harga_buyer' => $this->input->post('harga_buyer'),
         'status'=>$this->input->post('konfirm')

         );

          if($count>0){

               $updatenya = $this->weekly_m->update_pricecek(array('noid_prc' => $this->input->post('prod_cd')), $data) ;
                if($updatenya){
                     $status = array("STATUS"=>"true"); 
                     echo json_encode ($status);
                  } else {
                     $status = array("STATUS"=>"false"); 
                     echo json_encode ($status);
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
         'status'=>$this->input->post('konfirm')

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

         $status = array("STATUS"=>"nodata","msg"=>"Data tidak ditemukan! Store belum mengupload data periode ini."); 
         echo json_encode ($status) ;

      }
      
   }

   public function cek_ajaxnya(){

   }


   public function pricecek_upload(){
   date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post
   $datetime_variable = new DateTime();
   $datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
   $tahun = $this->input->post('tahun');
   $bulan = $this->input->post('bulan');
   $periode = $this->input->post('periode');
   $config['upload_path'] = './temp_file/';
   $config['allowed_types'] = 'xls|xlsx';
   $config['max_size'] = '5000';//2mb
   $config['file_name'] = 'template_pc.xls';
   $config['overwrite'] = true;
   $this->load->library('upload', $config);
   $this->upload->initialize($config);
   $this->load->library('excel');

   if(!empty ($_FILES['filepricecek']['name'])){

     if($this->upload->do_upload('filepricecek'))
          {

             $inputFileName = './temp_file/template_pc.xls';
             $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
             $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
             if(!empty($sheetData)){
                   $priceData = array();
                    foreach ($sheetData as $rowNo => $row) {
                       if($rowNo == 1) continue;
                          $temp = array(
                        'tahun'    => $tahun,
                        'bulan'    => $bulan,
                        'periode'  => $periode,
                        'id_prod'  => ($row["B"].$row["C"]),
                        'prod_cd'  => $row["B"],
                        'str_cd'   => $this->session->userdata('str_code'),
                        'prc_reg'  => $row["D"],
                        'prc_lv_1' => $row["E"],
                        'prc_lv_2' => $row["F"],
                        'prc_lv_3' => $row["G"],
                        'qty_low'  => $row["H"],
                        'prc_low'  => $row["I"],
                        'prc_point' => $row["J"],
                        'createdBy' =>$this->session->userdata('username'),
                        'updatedBy' => $this->session->userdata('username'),
                        'updateDate' =>$datetime_formatted,
                        'status'    =>1
                      );      
                    
                     $priceData[] = $temp;
                    }

                     $updatenya = $this->weekly_m->import_pricecekk($priceData) ;
               
                      $status = array("STATUS"=>"true"); 
                      echo json_encode ($status);
          }
              else {

              $status = array("STATUS"=>"ytryrty"); 
              echo json_encode ($status) ;

          }


      } else {

             $status = array("STATUS"=>"false"); 
              echo json_encode ($status) ;

          }
   
   } else {

    $status = array("STATUS"=>"false"); 
     echo json_encode ($status) ;
   }

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



        public function mail_it(){

          $this->input->post('tahun');
          $this->input->post('bulan');
          $this->input->post('minggu');
          $this->input->post('filter_store');
          $this->input->post('filter_kategori');

          $ambildata = $this->weekly_m->get_datatables_mailit();

          if(count($ambildata)>0){
              $this->load->library('excel');
              $this->excel->setActiveSheetIndex(0);
              $this->excel->getActiveSheet()->setTitle('Price Cek LSI');

              // Set Paper Size
              $this->excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
              $this->excel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_FOLIO);
              $this->excel->getActiveSheet()->getPageSetup()->setScale(80);
              
              $this->excel->getActiveSheet()->getPageMargins()->setTop(0.75);
              $this->excel->getActiveSheet()->getPageMargins()->setRight(0.25);
              $this->excel->getActiveSheet()->getPageMargins()->setLeft(0.6);
              $this->excel->getActiveSheet()->getPageMargins()->setBottom(0.75);

              $BorderArray_01 = array('borders' => array('top' => array('style' => PHPExcel_Style_Border::BORDER_THIN), 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN), 'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN), 'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN)));
              $BorderArray_02 = array('borders' => array('top' => array('style' => PHPExcel_Style_Border::BORDER_THIN), 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE), 'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN), 'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN)));      
              $AllBorderArray = array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN));

              $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
              $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
              $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
              $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
              $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
              $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
              $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(10); 

              $ipos = 1; $ihead_start = 1; $ihead_end = 1;

              $this->excel->getActiveSheet()->setCellValue('A'.$ipos, 'DATA PRICE CEK ');
              $this->excel->getActiveSheet()->getStyle('A'.$ipos)->getFont()->setSize(11);
              $this->excel->getActiveSheet()->getStyle('A'.$ipos)->getFont()->setBold(true);

              $ipos++; $ipos++; $ihead_start = $ipos;
              $this->excel->getActiveSheet()->setCellValue('A'.$ipos, 'NO');
              $this->excel->getActiveSheet()->setCellValue('B'.$ipos, 'STR CD');
              $this->excel->getActiveSheet()->setCellValue('C'.$ipos, 'PROD CD');
              $this->excel->getActiveSheet()->setCellValue('D'.$ipos, 'PROD NAME');
              $this->excel->getActiveSheet()->setCellValue('E'.$ipos, 'REG PRICE');
              $this->excel->getActiveSheet()->setCellValue('F'.$ipos, 'HK');

              $ipos++; $ihead_end = $ipos;
              $this->excel->getActiveSheet()->setCellValue('A'.$ipos, '1');
              $this->excel->getActiveSheet()->setCellValue('B'.$ipos, '2');
              $this->excel->getActiveSheet()->setCellValue('C'.$ipos, '3');
              $this->excel->getActiveSheet()->setCellValue('D'.$ipos, '4');
              $this->excel->getActiveSheet()->setCellValue('E'.$ipos, '5');
              $this->excel->getActiveSheet()->setCellValue('F'.$ipos, '6');

              $this->excel->getActiveSheet()->getStyle('A'.$ipos.':F'.$ipos)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCCCCC');
              $this->excel->getActiveSheet()->getStyle('A'.$ihead_start.':F'.$ihead_end)->getBorders()->applyFromArray($AllBorderArray);
              
              $this->excel->getActiveSheet()->getStyle('A'.$ipos)->applyFromArray($BorderArray_02);
              $this->excel->getActiveSheet()->getStyle('B'.$ipos)->applyFromArray($BorderArray_02);
              $this->excel->getActiveSheet()->getStyle('C'.$ipos)->applyFromArray($BorderArray_02);
              $this->excel->getActiveSheet()->getStyle('D'.$ipos)->applyFromArray($BorderArray_02);
              $this->excel->getActiveSheet()->getStyle('E'.$ipos)->applyFromArray($BorderArray_02);
              $this->excel->getActiveSheet()->getStyle('F'.$ipos)->applyFromArray($BorderArray_02);



              $this->excel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(2);
              $n = 1; $ipos++; $iborder_start = $ipos; $isum_start = $ipos;

              foreach($ambildata as $key => $list){
                $this->excel->getActiveSheet()->setCellValue('A'.$ipos, $n);
                $this->excel->getActiveSheet()->setCellValue('B'.$ipos, $list['str_cd']);
                $this->excel->getActiveSheet()->setCellValue('C'.$ipos, ''.$list['prod_cd'].'');
                $this->excel->getActiveSheet()->setCellValue('D'.$ipos, $list['prod_nm']);
                $this->excel->getActiveSheet()->setCellValue('E'.$ipos, $list['sale_prc']);
                $this->excel->getActiveSheet()->setCellValue('F'.$ipos, $list['harga_buyer']);

                $n++; $ipos++;
              }

              $isum_end = $ipos - 1;

            $this->excel->getActiveSheet()->getStyle('A'.$iborder_start.':F'.$ipos)->getFont()->setSize(10);
           // $this->excel->getActiveSheet()->getStyle('A'.$iborder_start.':F'.$ipos)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
           // $this->excel->getActiveSheet()->getStyle('A'.$iborder_start.':F'.$ipos)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
            $this->excel->getActiveSheet()->getStyle('A'.$iborder_start.':F'.$ipos)->getAlignment()->setWrapText(true);

            $this->excel->getActiveSheet()->getStyle('A'.$iborder_start.':F'.$ipos)->getBorders()->applyFromArray($AllBorderArray);


                    $filename = urlencode("DataPriceCek-".date("Y-m-d").".xls");
                           
                          // header('Content-Type: application/vnd.ms-excel'); //mime type
                          // header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                          // header('Cache-Control: max-age=0'); //no cache
              
                   //unlink("./arsip/xls/".$filename.".xls");           
                   $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
                   $objWriter->save("./arsip/xls/".$filename);   

                   $this->sent_mail();
       


      } else {

         $status = array("STATUS"=>"false"); 
         echo json_encode ($status) ;
      }

    }



    public function sent_mail(){
      $subject='Usulan Data Price Cek Fry Food'.date("Y-m-d");
      $message='Mohon IT untuk mengupdate harga HK sesuai Price cek Terlampir<br/> Thanks. <br/>--- Please dont Reply- This is email automatic from System ---';
      $name = 'Dry Food Price Cek Update Request';
      $from_email = 'ahmad.umar.bbm@gmail.com';
      $email='ahmad.umar.bbm@gmail.com';
      $to_email = 'ahmad.umar@lottemart.co.id';

      $config = array();
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.gmail.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'monev.lsi@gmail.com';
            $config['smtp_pass'] = 'lotte321';
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes
            //$this->load->library('email', $config);
            
            $this->email->initialize($config); 
            
      $this->load->library('email');
      $this->email->set_newline("\r\n");
      $this->email->initialize($config);

      $this->email->from($from_email, $name);
      $this->email->to($to_email);
      $this->email->subject($subject);
      $this->email->message($message);
      
      //atachement file
      $filename = urlencode("DataPriceCek-".date("Y-m-d").".xls");

      $attachment = $this->email->attach('./arsip/xls/'.$filename);

       if($this->email->send())
                           {
                               $status = array("STATUS"=>"true","msg"=>"Success!.Email Berhasil dikirim."); 
                                echo json_encode ($status);
                           }
                           else
                          {

                           $error = show_error($this->email->print_debugger());
                           $status = array("STATUS"=>"false","msg"=>"ERROR!.Email Gagal dikirim.","error_msg"=>$error); 
                           echo json_encode ($status);
                          }

    }

   }

?>