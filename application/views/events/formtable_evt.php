<div class="form-group">
<label><?php 
if(!empty($prod_name)) {


echo $prod_name->prod_nm ;
} else {

	echo 'Data Not Found ';
}
?></label>
</div>
<table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th>
							 <th>#</th>
						  </th>
						  <th>Prode Cd</th>
                          <th>Store Code</th>
                          <th>Buy Price</th>
                          <th>Buy Inc Price</th>
                          <th>Sale Price</th>
                          <th>Curr Sale Price</th>
                          <th>Profit rt</th>
                          <th>Stok Qty</th>
                          <th>Price Event</th>
                          <th>Rate Event</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php 
                      $no=1;
                      $to=1;
                      foreach ($storenya as $key => $value) { ?>
                      	
               
                      	<tr>
                          <td>
							<th><input type="checkbox" id="check-all" class="flat" name="options[<?php echo $no++; ?>][str_cd]" value="<?php echo $value->str_cd?>"></th>
						  </td>
						  <td><?php echo $value->prod_cd?></td>
                          <td><?php echo $value->str_cd?></td>
                          <td><?php echo $value->buy_prc?></td>
                          <td><?php echo $value->buy_prc?></td>
                          <td><?php echo $value->sale_prc?></td>
                          <td><?php echo $value->buy_prc?></td>
                          <td><?php echo $value->buy_prc?></td>
                          <td <?php if( $value->book_stk_qty <1 ) { ?> bgcolor="#FF0000" style="color:#FFFFFF" <?php }  else { ?> class="warning" <?php } ?> > <?php echo $value->book_stk_qty?></td>

                          <td><input type="number" class="form-control" name="options[<?php echo $to++; ?>][event_prc]" value="<?php echo $ref_price ?>"></td>
                         <td><?php echo $value->buy_prc?></td>	
                        </tr>

                      	 <?php } ?>
                   
                      </tbody>

</table>



