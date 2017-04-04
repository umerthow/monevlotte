<Style>
.picturex {

width:70px;
height:70px;
float: left;
margin-right: 10px;
margin-bottom: 50px;
}

.h-scroll {
    height: 80vh; /* %-height of the viewport */
    overflow-y: scroll;

  }
</Style>

<head><?php echo $map['js']; ?></head>         
<div class="row">
	

	<div class="col-md-12">
		 <div class="x_panel">
                  <div class="x_title">
                    <h2>White Spot Map <small><a href="<?php echo site_url('geolocation/add_white_spot')?>" class="btn btn-danger"><span class="fa fa-plus"></span> White Spot</a></h2></small> 
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li>
                          </li>
                          <li>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                
                   </div>
                     <div class="x_content">
                     <div class="row">
                     <div class="form-group">
                     
                     <div class="form-group">
                              <div class="col-md-4">
                            <input type="text" name="autotext" id="autotext2"  class="form-control">
                             </div>
                          </div>





                     </div>


                     <form action="<?php echo site_url('geolocation/white_spot')?>" method="POST" class="form-horizontal store" id="formfilter">
                        <div class="col-md-4">
                        <div class="form-group"> <select name="filter_store" id="filter_store" class="form-control">
                            <?php foreach($store_lokasi as $result) {?> 
                            <?php if ($result->str_cd == $storex) {

                                $selected='selected=""';
                            } else {


                                $selected='';
                            }
                        ?>

                             <option <?php echo $selected?> value="<?php echo $result->str_cd  ?>" > <?php echo $result->str_nm  ?></option> 
                        <?php } ?>
                        </select></div> 
                        </div>
                       <div class="form-group"> 
                       <button type="submit" class="btn btn-primary pull-right" id="btn-filter">Filter</button>
                       </div>
                     </form>
                     <div class="col-md-6">

                        

    
                     <?php  echo $map['html']; ?>
                    <p>Lokasi White Spot Customer  dengan radius 20km dari Store Lotte Wholesale</p>

                      </div>

                      <div class="col-md-6 h-scroll">
                      <?php  foreach ($hasil as $key => $value) { ?>
                      <div class="col-md-6">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo base_url()."arsip/".$value->foto; ?>" alt="image" />
                            <div class="mask">
                               <p><?php echo $value->nama_toko ?></p>
                              <div class="tools tools-bottom">
                                <a href="javascript:void(0)" id="name_cust" onclick="test(<?php echo $value->noid ?>)" data-id="<?php echo $value->noid ?>"><i class="fa fa-link"></i></a>
                              <!--   <a href="#"><i class="fa fa-pencil"></i></a>
                                <a href="#"><i class="fa fa-times"></i></a> -->
                              </div>
                            </div>
                          </div>
                          <div class="caption" style="font-size:11px">
                           <p>Nama : <?php echo $value->nama_toko ?></p>
                           <p>Potensi sales : Rp. <?php echo number_format($value->potensi_sales,2,',',',')?></p>

                             
                          </div>
                        </div>
                      </div>

                          <?php } ?>
                      </div>


                      <div class="col-md-12">
<br/>
<br/>
<h4>Table data White Spot List</h4>
                        <table>
                          
                          <table id="desc_list" class="table table-striped table-bordered">
     <thead>
        <tr>
            
                          <th>#</th>
                          <th>Nama Toko</th>
                          <th>Daerah</th>
                          <th>Alamat</th>
                          <th>Foto</th>
                          <th>Bauran Product</th>
                          <th>Potensi Sales</th>
                          <th>Catatan</th>
                          <th>Action</th>
                    
          </tr>
    </thead>
     <tbody>

                      <?php 
                      $no=1;
                     
                      foreach ($hasil as $key => $value) { ?>
                        
               
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $value->nama_toko?></td>
                          <td><?php echo $value->daerah ?></td>
                          <td><?php echo $value->alamat?></td>
                          <td><a href = "<?php echo base_url()."arsip/".$value->foto; ?>"   target="_blank" data-popup="true"> <button class="btn btn-default btn-sm dropdown-toggle" type="button"  aria-haspopup="true" aria-expanded="false">Lihat</button></a></td>
                           <td><?php echo $value->bauran_product ?></td>
                          <td><?php echo number_format($value->potensi_sales,2,',',',')?></td>
                          <td><?php echo $value->catatan?></td>
                           <td><button class="btn btn-danger btn-sm dropdown-toggle" type="button"  onclick="delete_ws(<?php echo $value->noid?>)" aria-haspopup="true" aria-expanded="false">Delete</button></td>
                       
                        </tr>

                         <?php } ?>
                   
                      </tbody>
  </table>
                        </table>

                      </div>  








                    </div>
                     
                     </div>
          </div>
	</div>
</div>        


<div class="modal fade" tabindex="-1" role="dialog" id="detail-cust">
  <div class="modal-dialog">
    <div class="modal-content">
         <div class="modal-body">
            <p id="demo2"> jjj </p>

         </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>




<script type="text/javascript">
  $('#desc_list').DataTable({



  });

</script>

<script type="text/javascript">
  function test(id){
    var id = id;
   $('#detail-cust').modal('show');

     $.ajax({
    url : "<?php echo  base_url()?>/geolocation/get_ajax_whitespot_detail",
    data: {'noid': id},
    type: "POST",
    cache: false,
        beforeSend: function(){

         $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' /> Loading..");
     
         },
         success:function(data){

         // $('#demo2').fadeOut('fast');
          $('#demo2').html(data);

         }


  });
  }

</script>

<script>

 function delete_ws(id){

    if(confirm('Are you sure delete this data?'))
    {

        // ajax delete data to database
        $.ajax({
            url : "<?php echo  base_url()?>geolocation/ajax_delete/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
           PNotify.prototype.options.styling = "bootstrap3";
            new PNotify({
            title: 'Notification',
            text: 'Sukses Delete This Data.',
            type: 'success',
            stack: {"dir1":"down", "dir2":"right", "push":"top"},
            });                  
                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });


    }


  }
</script>