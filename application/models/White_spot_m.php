<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class White_spot_m extends CI_Model {

   var $table = '`str_prod`';
   var $column_order = array('prod_cd', 'str_cd','prod_nm','l1_cd', 'l1_nm', 'stk_qty', 'sale_prc');
   var $column_search = array('prod_cd','prod_nm'); //set column field database for datatable searchable just firstname , lastname , address are searchable
   var $order = array('prod_cd' => 'desc');

   var $table2 = '`twhite_spot`';
   var $column_order2 = array('id','noid','nama_toko', 'no_card','daerah','alamat');
   var $column_search2 = array('nama_toko','no_card'); //set column field database for datatable searchable just firstname , lastname , address are searchable
   var $order2 = array('no_card' => 'desc');
  //datatables

   public function _get_datatables_prod_query(){

   	if($this->input->post('filter_kategori'))
        {
            $this->db->where('l1_cd', $this->input->post('filter_kategori'));
        }

    if($this->input->post('filter_store2'))
        {
            $this->db->where('str_cd', $this->input->post('filter_store2'));
        }

     $this->db->from($this->table);
     $i = 0;

     foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

      if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
    
         }

   



   }

    function count_filtered()
	    {
	        $this->_get_datatables_prod_query();
	        $query = $this->db->get();
	        return $query->num_rows();
	    }   

    function count_all()
	    {
	        $this->db->from($this->table);
	        return $this->db->count_all_results();
	    }  


   public function get_datatables_prod(){

   	 $this->_get_datatables_prod_query();
      if($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
      $query = $this->db->get();
      return $query->result();
   }


   public function save_trans(){
   	date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post
    $datetime_variable = new DateTime();
    $datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
   	$prod_cd = $this->input->post('prod_cd');
    $str_cd = $this->input->post('str_cd');
    $user =$this->session->userdata('username');
    $id = $this->session->userdata('id');
    $str_code = $this->session->userdata('str_code');

   	$this->db->query('INSERT INTO `ttransc_ws_temp` (strid,prod_cd, prod_nm,stk_qty,stk_camt,sale_prc,createdBy,createdDate)
					SELECT '.$id.$str_code.' as strid, prod_cd, prod_nm,stk_qty,stk_camt,sale_prc,"'.$user.'" as createdBy, "'.$datetime_formatted.'" as createdDate FROM 
					'.$this->table.' 
					WHERE prod_cd='.$prod_cd.' AND str_cd='.$str_cd.'');

   	   return $this->db->affected_rows();
   }

  public function get_detail_trans_temp($id,$str_code){

  	$this->db->select('*');
  	$this->db->from('ttransc_ws_temp');
  	$this->db->where('strid',$id.$str_code);

  	return $this->db->get()->result();


  }

    function delete_by_id($id){
	   	 $this->db->where('noid_tsc', $id);
       	 $this->db->delete('ttransc_ws_temp');
	   }

  public function total_order(){



  }	  




//datatables 2

  public function _get_datatables_wo_query(){

  	 $this->db->from($this->table2);
     $i = 0;

     foreach ($this->column_search2 as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search2) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

      if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order2))
        {
            $order = $this->order2;
            $this->db->order_by(key($order), $order[key($order)]);
    
         }
  }

	function count_filtered_wo()
	    {
	        $this->_get_datatables_wo_query();
	        $query = $this->db->get();
	        return $query->num_rows();
	    }   

    function count_all_wo()
	    {
	        $this->db->from($this->table2);
	        return $this->db->count_all_results();
	    }  
  public function get_ws(){

  	 $this->_get_datatables_wo_query();
      if($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
      $query = $this->db->get();
      return $query->result();
  }  

 public function get_by_id_ws($noid){

 		$this->db->from($this->table2);
         $this->db->where('noid',$noid);
         $query = $this->db->get();
     
         return $query->row();
 }


//transaction finish



 public function insert_result_trans($data){

    //$this->db->trans_start();
    $this->db->insert('trransc_ws_result', $data);
    $insert_id = $this->db->insert_id();
    //$this->db->trans_complete();
  return $insert_id;
    //$this->grt_detail_ts($insert_id);

 }

  public function grt_detail_ts($insert_id){
  date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post
  $datetime_variable = new DateTime();
  $datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
  $prod_cd = $this->input->post('prod_cd');
  $str_cd = $this->input->post('str_cd');
  $user =$this->session->userdata('username');
  $id = $this->session->userdata('id');
  $str_code = $this->session->userdata('str_code');;

    $this->db->query('INSERT INTO `ttransc_ws_detail` (idx,strid,prod_cd, prod_nm,stk_qty,stk_camt,sale_prc,spec_prc,qty_order,createdBy,createdDate)
          SELECT '.$insert_id.' as idx , strid as strid, prod_cd, prod_nm,stk_qty,stk_camt,sale_prc,ifnull(spec_prc,0),ifnull(qty_order,0),createdBy, "'.$datetime_formatted.'" as createdDate FROM 
          ttransc_ws_temp 
          WHERE strid='.$id.$str_code.'');

       //return $insert_id;
       //return $this->db->affected_rows();

    //$this->get_DETAIL_TRX($insert_id);
 }

 public function get_DETAIL_TRX($insert_id){

    $this->db->select('*');
    $this->db->from('trransc_ws_result');
    $this->db->where('noid',$insert_id);
    return $this->db->get()->row();

 }

 public function get_detail_tail($insert_id){
    $this->db->select('*');
    $this->db->from('ttransc_ws_detail');
    $this->db->where('idx',$insert_id);
    $this->db->order_by('noid_tsc','asc');
    return $this->db->get()->result();
 }


 public function delete_temp($id,$str_code){

    $this->db->where('strid', $id.$str_code);
    $this->db->delete('ttransc_ws_temp');
 }

 public function rekap_transaksi(){
    $this->db->select('*');
    $this->db->from('trransc_ws_result');
      if ($this->session->userdata('level') == '3' ) {

              $this->db->where('from_store', $this->session->userdata('str_code'));


        }
    $this->db->order_by('createdDate','desc');
    return $this->db->get()->result();
 }


 public  function  get_ws_evt(){

    $this->db->select('*');
    $this->db->from('tws_event');

    if ($this->session->userdata('level') == '3' ) {

              $this->db->where('str_cd', $this->session->userdata('str_code'));


        }

    if($this->input->post('filter_store2'))
        {
          
            $this->db->where('str_cd', $this->input->post('filter_store2'));
        }   

    return $this->db->get()->result();



 }


 public function save_ws_event(){
    date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post
    $datetime_variable = new DateTime();
    $datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
    $prod_cd = $this->input->post('prod_cd');
    $str_cd = $this->input->post('str_cd');
    $user =$this->session->userdata('username');
    $id = $this->session->userdata('id');
    $str_code = $this->session->userdata('str_code');

    $this->db->query('INSERT INTO `tws_event` (str_cd,prod_cd,prod_nm,stk_qty,stk_camt,sale_prc,createdBy,createdDate)
          SELECT str_cd AS str_cd, prod_cd, prod_nm,stk_qty,stk_camt,sale_prc,"'.$user.'" AS createdBy, "'.$datetime_formatted.'" AS createdDate FROM 
          '.$this->table.' 
          WHERE prod_cd='.$prod_cd.' AND str_cd='.$str_cd.'');

       return $this->db->affected_rows();
   }


  public function save_ws_event_selected(){
    date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post
    $datetime_variable = new DateTime();
    $datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
    $prod_cd = $this->input->post('prod_cd');
    $str_cd = $this->input->post('str_cd');
    $user =$this->session->userdata('username');
    $id = $this->session->userdata('id');
    $str_code = $this->session->userdata('str_code');
    
    $data = array();

       foreach ($_POST['id'] as $key => $value) {
       
        $data[] = $value;

        } 
    
        $this->db->query('INSERT INTO `tws_event` (str_cd,prod_cd,prod_nm,stk_qty,stk_camt,sale_prc,createdBy,createdDate)
          SELECT str_cd AS str_cd, prod_cd, prod_nm,stk_qty,stk_camt,sale_prc,"'.$user.'" AS createdBy, "'.$datetime_formatted.'" AS createdDate FROM 
          '.$this->table.' 
         WHERE prod_cd IN('.implode(',', $data).')  AND str_cd='.$str_cd.'');

       return $this->db->affected_rows();

  }


  public function detail_store(){
    $str_code = $this->session->userdata('str_code');

    $this->db->select('*');
    $this->db->from('store ');
    $this->db->where('str_cd',$str_code);
     return $this->db->get()->row();
  }

 


}

?>