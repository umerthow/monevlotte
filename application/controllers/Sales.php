<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Sales extends CI_Controller {
public function __construct(){

   parent:: __construct(); 
    
    if (! $this->session->userdata('is_login')){
            
             redirect('user/login');
             //echo site_url('dashboard/page_down')
        }
    

}



public function index(){


// $kategories = $this->sales_m->get_list_kategori();

// $opt  = array(''=>'All Cust Group');
// $opt2 = array(''=>'All Cat Group');
// $opt3 = array(''=>'All Ven Group');
// $opt4 = array(''=>'All Group Cd');
// $opt5 = array(''=>'All Store Cd');

// 	foreach ($kategories as  $value) {

// 	$opt[$value->c_grp] = $value->c_grp;
// 	$opt2[$value->l1_cd] = $value->l1_cd;
// 	$opt3[$value->ven_cd] = $value->ven_cd;
// 	$opt4[$value->grp_cd] = $value->grp_cd;
// 	$opt5[$value->str_cd] = $value->str_cd;	

// 	}

//   $data['form_cgrp']= form_dropdown('',$opt,'','id="filter_cgrp" class="form-control"');
//   $data['form_l1cd']= form_dropdown('',$opt2,'','id="filter_l1_cd" class="form-control"');
//   $data['form_vencd']= form_dropdown('',$opt,'','id="filter_vencd" class="form-control"');
//   $data['form_grpcd']= form_dropdown('',$opt,'','id="filter_grpcd" class="form-control"');
//   $data['form_str_cd']= form_dropdown('',$opt,'','id="filter_strcd" class="form-control"');
 $kategories = $this->weekly_m->get_list_kategori();
        $opt = array(''=>'All Store');
        $opt2 = array('11'=>'All Kategori');
        foreach ($kategories as  $value) {
         $opt[$value->str_cd] = $value->str_nm;
         $opt2[$value->l1_cd] = $value->l1_nm;
         
        }

       
        $data['form_store']= form_dropdown('',$opt,'','id="filter_store" class="form-control"');
        $data['form_kategori']= form_dropdown('',$opt2,'','id="filter_kategori" class="form-control"');

$data['page']='aa';

  $this->template->load('template', 'reports/sales_cek',$data);

}

public function ajax_list_sales_report(){

	$list = $this->sales_m->get_datatables_sales();
    $data = array();
    $no = $_POST['start'];

     foreach ($list as $reports) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $reports->sale_dy;
            $row[] = $reports->str_cd;
            $row[] = $reports->c_grp;
            $row[] = $reports->l1_cd;
            $row[] = $reports->prod_cd;
            $row[] = $reports->prod_nm;
            $row[] = $reports->sale_qty;
            $row[] =  number_format($reports->buy_amt,2,',',',');
            $row[] =  number_format($reports->sale_amt,2,',',',');
            $row[] =  number_format($reports->profit,2,',',',');
            $data[] = $row;

       }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->sales_m->count_all(),
                        "recordsFiltered" => $this->sales_m->count_filtered(),
                        "data" => $data,
                );
        //output to json format
       
          echo json_encode($output);
}


