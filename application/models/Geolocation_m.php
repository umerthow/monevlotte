<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geolocation_m extends CI_Model {


	public function get_list_store(){

		$this->db->select('str_cd,str_nm,addr1');
        $this->db->from('store');
        $this->db->where('corp_fg','06');
        $this->db->where('typ_fg','2');
        $this->db->order_by('str_cd','asc');
        $query = $this->db->get();
        $result = $query->result();
 
        
        return $result;
	}


	public function get_list_groupcd(){

		$this->db->select('grp_cd');
		$this->db->from('sd_custprod_2017');
		$this->db->where('grp_cd like "61%"');
		$this->db->group_by('grp_cd');
		$this->db->order_by('grp_cd','DESC');
		$query = $this->db->get();
        $result = $query->result();
        return $result;

	}

	public function query_whitespot(){
		if($this->input->post('filter_store'))
        {
            $this->db->where('str_cd', $this->input->post('filter_store'));
        }


        if ($this->session->userdata('level') == '3' ) {

              $this->db->where('str_cd', $this->session->userdata('str_code'));


        }

		$this->db->from('twhite_spot');
		$this->db->order_by('nama_toko','ASC');
	}

	public function get_white_spot(){
		

		$this->query_whitespot();
 		$query = $this->db->get();
		 return $query->result();
		
		
	}


	// public function get_store_specific($str_cd){
	// 	$this->db->select('cust_no,addr1,addr2,zip','str_cd');
 //        $this->db->from('tview_customer_map');
 //        $this->db->where('abc','A');
 //        $this->db->where('abc1','1');
 //        $this->db->where('c_grp','20');
 //        $this->db->where('str_cd',$str_cd);
 //        $this->db->order_by('cust_no','desc');
 //        $this->db->limit('10');
 //       return $this->db->get_where()->result();
       
	// }


	public function store_query(){
	
	$month = date('m');

			$this->db->query('SELECT z.* FROM
								(SELECT a.cust_no,b.`cust_nm`,COUNT(a.`sale_dy`) AS days, SUM(a.sale_amt) AS sale ,a.grp_cd,b.addr1,b.zip,b.cell_no
								FROM monevlotte.`sd_custprod_2017` a 
								INNER JOIN monevlotte.`customer` b ON a.cust_no = b.cust_no
								INNER JOIN monevlotte.`a1a2bc_cand1_2017_1` c ON a.cust_no = c.cust_no
								WHERE  (a.sale_dy >= CURDATE()-INTERVAL 3 MONTH) AND c.c_grp=20 AND c.abc="A" AND c.abc1=1 GROUP BY a.`cust_no`) z
								ORDER BY sale DESC 
								LIMIT 20');

			// if($this->input->post('grp_cd')){

			// 	 $this->db->where('a.grp_cd',$this->input->post('grp_cd'));
			// }

			// if($this->input->post('filter_cat')){

			// 	   $this->db->where('a.l1_cd', $this->input->post('filter_cat'));
			// }


			// $this->db->from('monevlotte.`sd_custprod_2017` a');
			// $this->db->join('customer b','a.cust_no = b.cust_no');
			// $this->db->join('a1a2bc_cand1_2017_1 c','c ON a.cust_no = c.cust_no');
			// $this->db->where('MONTH(a.sale_dy)',$month);
			// $this->db->where('c.c_grp','20');
			// $this->db->where('c.abc','A');
			// $this->db->where('c.abc1','1');
			// $this->db->group_by('a.`cust_no`')



			// $this->db->query('SELECT z.* FROM
			// 					(SELECT a.cust_no,b.`cust_nm`,COUNT(a.`sale_dy`) AS days, SUM(a.sale_amt) AS sale ,a.grp_cd,b.addr1,b.zip,b.cell_no
			// 					FROM monevlotte.`sd_custprod_2017` a 
			// 					INNER JOIN monevlotte.`customer` b ON a.cust_no = b.cust_no
			// 					INNER JOIN monevlotte.`a1a2bc_cand1_2017_1` c ON a.cust_no = c.cust_no
			// 					WHERE  MONTH(a.sale_dy) ='.$month.' AND c.c_grp=20 AND c.abc="A" AND c.abc1=1'.

			// 					if($this->input->post('grp_cd')){

			// 							 $this->db->where('a.grp_cd',$this->input->post('grp_cd'));
			// 							 'AND a.grp_cd = '.$this->input->post('grp_cd').''
			// 						}

			// 						if($this->input->post('filter_cat')){

			// 	   						$this->db->where('a.l1_cd', $this->input->post('filter_cat'));
			// 							'AND a.l1_cd = '.$this->input->post('filter_cat').''
			// 						}




			// 					.'GROUP BY a.`cust_no`) z
			// 					ORDER BY sale DESC 
			// 					LIMIT 20');

	}

	public function get_store_specific_5($str_cd){
		$cat = '';
		$grp_cd = '';
		//$this->store_query();
			if($this->input->post('grp_cd')){

				// $this->db->where('a.grp_cd',$this->input->post('grp_cd'));
				$grp_cd = "AND a.grp_cd=".$this->input->post('grp_cd')." ";
			}

			if($this->input->post('filter_cat')){

				  // $this->db->where('a.l1_cd', $this->input->post('filter_cat'));
				$cat = "AND a.l1_cd=".$this->input->post('filter_cat')."";

			}

			$month = date('m');
			$query = $this->db->query('SELECT z.* FROM
								(SELECT a.cust_no,b.`cust_nm`,COUNT(DISTINCT(a.`sale_dy`)) AS days, SUM(a.sale_amt) AS sale ,a.grp_cd,b.addr1,b.zip,b.cell_no
								FROM monevlotte.`sd_custprod_2017` a 
								INNER JOIN monevlotte.`customer` b ON a.cust_no = b.cust_no
								INNER JOIN monevlotte.`a1a2bc_cand1_2017_1` c ON a.cust_no = c.cust_no
								WHERE  (a.sale_dy >= CURDATE()-INTERVAL 3 MONTH) AND c.c_grp=20 AND c.abc="A" '.$cat.' '.$grp_cd.' AND c.abc1=1 GROUP BY a.`cust_no`) z
								ORDER BY sale DESC 
								LIMIT 20');
			return $query->result();
			
     

	}

	public function get_store_specific_2($str_cd,$cat){
		$month = date('m');
		$query = $this->db->query('SELECT z.* FROM
								(SELECT a.cust_no,b.`cust_nm`,COUNT(a.`sale_dy`) AS days, SUM(a.sale_amt) AS sale ,a.grp_cd,b.addr1,b.zip,b.cell_no
								FROM monevlotte.`sd_custprod_2017` a 
								INNER JOIN monevlotte.`customer` b ON a.cust_no = b.cust_no
								INNER JOIN monevlotte.`a1a2bc_cand1_2017_1` c ON a.cust_no = c.cust_no
								WHERE  MONTH(a.sale_dy) ='.$month.' AND c.c_grp=20 AND c.abc="A" AND a.l1_cd='.$cat.' AND c.abc1=1 GROUP BY a.`cust_no`) z
								ORDER BY sale DESC 
								LIMIT 20');
		return $query->result();

	}

	public function get_store_specific($str_cd){
		$month = date('m');
		$query = $this->db->query('SELECT z.* FROM
								(SELECT a.cust_no,b.`cust_nm`,COUNT(a.`sale_dy`) AS days, SUM(a.sale_amt) AS sale ,a.grp_cd,b.addr1,b.zip,b.cell_no
								FROM monevlotte.`sd_custprod_2017` a 
								INNER JOIN monevlotte.`customer` b ON a.cust_no = b.cust_no
								INNER JOIN monevlotte.`a1a2bc_cand1_2017_1` c ON a.cust_no = c.cust_no
								WHERE  MONTH(a.sale_dy) ='.$month.' AND c.c_grp=20 AND c.abc="A" AND c.abc1=1 GROUP BY a.`cust_no`) z
								ORDER BY sale DESC 
								LIMIT 20');
		return $query->result();
	}


	public function get_store_specific_3($str_cd,$cat,$grp_cd){
		$month = date('m');
		$query = $this->db->query('SELECT z.* FROM
								(SELECT a.cust_no,b.`cust_nm`,COUNT(a.`sale_dy`) AS days, SUM(a.sale_amt) AS sale ,a.grp_cd,b.addr1,b.zip,b.cell_no
								FROM monevlotte.`sd_custprod_2017` a 
								INNER JOIN monevlotte.`customer` b ON a.cust_no = b.cust_no
								INNER JOIN monevlotte.`a1a2bc_cand1_2017_1` c ON a.cust_no = c.cust_no
								WHERE  MONTH(a.sale_dy) ='.$month.' AND c.c_grp=20 AND c.abc="A" AND a.l1_cd='.$cat.' AND a.grp_cd='.$grp_cd.' AND c.abc1=1 GROUP BY a.`cust_no`) z
								ORDER BY sale DESC 
								LIMIT 20');
		return $query->result();

	}

		public function get_store_specific_4($str_cd,$cat,$grp_cd){
		$month = date('m');
		$query = $this->db->query('SELECT z.* FROM
								(SELECT a.cust_no,b.`cust_nm`,COUNT(a.`sale_dy`) AS days, SUM(a.sale_amt) AS sale ,a.grp_cd,b.addr1,b.zip,b.cell_no
								FROM monevlotte.`sd_custprod_2017` a 
								INNER JOIN monevlotte.`customer` b ON a.cust_no = b.cust_no
								INNER JOIN monevlotte.`a1a2bc_cand1_2017_1` c ON a.cust_no = c.cust_no
								WHERE  MONTH(a.sale_dy) ='.$month.' AND c.c_grp=20 AND c.abc="A" AND a.l1_cd='.$cat.' AND a.grp_cd='.$grp_cd.' AND c.abc1=1 GROUP BY a.`cust_no`) z
								ORDER BY sale DESC 
								LIMIT 20');
		return $query->result();

	}


	public function get_store_radius($str_cd){
		$this->db->select('str_cd,str_nm,addr1');
        $this->db->from('store');
		$this->db->where('str_cd',$str_cd);
		return $this->db->get()->row();
	}

	public function get_store_lok(){
		$this->db->select('str_cd,str_nm,addr1');
        $this->db->from('store');
        $this->db->order_by('str_nm','asc');
       return  $this->db->get()->result();

	}


	public function get_list_kategori(){

         $this->db->select('str_cd,str_nm,l1_cd,l1_nm');
         $this->db->from('price_compare_view');
         $this->db->group_by('l1_cd');
         $this->db->order_by('l1_nm','asc');
         $query = $this->db->get();
         $result = $query->result();
 
        $this->db->close();

        return $result;
	}


	public function query_cust(){

		$str_cd = $this->input->post('str_cd');

		if($this->input->post('idcat'))
        {
            $this->db->where('l1_cd', $this->input->post('idcat'));
        }

        if($this->input->post('grp_cd'))
        {
            $this->db->where('grp_cd', $this->input->post('grp_cd'));
        }

         if($this->input->post('custid'))
        {
            $this->db->where('cust_no', $this->input->post('custid'));
        }

       // $this->db->where('month(sale_dy)','03');
         $this->db->group_by('prod_cd');
         $this->db->from('sd_custprod_2017');

         $this->db->select('*,
         					SUM(IF(MONTH(`sale_dy`)=MONTH(CURDATE()),`sale_qty`,0)) sls_qty0,
         					SUM(IF(MONTH(`sale_dy`)=MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH)),`sale_qty`,0)) sls_qty1,	
         					SUM(IF(MONTH(`sale_dy`)=MONTH(DATE_ADD(CURDATE(),INTERVAL -2 MONTH)),`sale_qty`,0)) sls_qty2,

         					SUM(IF(MONTH(`sale_dy`)=MONTH(CURDATE()),`sale_amt`,0)) sls_m0,
         					SUM(IF(MONTH(`sale_dy`)=MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH)),`sale_amt`,0)) sls_m1,	
         					SUM(IF(MONTH(`sale_dy`)=MONTH(DATE_ADD(CURDATE(),INTERVAL -2 MONTH)),`sale_amt`,0)) sls_m2,
         	');
	}

	public function get_data_cust(){

		$this->query_cust();
		$query = $this->db->get();      

        return $query->result();

	}


	public function get_distributor(){

		$this->db->select('*');
		$this->db->from('tdistributor');
		
		if($this->input->post('filter_store') == '') {

			$this->db->where('str_cd','06022');

		}else {

			  $this->db->where('str_cd', $this->input->post('filter_store'));
		}

		$this->db->order_by('dist_name');
		$query = $this->db->get();
		 return $query->result();
	}


	public function save_whitespot($data){

		$this->db->insert('twhite_spot',$data);
	}

	public function delete_ws($id){

		$this->db->where('noid', $id);
		$this->db->delete('twhite_spot');
	}

}



?>