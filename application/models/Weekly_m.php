<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Weekly_m extends CI_Model {

	var $table = 'price_compare_view';
    var $column_order = array('id_prod','str_nm','l1_cd','l1_nm','prod_cd','prod_nm','str_cd','sale_qty','sale_amt','profit','stk_qty','stk_camt',
                                'stk_samt','buy_prc','sale_prc','rt','scm1','dis1','prc1','scm2','dis2','prc2','scm3','dis3',
                                'prc3','limit','ea','uom','harga_termurah','prc_reg','prc_lv_1','prc_lv_2','prc_lv_3','qty_low','prc_low','index1',
                                'prc_point','index2','coment','status'); //set column field database for datatable orderable
    
    var $column_search = array('str_cd','prod_cd','prod_nm','str_nm','l1_cd','l1_nm'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('prod_cd,str_cd' => 'desc');

	 private function _get_datatables_weeks_query() {

        if($this->input->post('filter_store'))
        {
            $this->db->where('str_cd', $this->input->post('filter_store'));
        }

        if($this->input->post('filter_kategori'))
        {
            $this->db->where('l1_cd', $this->input->post('filter_kategori'));
        }

        if ($this->session->userdata('level') == '3' ) {

              $this->db->where('str_cd', $this->session->userdata('str_code'));


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
	        $this->_get_datatables_weeks_query();
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
	        $this->db->from($this->table);
	        $this->db->where('prod_cd',$id);
	        $query = $this->db->get();
	 
	        return $query->row();
	    }
	
	function get_datatables_weeklys(){

		$this->_get_datatables_weeks_query();
         if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();


	}

    public function get_list_kategori()
    {
        $this->db->select('str_cd,str_nm,l1_cd,l1_nm');
        $this->db->from($this->table);

        if ($this->session->userdata('level') == '3' ) {

              $this->db->where('str_cd', $this->session->userdata('str_code'));


        }

        $this->db->order_by('l1_nm','asc');
        $query = $this->db->get();
        $result = $query->result();
 
        
        return $result;
    }


    //--end datatables

    public function update_pricecek($where,$data){


        $this->db->update('price_compare', $data, $where);
        return $this->db->affected_rows();
    }


    public function insert_pricecek($data2){
        $this->db->insert('price_compare',$data2);

    }

    public function get_by_prod_cd($id){
         $this->db->from('tevent');
         $this->db->where('id_evt',$id);
         $query = $this->db->get();
     
         return $query->row();
    }
}

?>