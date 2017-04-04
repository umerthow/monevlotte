<table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">

<thead>
        <tr>
            			<th rowspan="2">#</th>	
              			 <th rowspan="2">Cust No</th> 
                          <th rowspan="2">Sale Days</th>
                          <th rowspan="2">Prod Cd</th>
                          <th rowspan="2">Prod Name</th>
                          <th colspan="2">Januari</th>
                           <th colspan="2">Februari</th>
                          <th colspan="2">Maret</th>
                          
                          
                    
          </tr>
          <tr>
              <th class="warning">Qty2</th>        
              <th  class="warning">M 2</th>
          
               <th  class="warning">Qty1</th>
               <th class="warning">M 1</th>

          
              <th class="warning">Qty0</th>
              <th class="warning">M 0</th>
          </tr>
    </thead>
     <tbody>

                      <?php 
                      $no=1;
                      $jmla = 0;
                      $jmlb = 0;
                      $jmlc= 0;
                      $qtya = 0;
                      $qtyb = 0;
                      $qtyc= 0;
                      foreach ($hasil as $key => $value) { ?>
                       <?php 
                       $jmla+= ($value->sls_m0); 
                       $jmlb+= ($value->sls_m1);
                       $jmlc+= ($value->sls_m2);

                       $qtya+= ($value->sls_qty0); 
                       $qtyb+= ($value->sls_qty1);
                       $qtyc+= ($value->sls_qty2);
                       ?>
               
                        <tr>
			              <td><?php echo $no++ ?></td>            	
                          <td><?php echo $value->cust_no ?></td>
                          <td><?php echo $value->sale_dy ?></td>
                          <td><?php echo $value->prod_cd ?></td>
                          <td><?php echo $value->prod_nm ?></td>
                          <td><?php echo $value->sls_qty2 ?></td>
                         
                          <td class="text-right"><?php echo number_format($value->sls_m2,2,',',',')?></td>
                           <td><?php echo $value->sls_qty1 ?></td>
                          <td class="text-right"><?php echo number_format($value->sls_m1,2,',',',')?></td>
                           <td><?php echo $value->sls_qty0 ?></td>
                           <td class="text-right"><?php echo number_format($value->sls_m0,2,',',',')?></td>
                        </tr>

                         <?php } ?>
                   
                      </tbody>

                      <tfoot>
                      	<tr>
										<th  class="success" colspan="5" style="border:thin solid #cacaca; padding-left:20px;  ">
											TOTAL AMOUNT : 
										</th>
                    <th>
                    <?php echo $qtyc ?>
                     </th>
										<th class="success"  style="text-align:right; border:thin solid #cacaca; text-align:center;">
											
											<?php echo number_format($jmlc,2,',',',')?>
										</th>
                     <th>
                      <?php echo $qtyb ?>
                     </th>
                    <th class="success"  style="text-align:right; border:thin solid #cacaca; text-align:center;">
                    <?php echo number_format($jmlb,2,',',',')?>
                    </th>
                    <th>
                     <?php echo $qtya ?>
                     </th>
                    <th class="success"  style="text-align:right; border:thin solid #cacaca; text-align:center;">
                    <?php echo number_format($jmla,2,',',',')?>
                    </th>
						</tr>
                      </tfoot>


</table><br/>
<script type="text/javascript">
	$('#datatable-checkbox').DataTable({



	});

</script>