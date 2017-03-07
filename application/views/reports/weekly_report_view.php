

<div class="">

    <div class="page-title">
    

        
    </div>
     <div class="clearfix"></div>
      <div class="row">
         <div class="col-md-12">
             <div class="x_panel">

                <div class="x_title">
                    <h2>Weekly reports <small> --/--</small></h2><br/>
                   
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <div class="col-md-3">
                     <h5>Pilih Store</h5>

                </div>
                  <table class="table table-striped table-bordered nowrap table-hover" id="table1" style="font-size:12px;margin-top: 10px;" framework="bootstrap">
                      <thead>
                     <tr>
                          <th bgcolor="#JIFUDG"  class=" info text-center" rowspan="2">#</th>
                           <th class=" info col-md-2 text-center" rowspan="2">fg</th>
                          <th class=" info col-md-2 text-center" rowspan="2">L1_cd</th>
                          <th class="info text-center " rowspan="2">L1_name</th>
                          <th class="text-center" rowspan="2">Prod_cd</th>
                          <th class="text-center" rowspan="2">Prod_nm</th>
                          <th class="text-center" colspan="5">LOTTE</th>
                          <th class="text-center" colspan="5">INDOGROSIR</th>
                         <th class="text-center" rowspan="2">Notify</th>
                       </tr>
                      <tr>
                        <th class="text-centertg-yw4l">Regular</th>
                        <th class="text-center tg-yw4l">QTY lvl II</th>
                        <th class="text-center tg-yw4l">Price lvl II</th>
                        <th class="text-center tg-yw4l">QTY Termurah</th>
                        <th class="text-center tg-yw4l">Price Termurah</th>
                        <th class="text-centertg-yw4l">Regular</th>
                        <th class="text-center tg-yw4l">QTY lvl II</th>
                        <th class="text-center tg-yw4l">Price lvl II</th>
                        <th class="text-center tg-yw4l">QTY Termurah</th>
                        <th class="text-center tg-yw4l">Price Termurah</th>
                      </tr>
                    </thead>
    


                         <tbody>
                                                    
                         </tbody> 
          
     </table>

                </div>
            </div>
<p>This is a paragraph.</p>

<button class="btn1">Hide</button>
<button class="btn2">Show</button>


         </div>
      </div>



<script>

$(document).ready(function(){
    $(".btn1").click(function(){
        $("p").hide();
    });
    $(".btn2").click(function(){
        $("p").show();
    });

var table = $('#table1').DataTable({

    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.

    "ajax": {
            "url": "<?php echo site_url('weekly_reports/ajax_list_weekly_reports')?>",
            "type": "POST"
        },
    //Set column definition initialisation properties.
    "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ], 




    dom: 'Bfrtip',
    scrollY:        "400px",
    scrollX:        true,
   
    buttons: ['copy', 'excel', 'pdf'],
        "sScrollX": true,
        "sScrollXInner": "160%",
    fixedColumns:   {
            leftColumns: 3
        }

    });
 
   

});

</script>
