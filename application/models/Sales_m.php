<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Sales_m extends CI_Model {

var $table = '`sd_custprod_2017`';
var $column_order = array('sale_dy','str_cd','c_grp','l1_cd','prod_cd','prod_nm','sale_qty','buy_amt','sale_amt','profit');
var $column_search = array('str_cd','c_grp','l1_cd','prod_cd','prod_nm'); //set column field database for datatable searchable just firstname , lastname , address are searchable
var $order = array('prod_cd,str_cd' => 'desc');
public function get_list_kategori()
    {
        $this->db->select('str_cd,c_grp,l1_cd,ven_cd,grp_cd');
        $this->db->from($this->table);

        if ($this->session->userdata('level') == '3' ) {

              $this->db->where('str_cd', $this->session->userdata('str_code'));


        }

        $this->db->order_by('str_cd','asc');
        $query = $this->db->get();
        $result = $query->result();
 
        
        return $result;
    }







//datatables

  public function _get_datatables_sales_query(){


        if($this->input->post('c_grp')){
         $this->db->where('c_grp', $this->input->post('c_grp'));   
        }

        if($this->input->post('ven_cd')){
         $this->db->where('ven_cd', $this->input->post('ven_cd'));   
        }

        if($this->input->post('grp_cd')){
         $this->db->where('grp_cd', $this->input->post('grp_cd'));   
        }

        if($this->input->post('filter_store'))
        {
            $this->db->where('str_cd', $this->input->post('filter_store'));
        }

        if($this->input->post('filter_kategori'))
        {
            $this->db->where('l1_cd', $this->input->post('filter_kategori'));
        }

        if($this->input->post('date_start'))
        {
            $this->db->where('sale_dy >=', $this->input->post('date_start'));
        }

        if($this->input->post('date_end'))
        {
            $this->db->where('sale_dy <=', $this->input->post('date_end'));
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
	        $this->_get_datatables_sales_query();
	        $query = $this->db->get();
	        return $query->num_rows();
	    }   

 function count_all()
	    {
	        $this->db->from($this->table);
	        return $this->db->count_all_results();
	    }


  public function get_datatables_sales(){

  	$this->_get_datatables_sales_query();
      if($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
      $query = $this->db->get();
      return $query->result();

  }

  public function get_QUERY_HRE(){
  	 if($this->input->post('c_grp')){
         $this->db->where('c_grp', $this->input->post('c_grp'));   
        }

        if($this->input->post('ven_cd')){
         $this->db->where('ven_cd', $this->input->post('ven_cd'));   
        }

        if($this->input->post('grp_cd')){
         $this->db->where('grp_cd', $this->input->post('grp_cd'));   
        }

        if($this->input->post('filter_store'))
        {
            $this->db->where('str_cd', $this->input->post('filter_store'));
        }

        if($this->input->post('filter_kategori'))
        {
            $this->db->where('l1_cd', $this->input->post('filter_kategori'));
        }

        if($this->input->post('date_start'))
        {
            $this->db->where('sale_dy >=', $this->input->post('date_start'));
        }

        if($this->input->post('date_end'))
        {
            $this->db->where('sale_dy <=', $this->input->post('date_end'));
        }

         $this->db->from($this->table);

  }

 public function get_datatables_exportit(){

 		 $data = array();       
         $this->get_QUERY_HRE();

             $Q = $this->db->get();
            if($Q->num_rows() > 0){
            foreach ($Q->result_array() as $row){
            $data[] = $row;
             }
 			}

 		$Q->free_result();
         return $data;


}


}



?>