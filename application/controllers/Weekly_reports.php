<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Weekly_reports extends CI_Controller {



	public function cek(){
		 $status = $this->db->query('select * from price_cek');
		$jadi= $status->result();
		 echo json_encode($jadi);

	}

	public function index(){


        $this->template->load('template', 'reports/weekly_report_view');
    

	}

	 

	public function ajax_list_weekly_reports(){

		$list = $this->weekly_m->get_datatables_weeklys();
   		$data = array();
   		 $no = $_POST['start'];

         foreach ($list as $reports) {
         	$no++;
         	$row = array();
         	$row[] = $no;
         	$row[] = $reports->fg;
         	$row[] = $reports->l1_cd;
         	$row[] = $reports->l1_nm;
         	$row[] = $reports->prod_cd;
         	$row[] = $reports->prod_nm;
         	$row[] = $reports->sale_qty;
         	$row[] = $reports->sale_amt;
         	$row[] = $reports->profit;
         	$row[] = $reports->margin;
         	$row[] = $reports->ctr;
         	$row[] = $reports->stk_qty;
         	$row[] = $reports->stk_camt;
         	$row[] = $reports->stk_samt;
         	$row[] = $reports->buy_prc;
         	$row[] = $reports->sale_prc;
         	$row[] = $reports->rt;
         	$row[] = $reports->scm1;
         	$row[] = $reports->dis1;
         	$row[] = $reports->prc1;
         	$row[] = $reports->rt1;
         	$row[] = $reports->scm2;
         	$row[] = $reports->dis2;
         	$row[] = $reports->prc2;
         	$row[] = $reports->rt2;
         	$row[] = $reports->scm3;
         	$row[] = $reports->dis3;
         	$row[] = $reports->prc3;
         	$row[] = $reports->rt3;
         	$row[] = $reports->limit;
         	$row[] = $reports->ea;
         	$row[] = $reports->uom;
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

	}

?>