<div class="">

<div class="page-title">
    
<div id="example_wrapper"></div>
        
    </div>
     <div class="clearfix"></div>
      <div class="row">
      	<div class="x_panel">
                  <div class="x_title">
                    <h2>White Spot Transaksi  <small>--/--</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#" target="_blank">Panduan Pengisian</a>
                          </li>
                          <li><a href="javascript:void(0)" id="foruploadexcel">Upload by Excel</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab1" class="nav nav-tabs bar_tabs right" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content11" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Store Transaction</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content22" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Claim Reporst</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content33" role="tab" id="profile-tabb3" data-toggle="tab" aria-controls="profile" aria-expanded="false">Vendor Reports</a>
                        </li>
                      </ul>
                      <div id="myTabContent2" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content11" aria-labelledby="home-tab">
                          <table class="table table-bordered nowrap table-hover gridtable" id="table1" style="font-size:12px;margin-top: 10px; border:"2px" " framework="bootstrap">
                      <thead>
                      <tr>
                        <th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;"># </th>
                        <th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">OrderID</th>
                        <th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Nama Toko</a></th>
                        <th class="warning col-md-3" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">No Cust</th>
                        
                        <th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Tipe Delivery</th>
                        <th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Distance</th>
                        <th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Tipe Payment</th>
                        <th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Total Transaksi</th>
                         <th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Store</th>
                        <th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Status</th>
                        
                      </tr>
                   </thead>
                      <tbody>
                      <?php 
                      $no=1;
                // if(count($detail) > 0 ) {
                foreach ($trasaksi as $result) { ?>
                      <tr>
                        <td style="border:thin solid #cacaca; text-align:center;"><?php echo $no++?></td>
                         <td style="border:thin solid #cacaca; text-align:center;">#000<?php echo $result->noid ?></td>
                        <td style="border:thin solid #cacaca; text-align:center;"><a href="<?php echo site_url('white_spot/report_detail_trasaksi/'.$result->noid)?>"><?php echo $result->nama_toko ?></td>
                        <td style="border:thin solid #cacaca; text-align:center;"><?php echo $result->no_cust ?></td>
                        <td style="border:thin solid #cacaca; text-align:center;"><?php echo $result->delivery_type ?></td>
                        <td style="border:thin solid #cacaca; text-align:center;"><?php echo $result->distance ?> km </td>
                        <td style="border:thin solid #cacaca; text-align:center;"><?php echo $result->payment_type ?></td>
                        <td style="border:thin solid #cacaca; text-align:center;"><?php echo number_format($result->total_trx,2,',',',') ?></td>
                        
                        <td style="border:thin solid #cacaca; text-align:center;"><?php echo $result->from_store?></td>  
                       
                        <td style="border:thin solid #cacaca; text-align:center;"><?php echo $result->status ?></td>
                          
                        </td>

                    </tr>
                    <?php } ?>
                      </tbody>
                  </table>
                        </div>
































                        <div role="tabpanel" class="tab-pane fade" id="tab_content22" aria-labelledby="profile-tab">
                       


                          <form  id="formfilter">
                           <div class="col-md-3">
                              <div class="form-group">
                                 <select  name="filter_month" id="filter_month" class="form-control" required>
                                     
                                      <option value="1">Januari</option>
                                      <option value="2">Feburari</option>
                                      <option value="3">Maret</option>
                                      <option value="4">April</option>
                                      <option value="5">Mei</option>
                                      <option value="6">Juni</option>
                                      <option value="7">Juli</option>
                                      <option value="8">Agustus</option>
                                      <option value="9">September</option>
                                      <option value="10">Oktober</option>
                                      <option value="11">November</option>
                                      <option value="12">Desember</option>
                                       <option value="">All month </option>
                                 </select>

                           </div>
                        </div>
                         <div class="col-md-3">
                          <div class="form-group">
                               <div class="form-group"><input type="text" name="filter_ven" id="filter_ven" class="form-control" value="024033" placeholder="Input ven code here" title="input ven_cd"></div>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                               <div class="form-group"><input type="text" name="percentance" id="percentance" class="form-control" value="0.02" placeholder="percentance (0.02)" title="input percentance"></div>
                          </div>
                        </div>


                            <div class="form-group">
                             <div class="col-md-3 ">
                              <button type="button" class="btn btn-primary" id="btn-filter">Filter</button>
                              <button type="button" class="btn btn-info" id="btn-Reset"> Reset</button>

                            </div>
                        </form>


                       
                         <br/>
                        <br/>
                         <br/>
                      
                      
                         <table class="table table-bordered nowrap table-hover gridtable" id="ven_table" style="font-size:12px;margin-top: 10px; border:"2px" " framework="bootstrap">
                          <thead>
                          <th bgcolor="#FFFFFF"  class=" info text-center" >#</th>
                          <th class="info text-center" >str_cd</th>
                          <th class="info text-center" >prod_cd</th>
                          <th class="info text-center col-md-3" >prod_nm</th>
                          <th class="info text-center" >qty_order</th>  
                          <th class="text-center" >sale_prc</th>
                          <th class="text-center" >spec_prc</th>
                          <th class="text-center" >buy_incl</th>
                          <th class="text-center" >buy_incl*qty</th>
                          <th class="text-center" >claim</th>
                          </thead>

                            <tbody>
                            </tbody> 


                          </table>

                      
                       
                        </div>

                     </div>



































                        <div role="tabpanel" class="tab-pane fade" id="tab_content33" aria-labelledby="profile-tab">
                          <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                            booth letterpress, commodo enim craft beer mlkshk </p>
                        </div>
                      </div>
                    </div>

                    <div class="clearfix"></div>

                  

                  </div>

      </div>

      </div>


</div>

<script type="text/javascript">
  
  $(document).ready(function() {
   var  table = $('#table1').DataTable({

          "columnDefs": [
          { 
              "targets": [ 0 ], //last column
              "orderable": false, //set not orderable
              
          }
         

           ], 
    });

});
</script>


<script type="text/javascript">
  function activaTab(tab){
    $('.nav-tabs a[href="#' + tab + '"]').tab('show');
};

activaTab('tab_content11s');
</script>

<script type="text/javascript">
  // $('#profile-tabb').on('click', function () {

  //   alert('ok');

  // });
</script>


<script type="text/javascript">
var filter_month = $('#filter_month').val();
var filter_ven = $('#filter_ven').val();
  $(document).ready(function() {
   var table_ven  = $('#ven_table').DataTable({
     "serverSide": true, //Feature control DataTables' server-side processing mode.
   "order": [], //Initial no order.
   "oLanguage": {
           "sProcessing": "<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' /> <b>Please Wait...</b>"
         },
   "processing": true, //Feature control the processing indicator.

    "ajax": {
              "url": "<?php echo site_url('white_spot/ajax_list_claim')?>",
              "type": "POST",
          
              // "beforeSend":function(){
              //    $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' /> Loading..");
              //  },

              "data":function (data){
                data.filter_month = $('#filter_month').val();
                data.filter_ven = $('#filter_ven').val();
                data.percentance=$('#percentance').val();
              },

          },

    "pageLength": 10,
    "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]], 

    "columnDefs": [
          { 
              "targets": [ 0 ], //last column
              "orderable": false, //set not orderable
          },
          
           ],  

    });

 $('#btn-filter').click(function(){ //button filter event click
    // $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' />");
        table_ven.ajax.reload(null,false);  //just reload table
    });
  });
</script>