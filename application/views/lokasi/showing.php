
<head><?php echo $map['js']; ?></head>    
       
<div class="row">

<div class="col-md-12">
     <div class="x_panel">
                  <div class="x_title">
                    <h2>Filtering A1 Customer from Store <small>--/--</small></h2>
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
                  </div
                   </div>
                     <div class="x_content">
                     <form action="<?php echo site_url('geolocation/get_data_map')?>" method="POST" class="form-horizontal store" id="formfilter">
                        
                        <div class="row">
                        <div class="form-group col-md-3">
                          <select name="grp_cd" id="grp_cd" class="combobox form-control">
                             <option  value="" > All Group </option>
                            <?php foreach ($group_cd as $key => $value) { ?>
                              
                             <?php if ($value->grp_cd == $grpx) {

                                $selected='selected=""';
                                } else {


                                    $selected='';
                                }
                            ?>

                             <option <?php echo $selected?> value="<?php echo $value->grp_cd  ?>" > <?php echo $value->grp_cd  ?></option> 
                             
                              <?php } ?>
                          </select>
                          </div>


                        <div class="form-group col-md-3">
                        <select name="filter_cat" id="filter_cat" class="form-control">
                         <option  value="" > All Category </option>
                          <?php foreach($prod_cat as $result) {?> 
                          
                           <?php if ($result->l1_cd == $catx) {

                                $selected='selected=""';
                            } else {


                                $selected='';
                            }
                        ?>

                             <option  <?php echo $selected?> value="<?php echo $result->l1_cd  ?>" > <?php echo $result->l1_nm  ?></option> 

                          <?php } ?>

                        </select>
                        </div>

                        <div class="form-group col-md-3">
                          
                          <select name="filter_store" id="filter_store" class="form-control">
                            <?php foreach($store_lokasi as $result) {?> 
                            <?php if ($result->str_cd == $storex) {

                                $selected='selected=""';
                            } else {


                                $selected='';
                            }
                        ?>

                             <option <?php echo $selected?> value="<?php echo $result->str_cd  ?>" > <?php echo $result->str_nm  ?></option> 
                        <?php } ?>
                        </select>


                        </div> 



                       <div class="form-group"> 
                       <button type="submit" class="btn btn-primary pull-right" id="btn-filter">Filter</button>
                       </div>

                       </div>
                     </form>
                     </div>
         

  <?php  echo $map['html']; ?>
  <p>Data Customer 10 terbaik kategori A 1 dengan radius 10km dari Store Lotte Wholesale</p>
  </div>


  <div class="col-md-12">
  <span id="demo2"></span>
  <div id="ambildata"></div>

  <table id="desc_list" class="table table-striped table-bordered">
     <thead>
        <tr>
              <th>
               <th>#</th>
              </th>
              <th>Cust No</th>
                          <th>Cust Name</th>
                          <th>Days</th>
                          <th>Sales</th>
                          <th>Adress</th>
                          <th>No</th>
                    
          </tr>
    </thead>
     <tbody>

                      <?php 
                      $no=1;
                      $to=1;
                      foreach ($hasilx as $key => $value) { ?>
                        
               
                        <tr>
                          <td>
              <th><?php echo $no++; ?></th>
              </td>
                          <td><?php echo $value->cust_no?></td>
                          <td><?php echo $value->cust_nm?></td>
                          <td><?php echo $value->days?></td>
                          <td><?php echo number_format($value->sale,2,',',',')?></td>
                          <td><?php echo $value->addr1?></td>
                          <td><?php echo $value->cell_no?></td>
                       
                        </tr>

                         <?php } ?>
                   
                      </tbody>
  </table>
  </div>
 </div>
  
</div>        


<div class="modal fade" tabindex="-1" role="dialog" id="detail-cust">
  <div class="modal-dialog">
    <div class="modal-content">
         <div class="modal-body">
        <p> jjj </p>
         </div>
    </div>
  </div>
</div>












<script>
function test(){
  var cat = $('#filter_cat').val();
  var grp_cd = $('#grp_cd').val();
  var str_cd = $('#filter_store').val();
  var myId = $('#name_cust').data('id');
  
  $('#desc_list').hide();

    $.ajax({
    url : "<?php echo  base_url()?>/geolocation/get_ajax_cust",
    data: {'custid': myId,'idcat':cat,'grp_cd':grp_cd,'str_cd': str_cd},
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





// $('#name_cust').on('click', '.btn-process', function(e) {
//   var myId = $(this).data('id');
//   alert('hello'+myId);

// });
</script>




<!-- 
<script>
var str_cd = $('#filter_store').val();
var form = $('#formfilter');

$('#formfilter').on('submit', function () {
$('#btn-filter').text('Searching...');
$('#btn-filter').attr('disabled',true);
   $.ajax({
    url: "<?php echo  base_url()?>/geolocation/get_data_map",
    data: form.serialize(),
    type: "POST",
        cache: false,
        beforeSend: function(){

         $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' /> Loading..");
     
         },
        success: function(data) {
          $('#btn-filter').text('Filter');
      $('#btn-filter').attr('disable',false);

      $('#demo2').fadeOut('fast');
      $('#petaku').html(data);
         },

        error: function(){      
          alert('Error while request..');
           return false;
         },
   });





});
</script> -->


<script type="text/javascript">
      //<![CDATA[
        $(document).ready(function(){
          $('.combobox').combobox()
        });
      //]]>
    </script>