public function export_it(){

   $this->input->post('c_grp');
   $this->input->post('ven_cd');
   $this->input->post('grp_cd');
   $this->input->post('filter_store');
   $this->input->post('filter_kategori');
   $this->input->post('start_date');
   $this->input->post('end_date');

   $ambildata = $this->sales_m->get_datatables_exportit();

    if(count($ambildata)>0){

   		$this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Sales Product LSI');
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
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(10); 
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(10); 
        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);  
        $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(35); 
        $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(10); 
        $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(10);
 		
 		$ipos = 1; $ihead_start = 1; $ihead_end = 1;

        $this->excel->getActiveSheet()->setCellValue('A'.$ipos, 'DATA SALES REPORT ');
        $this->excel->getActiveSheet()->getStyle('A'.$ipos)->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('A'.$ipos)->getFont()->setBold(true); 

        $ipos++; $ipos++; $ihead_start = $ipos;
        $this->excel->getActiveSheet()->setCellValue('A'.$ipos, 'NO');
        $this->excel->getActiveSheet()->setCellValue('B'.$ipos, 'SALE DY');
        $this->excel->getActiveSheet()->setCellValue('C'.$ipos, 'STR CD');
        $this->excel->getActiveSheet()->setCellValue('D'.$ipos, 'CUST GRP');
        $this->excel->getActiveSheet()->setCellValue('E'.$ipos, 'CUST TYPE');
        $this->excel->getActiveSheet()->setCellValue('F'.$ipos, 'CUST NO');
        $this->excel->getActiveSheet()->setCellValue('G'.$ipos, 'L1 CD');
        $this->excel->getActiveSheet()->setCellValue('H'.$ipos, 'L2 CO'); 
        $this->excel->getActiveSheet()->setCellValue('I'.$ipos, 'L3 CD');
        $this->excel->getActiveSheet()->setCellValue('J'.$ipos, 'L4 CD');
        $this->excel->getActiveSheet()->setCellValue('K'.$ipos, 'PROD CD');
        $this->excel->getActiveSheet()->setCellValue('L'.$ipos, 'PROD NAME');
        $this->excel->getActiveSheet()->setCellValue('M'.$ipos, 'SALE QTY');
        $this->excel->getActiveSheet()->setCellValue('N'.$ipos, 'BUY AMT');
        $this->excel->getActiveSheet()->setCellValue('O'.$ipos, 'SALE AMT');
        $this->excel->getActiveSheet()->setCellValue('P'.$ipos, 'DC AMT');
        $this->excel->getActiveSheet()->setCellValue('Q'.$ipos, 'VAT');
        $this->excel->getActiveSheet()->setCellValue('R'.$ipos, 'PROFIT');
        $this->excel->getActiveSheet()->setCellValue('s'.$ipos, 'VEN CD');
        $this->excel->getActiveSheet()->setCellValue('T'.$ipos, 'GRP CD');  

        $ipos++; $ihead_end = $ipos;

        $this->excel->getActiveSheet()->setCellValue('A'.$ipos, '1');
        $this->excel->getActiveSheet()->setCellValue('B'.$ipos, '2');
        $this->excel->getActiveSheet()->setCellValue('C'.$ipos, '3');
        $this->excel->getActiveSheet()->setCellValue('D'.$ipos, '4');
        $this->excel->getActiveSheet()->setCellValue('E'.$ipos, '5');
        $this->excel->getActiveSheet()->setCellValue('F'.$ipos, '6');
        $this->excel->getActiveSheet()->setCellValue('G'.$ipos, '7');
        $this->excel->getActiveSheet()->setCellValue('H'.$ipos, '8');
        $this->excel->getActiveSheet()->setCellValue('I'.$ipos, '9');
        $this->excel->getActiveSheet()->setCellValue('J'.$ipos, '10');
        $this->excel->getActiveSheet()->setCellValue('K'.$ipos, '11');
        $this->excel->getActiveSheet()->setCellValue('L'.$ipos, '12');
        $this->excel->getActiveSheet()->setCellValue('M'.$ipos, '13');
        $this->excel->getActiveSheet()->setCellValue('N'.$ipos, '14');
        $this->excel->getActiveSheet()->setCellValue('O'.$ipos, '15');
        $this->excel->getActiveSheet()->setCellValue('P'.$ipos, '16');
        $this->excel->getActiveSheet()->setCellValue('Q'.$ipos, '17');
        $this->excel->getActiveSheet()->setCellValue('R'.$ipos, '18');
        $this->excel->getActiveSheet()->setCellValue('s'.$ipos, '19');
        $this->excel->getActiveSheet()->setCellValue('T'.$ipos, '20');

        $this->excel->getActiveSheet()->getStyle('A'.$ipos.':T'.$ipos)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCCCCC');
        $this->excel->getActiveSheet()->getStyle('A'.$ihead_start.':T'.$ihead_end)->getBorders()->applyFromArray($AllBorderArray);

         $this->excel->getActiveSheet()->getStyle('A'.$ipos)->applyFromArray($BorderArray_02);
         $this->excel->getActiveSheet()->getStyle('B'.$ipos)->applyFromArray($BorderArray_02);
         $this->excel->getActiveSheet()->getStyle('C'.$ipos)->applyFromArray($BorderArray_02);
         $this->excel->getActiveSheet()->getStyle('D'.$ipos)->applyFromArray($BorderArray_02);
         $this->excel->getActiveSheet()->getStyle('E'.$ipos)->applyFromArray($BorderArray_02);
         $this->excel->getActiveSheet()->getStyle('F'.$ipos)->applyFromArray($BorderArray_02);
         $this->excel->getActiveSheet()->getStyle('G'.$ipos)->applyFromArray($BorderArray_02);
         $this->excel->getActiveSheet()->getStyle('H'.$ipos)->applyFromArray($BorderArray_02);
         $this->excel->getActiveSheet()->getStyle('I'.$ipos)->applyFromArray($BorderArray_02);
         $this->excel->getActiveSheet()->getStyle('J'.$ipos)->applyFromArray($BorderArray_02);
         $this->excel->getActiveSheet()->getStyle('K'.$ipos)->applyFromArray($BorderArray_02);
         $this->excel->getActiveSheet()->getStyle('L'.$ipos)->applyFromArray($BorderArray_02);
         $this->excel->getActiveSheet()->getStyle('M'.$ipos)->applyFromArray($BorderArray_02);
         $this->excel->getActiveSheet()->getStyle('N'.$ipos)->applyFromArray($BorderArray_02);
         $this->excel->getActiveSheet()->getStyle('O'.$ipos)->applyFromArray($BorderArray_02);
         $this->excel->getActiveSheet()->getStyle('P'.$ipos)->applyFromArray($BorderArray_02);
         $this->excel->getActiveSheet()->getStyle('Q'.$ipos)->applyFromArray($BorderArray_02);
         $this->excel->getActiveSheet()->getStyle('R'.$ipos)->applyFromArray($BorderArray_02);
         $this->excel->getActiveSheet()->getStyle('s'.$ipos)->applyFromArray($BorderArray_02);
         $this->excel->getActiveSheet()->getStyle('T'.$ipos)->applyFromArray($BorderArray_02);

         $this->excel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(2);
         $n = 1; $ipos++; $iborder_start = $ipos; $isum_start = $ipos;

         foreach($ambildata as $key => $list){

         	 	$this->excel->getActiveSheet()->setCellValue('A'.$ipos, $n);
		        $this->excel->getActiveSheet()->setCellValue('B'.$ipos, $list['sale_dy']);
		        $this->excel->getActiveSheet()->setCellValue('C'.$ipos," ".$list['str_cd']."", PHPExcel_Cell_DataType::TYPE_STRING);
		        $this->excel->getActiveSheet()->setCellValue('D'.$ipos," ".$list['c_grp']."", PHPExcel_Cell_DataType::TYPE_STRING);
		        $this->excel->getActiveSheet()->setCellValue('E'.$ipos," ".$list['c_typ']."", PHPExcel_Cell_DataType::TYPE_STRING);
		        $this->excel->getActiveSheet()->setCellValue('F'.$ipos," ".$list['cust_no']."", PHPExcel_Cell_DataType::TYPE_STRING);
		        $this->excel->getActiveSheet()->setCellValue('G'.$ipos," ".$list['l1_cd']."", PHPExcel_Cell_DataType::TYPE_STRING);
		        $this->excel->getActiveSheet()->setCellValue('H'.$ipos," ".$list['l2_cd']."", PHPExcel_Cell_DataType::TYPE_STRING);
		        $this->excel->getActiveSheet()->setCellValue('I'.$ipos," ".$list['l3_cd']."", PHPExcel_Cell_DataType::TYPE_STRING);
		        $this->excel->getActiveSheet()->setCellValue('J'.$ipos," ".$list['l4_cd']."", PHPExcel_Cell_DataType::TYPE_STRING);
		        $this->excel->getActiveSheet()->setCellValue('K'.$ipos," ".$list['prod_cd']."", PHPExcel_Cell_DataType::TYPE_STRING);
		        $this->excel->getActiveSheet()->setCellValue('L'.$ipos," ".$list['prod_nm']."", PHPExcel_Cell_DataType::TYPE_STRING);
		        $this->excel->getActiveSheet()->setCellValue('M'.$ipos, $list['sale_qty']);
		        $this->excel->getActiveSheet()->setCellValue('N'.$ipos, $list['buy_amt']);
		        $this->excel->getActiveSheet()->setCellValue('O'.$ipos, $list['sale_amt']);
		        $this->excel->getActiveSheet()->setCellValue('P'.$ipos, $list['dc_amt']);
		        $this->excel->getActiveSheet()->setCellValue('Q'.$ipos, $list['vat']);
		        $this->excel->getActiveSheet()->setCellValue('R'.$ipos, $list['profit']);
		        $this->excel->getActiveSheet()->setCellValue('s'.$ipos, " ".$list['ven_cd']."", PHPExcel_Cell_DataType::TYPE_STRING);
		        $this->excel->getActiveSheet()->setCellValue('T'.$ipos, " ".$list['grp_cd']."", PHPExcel_Cell_DataType::TYPE_STRING);

		        $n++; $ipos++;
         }

          $isum_end = $ipos - 1;


          $this->excel->getActiveSheet()->getStyle('A'.$iborder_start.':T'.$ipos)->getFont()->setSize(10);		
          $this->excel->getActiveSheet()->getStyle('A'.$iborder_start.':T'.$ipos)->getAlignment()->setWrapText(true);

          $this->excel->getActiveSheet()->getStyle('A'.$iborder_start.':T'.$ipos)->getBorders()->applyFromArray($AllBorderArray);

          $filename = urlencode("DataSalesReport-".$this->input->post('start_date')."-".$this->input->post('end_date').".xls");

          //$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  

          //$objWriter->save("./arsip/xls/".$filename);

          
			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
			$objWriter->save("./arsip/xls/".$filename);
			
			$path = base_url('arsip/xls/'.$filename.'');

			//$objWriter->save('php://output');
			 $status = array("STATUS"=>"true","msg"=>"Sukses Exporting data","location"=>$path); 
         		echo json_encode ($status) ;
       } else {

         $status = array("STATUS"=>"false","msg"=>"Gagal Mencetak Dalam Bentuk Excel"); 
         echo json_encode ($status) ;
      }  


 

}












}



?>