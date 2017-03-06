<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_m extends CI_Model {

	var $table = 'tuser';
    var $column_order = array('code','username','nama_lengkap','level','last_visit','last_logut','Action'); //set column field database for datatable orderable
    var $column_search = array('code','username','nama_lengkap'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('noid' => 'desc');

	public function get_by_username_password($username, $password){

		$user =  $this->db->get_where('tuser',
		
		array(
				'username'=>$username,
				'password'=>sha1($password),
				)
				
			)->row();
		
			
			return $user;
			
		}

	public function get_all_user() {

		$this->db->select('*');
		$this->db->from('tuser');
		$this->db->order_by('noid','desc');
		return $this->db->get()->result();
	}

	public function query_karyawan(){

		if ($this->forum = $this->load->database("forum",TRUE));   
			$this->forum->reconnect();
			$this->forum->select('*');
			$this->forum->from('employee');

	}

	public function get_all_karyawan(){
		if ($this->forum = $this->load->database("forum",TRUE));   
			$this->forum->reconnect();
		
			$this->forum->select('*');
			$this->forum->from('employee');
			$this->forum->order_by('emp_no','desc');
			return $this->forum->get()->result();

	}

	public function get_row_karyawan($no){
		$this->query_karyawan();
		$this->forum->where('emp_no',$no );
	
		return $this->forum->get()->row();
	}

	public function insert_user($data){
		$this->db->insert($this->table, $data);
        return $this->db->insert_id();
	}


	public function update_data_user($where,$data){

		 $this->db->update($this->table, $data, $where);
		  return $this->db->affected_rows();
	}



	//datatables


	   private function _get_datatables_query()
    	{
         
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
	        $this->_get_datatables_query();
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
	        $this->db->where('noid',$id);
	        $query = $this->db->get();
	 
	        return $query->row();
	    }


	   function delete_by_id($id){
	   	 $this->db->where('noid', $id);
       	 $this->db->delete($this->table);
	   }	    






	 function get_datatables_user(){

		 $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
	}

	function get_cek_username($username){

		$user =  $this->db->get_where('tuser',
		
		array(
				'username'=>$username,
				)
				
			)->row();
		
			
			return $user;

	}
	

}

?>