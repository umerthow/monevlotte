<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Event_m extends CI_Model {

	var $table = 'tview_events';
	var $column_order = array('id_evt','11_cd','prod_cd','prod_nm','ven_cd','str_cd','nama_event','detail_event','start_date','finish_date'); //set column field database for datatable orderable
	var $column_search = array('prod_cd','prod_nm','ven_cd','str_cd','nama_event');
	var $order = array('id_evt,str_cd' => 'desc');


	public function get_list_kategori(){

		 $this->db->select('product.str_cd,store.str_nm,product.l1_cd,product.l1_nm');
       	 $this->db->from('product');
       	 $this->db->join('store','store.str_cd = product.str_cd');
       	 $this->db->order_by('product.l1_nm','asc');
       	 $query = $this->db->get();
         $result = $query->result();
 
        
        return $result;
	}


	public function get_store_loc($prod_cd,$prod_cat){

		$this->db->select('product.str_cd,store.str_nm,product.l1_cd,product.l1_nm');
       	 $this->db->from('product');
       	 $this->db->join('store','store.str_cd = product.str_cd');
		$this->db->where('product.prod_cd', $prod_cd);
		$this->db->where('product.l1_cd', $prod_cat);
		return $this->db->get_where()->result();
 
	}

	//datatables model here

	private function _get_datatables_event_query(){

        if($this->input->post('filter_kategori'))
        {
            $this->db->where('l1_cd', $this->input->post('filter_kategori'));
        }

        if($this->input->post('filter_prod'))
        {
            $this->db->where('prod_cd', $this->input->post('filter_prod'));
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
	        $this->_get_datatables_event_query();
	        $query = $this->db->get();
	        return $query->num_rows();
	    }           

	  function count_all()
	    {
	        $this->db->from($this->table);
	        return $this->db->count_all_results();
	    }


	   function get_by_id($id)
	    {
	        $this->db->from('tevent');
	        $this->db->where('id_evt',$id);
	        $query = $this->db->get();
	 
	        return $query->row();
	    }

	public function get_datatables_events(){

		$this->_get_datatables_event_query();
         if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();

	} 



	//end datatables


	public function update_ev($where,$data){
		$this->db->update('tevent', $data, $where);
        return $this->db->affected_rows();

	}

	public function delete_by_id($id){
		 $this->db->where('id_evt', $id);
       	 $this->db->delete('tevent');
	}


}

?>