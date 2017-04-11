<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Ws_trans_m extends CI_Model {

   var $table = '`ttransc_ws_detail`';
   var $column_order = array('b.from_store', 'a.prod_cd','a.prod_nm','a.qty_order', 'a.sale_prc', 'a.spec_prc', 'c.buy_incl');
   var $column_search = array('a.prod_cd','a.prod_nm'); //set column field database for datatable searchable just firstname , lastname , address are searchable
   var $order = array('a.prod_cd' => 'desc');





public function _get_datatables_share_query(){

	if($this->input->post('filter_ven'))
        {
            $this->db->where('c.ven_cd', $this->input->post('filter_ven'));
        }

    if($this->input->post('filter_month'))
        {
            $this->db->where('month(a.createdDate)', $this->input->post('filter_month'));
        }

         $this->db->from('ttransc_ws_detail as a');
         $this->db->join('trransc_ws_result as b','a.idx=b.noid','left');
         $this->db->join('str_prod as c','c.prod_cd=a.prod_cd','left');

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
	        $this->_get_datatables_share_query();
	        $query = $this->db->get();
	        return $query->num_rows();
	    }   

    function count_all()
	    {
	        $this->db->from('ttransc_ws_detail as a');
         	$this->db->join('trransc_ws_result as b','a.idx=b.noid','left');
        	$this->db->join('str_prod as c','c.prod_cd=a.prod_cd','left');
	        return $this->db->count_all_results();
	    } 





public function get_datatables_shar(){
		$this->_get_datatables_share_query();
      if($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
      $query = $this->db->get();
      return $query->result();

}


}


?>