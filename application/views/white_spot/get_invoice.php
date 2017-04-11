<div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Invoice Order <b>#000<?php echo $detail_trx->noid ?></b></h2>
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

                    <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                                          <i> <img height='100px' width='100px'src="<?php echo base_url(); ?>gentelella/production/images/lottewholesale.png" alt="..." class="img-circle"></i>
                                          <?php  $pecah4 = explode(" ", $detail_trx->createdDate); ?>
                                          <?php 
                                          

                                          ?>
                                          <small class="pull-right" style="font-size:14px">Date: <?php echo $this->waktu->formatDate($pecah4[0],"id");
                                          echo " ".$pecah4[1];?></small>
                                      </h1>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          From
                          <address>
                                          <strong>PT LOTTE SHOPPING INDONESIA.</strong>
                                          <br>LOTTE GROSIR <?php echo $detail_store->str_nm?>
                                          <br> <?php echo $detail_store->addr1?>
                                          <br>Phone: <?php echo $detail_store->tel_no?>
                                          <br>Email: lsi@lottemart.co.id
                                            <!-- <br>Store  - <?php echo $detail_trx->from_store ?> -->
                                      </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          To
                          <address>
                                          <strong><?php echo $detail_trx->nama_toko?></strong>
                                         
                                          <br><?php echo $detail_trx->alamat_pengiriman?>
                                          <br>Phone: <?php echo $detail_trx->telp?>
                                          <br>Email: -
                                      </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          <b>Invoice #000<?php echo $detail_trx->noid ?></b>
                          <br>
                          <br>
                          <!-- <b>Order ID:</b> 4F3S8J
                          <br>
                          <b>Payment Due:</b> 2/22/2014
                          <br>
                          <b>Account:</b> 968-34567 -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 table">
                          <table class="table table-striped" style="font-size:12px; ">
                            <thead>
                            <tr>
                              <th class="info" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;"># </th>
                              <th class="info" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Product Code</th>
                              <th class="info col-md-3" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Product Name</th>
                             
                              <th class="info" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Harga Reg</th>
                              <th class="info" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Harga Khusus</th>
                              <th class="info" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Qty</th>
                              <th class="info col-md-2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Total</th>
                            </tr>
                          </thead>
                            <tbody>
                <?php
                  $no =1;
                  $jmla = 0;
                  $jmlb = 0;
                  ?>
               
                            <?php foreach ($detail_tail as $key => $result) {  ?>
                              
                <?php 
                 if($result->spec_prc==0) {

                  $total =($result->qty_order * $result->sale_prc);

                }else {
                  
                  $total =($result->qty_order * $result->spec_prc);
                }

                 $jmla+= ($total);

                ?>

                    <tr>
                        <td style="border:thin solid #cacaca; text-align:center;"><?php echo $no++?></td>
                        <td style="border:thin solid #cacaca; text-align:center;"><?php echo $result->prod_cd ?></td>
                        <td style="border:thin solid #cacaca; text-align:center;"><?php echo $result->prod_nm ?></td>
                      
                        <td style="border:thin solid #cacaca; text-align:center;"><?php echo number_format($result->sale_prc,2,',',',') ?></td>
                        <td contenteditable="true" onBlur="saveToDatabase(this,'spec_prc','<?php echo $result->noid_tsc; ?>')" style="border:thin solid #cacaca; text-align:center;" onClick="showEdit(this);"><?php echo number_format($result->spec_prc,2,',',',')?></td>
                        <td contenteditable="true" type="number"  onBlur="saveToDatabase(this,'qty_order','<?php echo $result->noid_tsc; ?>')" style="border:thin solid #cacaca; text-align:center;" onClick="showEdit(this);"><?php echo number_format($result->qty_order,2,',',',') ?>
                          
                        </td>
                        <td style="border:thin solid #cacaca; text-align:center;"><?php echo number_format($total,2,',',',') ?>
                          
                        </td>

                    </tr>

                             <?php }?>
                            </tbody>
                            <tfoot>
                      
                      <tr>
                          <th  class="success" colspan="6" style="border:thin solid #cacaca; padding-left:20px;font-size:14px;  ">
                            JUMLAH : 
                          </th>
                          <th style="border:thin solid #cacaca; text-align:center;font-size:12px; "><b><?php echo number_format($jmla,2,',',',') ?></b></th>
                          <th class="warning hidden"><input type="text" class="hidden" name="total_order" id="total_order" value="<?php echo $jmla ?>"/></th>
                      </tr>
                    </tfoot>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">
                          <p class="lead">Payment Methods:</p>
                          Bank Transfer
                          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                            Pembayaran dapat di transfer melalui :<br/>
                           Bank Mandiri : 123-123-123 <br/>
                           Bank BNI : 345-345-345<br/> <br/>
                          
                          Mohon konfirmasi setelah melakukan pembayaran. <br/>
                          Pengirimiman barang akan dilakukan 1 hari setelah pembayaran di terima / diconfirm.


                           
                          </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-6">
                          <p class="lead">Amount Due </p>
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th style="width:50%" colspan="2">Subtotal:</th>
                                  <th></th>
                                  <td class="text-right"><?php echo number_format($detail_trx->total_trx,2,',',',') ?></td>
                                </tr>
                                
                                <tr>
                                  <th style="width:50%">Shipping:</th>
                                    <th><?php echo $detail_trx->delivery_type ?></th>
                                    <th></th>
                                  <td class="text-right"><?php echo number_format($detail_trx->ex_delivery,2,',',',') ?></td>
                                </tr>
                                <tr>
                                  <th colspan="2">Total:</th>
                                  <th></th>
                                  <td class="text-right"><?php $total = ($detail_trx->total_trx +$detail_trx->ex_delivery )?>
                                  <strong><?php echo number_format($total,2,',',',') ?> </strong>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-xs-12">
                          <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                          <button class="btn btn-success pull-right"><i class="fa fa-check-square-o"></i> Finish - OK</button>
                          <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>