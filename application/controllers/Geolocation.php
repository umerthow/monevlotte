<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geolocation extends CI_Controller {

public function __construct(){
    parent:: __construct(); 
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    if (! $this->session->userdata('is_login')){
            
             redirect('user/login');
             //echo site_url('dashboard/page_down')
        }
    
    
    }





	public function show_all(){
	$kategories = $this->geolocation_m->get_list_store();
    $opt = array(''=>'Pilih Store');
        
     	foreach ($kategories as  $value) {
        $opt[$value->str_cd] = $value->str_nm;
  //       $marker = array();
		// $marker['position'] = 'LOTTEMART WHOLESALE '.$value->str_nm.'';
		// $marker['infowindow_content'] = ' LOTTEMART WHOLESALE '.$value->str_nm;
		// $marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
		// $this->googlemaps->add_marker($marker);


        }

		$data['form_store']= form_dropdown('',$opt,'','id="filter_store" name="filter_store" class="form-control"');	


		
		$config['center'] = '-6.3100033,106.8460442';
		$config['zoom'] = '5';
		$config['places'] = TRUE;
		$config['placesAutocompleteInputID'] = 'autotext';
		$config['placesAutocompleteBoundsMap'] = TRUE;
		$config['placesAutocompleteOnChange'] = "markers_map[0].setVisible(false);
    											 var place = placesAutocomplete.getPlace();
   												 if (!place.geometry) {
     											 return;
    											}

											    // If the place has a geometry, then present it on a map.
											    if (place.geometry.viewport) {
											      map.fitBounds(place.geometry.viewport);
											      map.setZoom(9);
											    } else {
											      map.setCenter(place.geometry.location);
											      map.setZoom(9);
											    }

											    markers_map[0].setPosition(place.geometry.location);
											    markers_map[0].setVisible(true);

											    var address = '';
											    if (place.address_components) {
											      address = [
											        (place.address_components[0] && place.address_components[0].short_name || ''), (place.address_components[1] && place.address_components[1].short_name || ''), (place.address_components[2] && place.address_components[2].short_name || '')
											      ].join(' ');
											    }
												";



		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = '-6.3100033,106.8460442';
		$this->googlemaps->add_marker($marker);
		
		$data['map'] = $this->googlemaps->create_map();
		$this->template->load('template', 'lokasi/customer_data',$data);



		 
	}

	public function get_data_map(){
			$tanggal1 =  date('m');
			$tanggal2 =  date('m', strtotime('-30 days'));
			//$tanggal1  = "03"; //format tanggal mysql
        //$tanggal2 = "1427174163"; //timestamp
 
        echo bulan($tanggal1);
        echo"</br>";
        echo bulan($tanggal2);

        if($this->input->post('filter_store') == '') {
		
		$str_cd='06001';
		
		$store_data = $this->geolocation_m->get_store_specific_5($str_cd);
		$data['hasilx'] = $this->geolocation_m->get_store_specific_5($str_cd);

		} else {

		$str_cd =$this->input->post('filter_store') ;
		$store_data = $this->geolocation_m->get_store_specific_5($str_cd);
		$data['hasilx'] = $this->geolocation_m->get_store_specific_5($str_cd);

		}


		$config = array();
		$config['center'] = 'indonesia';
		$config['zoom'] = 'auto';
		

		 //$config['onclick'] = 'alert(\'Hello Wordl\');';
		$this->googlemaps->initialize($config);
		
				foreach ($store_data as  $value) {

				$address = $value->zip;
				$url = "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyA7stwkqfCrdrwTN6rb4yaRnDjhOiSoTbc&address=".urlencode($address).",indonesia&sensor=false";
				$geo = file_get_contents($url);
				$geo = json_decode($geo, true);

					// If everything is cool
					if ($geo['status'] = 'OK') {
					  // We set our values
					$latitude = $geo['results'][0]['geometry']['location']['lat'];
					
					$longitude = $geo['results'][0]['geometry']['location']['lng'];
				

					} else {

						echo "gagal";
					}

				$marker = array();
				$marker['position'] =  "$latitude,$longitude";
				$marker['title'] =  "".$value->cust_nm."";
				$marker['infowindow_content'] = "<a style='color:#000000' href='javascript:void(0)' name='idcust' data-id='$value->cust_no' id='name_cust' onclick='test(".$value->cust_no.")'>".$value->cust_nm."</a><p style='color:#000000'>".$value->cust_no."</p><p> Total Sales : Rp ".number_format($value->sale,2,',',',')." </p><p>Visit : ".$value->days."</p><p>Buys Avg : Rp ".number_format(($value->sale/$value->days),2,',',',')."</p>";
				//$marker['onclick'] = 'alert(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
				$this->googlemaps->add_marker($marker);

			

			}

			

			$store_spesific = $this->geolocation_m->get_store_radius($str_cd);
			$address2 = 'LOTTEMART WHOLESALE '.$store_spesific->str_nm.'';

			$url2 = "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyA7stwkqfCrdrwTN6rb4yaRnDjhOiSoTbc&address=".urlencode($address2).",indonesia&sensor=false";
			$geo2 = file_get_contents($url2);
			$geo2 = json_decode($geo2, true);	
			$latitude1 = $geo2['results'][0]['geometry']['location']['lat'];
					
			$longitude1 = $geo2['results'][0]['geometry']['location']['lng'];	

			$marker = array();
			$marker['position'] = "$latitude1,$longitude1";
			$marker['infowindow_content'] = 'LOTTEMARTWHOLESALE '.$store_spesific->str_nm;
			$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
			$this->googlemaps->add_marker($marker);

			$circle = array();
			$circle['center'] = "$latitude1,$longitude1";
			$circle['fillColor'] = '#00FF00';
			$circle['radius'] = '10000';
			$this->googlemaps->add_circle($circle);


			$data['map'] = $this->googlemaps->create_map();

						//echo "please check your network!";
		
			$data['storex'] = $this->input->post('filter_store');
			$data['catx'] =  $this->input->post('filter_cat');
			$data['grpx'] = $this->input->post('grp_cd');
			$data['store_lokasi'] = $this->geolocation_m->get_list_store();
			$data['prod_cat'] = $this->geolocation_m->get_list_kategori();
			$data['group_cd'] = $this->geolocation_m->get_list_groupcd();			
			$this->template->load('template', 'lokasi/showing',$data);
	 }

	 public function get_ajax_cust(){

		 $list['hasil'] = $this->geolocation_m->get_data_cust();

		 $this->load->view('lokasi/formtable_cust',$list);
		 //echo json_encode($list);


	}

	public function get_ajax_cust_blank(){

		$data['hasil'] = $this->geolocation_m->get_data_cust_blank();
		$this->template->load('template', 'lokasi/formtable_cust',$data);
	}


	public function white_spot(){
		$data['storex'] = $this->input->post('filter_store');
		$data['store_lokasi'] = $this->geolocation_m->get_list_store();

    	$data['form_store']= form_dropdown('',$opt,'','id="filter_store" name="filter_store" class="form-control"');	


    	
		$config = array();
		$config['center'] = 'indonesia';
		$config['map_height'] = '500px';
		$config['zoom'] = 'auto';

		$config['places'] = TRUE;
		$config['placesAutocompleteInputID'] = 'autotext2';
		$config['placesAutocompleteBoundsMap'] = TRUE;
		$config['placesAutocompleteOnChange'] = "markers_map[0].setVisible(false);
    											 var place = placesAutocomplete.getPlace();
   												 if (!place.geometry) {
     											 return;
    											}

											    // If the place has a geometry, then present it on a map.
											    if (place.geometry.viewport) {
											      map.fitBounds(place.geometry.viewport);
											      map.setZoom(9);
											    } else {
											      map.setCenter(place.geometry.location);
											      map.setZoom(9);
											    }

											    markers_map[0].setPosition(place.geometry.location);
											    markers_map[0].setVisible(true);

											    var address = '';
											    if (place.address_components) {
											      address = [
											        (place.address_components[0] && place.address_components[0].short_name || ''), (place.address_components[1] && place.address_components[1].short_name || ''), (place.address_components[2] && place.address_components[2].short_name || '')
											      ].join(' ');
											    }
												";
		$this->googlemaps->initialize($config);


		$store_data = $this->geolocation_m->get_white_spot();

		foreach ($store_data as  $value) {
					
					$latitude = $value->latitute;
					$longitude = $value->longitude;

					$marker = array();
					$marker['position'] =  "".$latitude.",".$longitude."";
					$marker['title'] =  "".$value->nama_toko."";
					$marker['icon'] =  base_url().'arsip/market.png';

					$marker['infowindow_content'] = " <div class='picturex'> <a href='#' class=''><img src='".base_url()."arsip/".$value->foto."' width='70px' height='70px' alt=''></a></div><a style='color:#000000' href='javascript:void(0)' name='idcust' data-id='$value->noid' id='name_cust' onclick='test(".$value->noid.")'><strong>".$value->nama_toko."</strong></a><p style='color:#000000'>".$value->alamat." - ".$value->daerah."</p><p> Potensi Sales : Rp ".number_format($value->potensi_sales,2,',',',')."<br/>Bauran Product : ".$value->bauran_product."";
					//$marker['onclick'] = 'alert(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
					$this->googlemaps->add_marker($marker);

					
			}

		

		 if($this->input->post('filter_store') == '') {
			$str_cd='06022';
			$store_spesific = $this->geolocation_m->get_store_radius($str_cd);
			$data['hasil'] = $this->geolocation_m->get_white_spot();

		} else {

			$str_cd=$this->input->post('filter_store');
			$store_spesific = $this->geolocation_m->get_store_radius($str_cd);
			$data['hasil'] = $this->geolocation_m->get_white_spot();
		}

			$address2 = 'LOTTEMART WHOLESALE '.$store_spesific->str_nm.'';

			$url2 = "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyA7stwkqfCrdrwTN6rb4yaRnDjhOiSoTbc&address=".urlencode($address2).",indonesia&sensor=false";
			$geo2 = file_get_contents($url2);
			$geo2 = json_decode($geo2, true);	
			$latitude1 = $geo2['results'][0]['geometry']['location']['lat'];
					
			$longitude1 = $geo2['results'][0]['geometry']['location']['lng'];	

			$marker = array();
			$marker['position'] = "$latitude1,$longitude1";
			$marker['infowindow_content'] = 'LOTTEMARTWHOLESALE '.$store_spesific->str_nm;
			$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
			$this->googlemaps->add_marker($marker);

			$circle = array();
			$circle['center'] = "$latitude1,$longitude1";
			$circle['fillColor'] = '#00FF00';
			$circle['radius'] = '20000';
			$this->googlemaps->add_circle($circle);


			$distributor = $this->geolocation_m->get_distributor();
			//$icon_truck = echo base_url()
			// foreach ($distributor as $key ) {
				
			// 		$marker = array();
			// 		$marker['position'] =  "".$key->latitute.",".$key->longitude."";
			// 		$marker['infowindow_content'] =  "".$key->dist_name."";
			// 		$marker['icon'] =  base_url().'arsip/truck_mrk.png';
			// 		$this->googlemaps->add_marker($marker);

			// 		$circle = array();
			// 		$circle['center'] = "".$key->latitute.",".$key->longitude."";
			// 		$circle['fillColor'] = '#f72f25';
			// 		$circle['radius'] = '20000';
			// 		$this->googlemaps->add_circle($circle);
			// }


			$data['map'] = $this->googlemaps->create_map();

			$this->template->load('template', 'lokasi/spot_new_cust',$data);	
		
	}


	public function get_ajax_whitespot_detail(){
		$id = $this->input->post('noid');
		$this->db->select('*');
		$this->db->from('twhite_spot');
		$this->db->where('noid',$id);
		$query['detail'] = $this->db->get_where()->row();
		
		 $this->load->view('lokasi/detail_whitespt',$query);	

	}


	public function insert_ws(){

	$this->form_validation->set_rules('ws_name','ws_name','required');
	$this->form_validation->set_rules('no_card','no_card','required');
	$this->form_validation->set_rules('daerah','daerah','required');
	$this->form_validation->set_rules('alamat','alamat','required');
	$this->form_validation->set_rules('latitute','latitute','required');
	$this->form_validation->set_rules('longitude','longitude','required');
	$this->form_validation->set_rules('potensi_sales','potensi_sales','required');
	$this->form_validation->set_rules('bauran_prod','bauran_prod','required');

	if($this->form_validation->run() == FALSE ){

		 $status = array("STATUS"=>"false","msg"=>"Mohon Input dengan mark (*) diisi "); 
	     echo json_encode ($status) ;

	}else {


	   if(!empty ($_FILES['foto']['name'])){

	   $config['upload_path'] = './arsip/';
	   $config['allowed_types'] = 'jpg|jpeg|png';
	   $config['max_size'] = '10000';//2mb
	   $config['file_name'] = 'foto_doc';
	   $config['overwrite'] = false;
	   $this->load->library('upload', $config);
	   $this->upload->initialize($config);	

	   	if($this->upload->do_upload('foto'))
           {
           	$image_data = $this->upload->data();
          

			$data = array(
	    		'nama_toko' =>$this->input->post('ws_name'),
	    		'no_card' => $this->input->post('no_card'),
	    		'daerah' => $this->input->post('daerah'),
	    		'alamat'=> $this->input->post('alamat'),
	    		'foto' => $image_data['file_name'],
	    		'latitute' => $this->input->post('latitute'),
	    		'longitude' => $this->input->post('longitude'),
	    		'bauran_product' => $this->input->post('bauran_prod'),
	    		'potensi_sales'=>$this->input->post('potensi_sales'),
	    		'catatan'=>$this->input->post('remakrs'),
	    		'str_cd' => $this->input->post('filter_store')

	    		);

					  $updatenya = $this->geolocation_m->save_whitespot($data);
                      $status = array("STATUS"=>"true"); 
                      echo json_encode ($status);

		    } else {

              $status = array("STATUS"=>"false","msg"=>"Gagal Mengupload Foto  Mohon pastikan File ektesi *.jpg / *.jpeg /*.png dan maximum file hanya 10mb"); 
              echo json_encode ($status) ;

          	}

		}

		else {

			     $status = array("STATUS"=>"false","msg"=>"Mohon Foto diisi"); 
			     echo json_encode ($status) ;

			 }

		}
	


	}


	public function add_white_spot(){
		$data['storex'] = $this->input->post('filter_store');
		$data['store_lokasi'] = $this->geolocation_m->get_list_store();
		$this->template->load('template', 'lokasi/add_ws',$data);
	}

	public function ajax_delete($id){
		$delete = $this->geolocation_m->delete_ws($id);
        if($delete){
        	echo json_encode(array("status" => TRUE));

        }else {

        	echo json_encode(array("status" => FALSE));
        }
        
	}


}

?>