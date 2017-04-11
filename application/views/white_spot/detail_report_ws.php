<div class="">

<div class="page-title">
    
<div id="example_wrapper"></div>
        
    </div>
     <div class="clearfix"></div>
      <div class="row">
      	<div class="x_panel">
                  <div class="x_title">
                    <h2><a href="<?php echo site_url('white_spot/rekap_transc')?>"> Reports </a> / Detail Transaksi / Transc #000<?php echo $id ?> <small>--/--</small></h2>
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

                   <section class="content invoice">
                    <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                                          
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
                          From <b>Store <?php echo $detail_trx->from_store ?></b>
                          
                          <address>
                          To <br/>
                                          <strong><?php echo $detail_trx->nama_toko?></strong>
                                         
                                          <br><?php echo $detail_trx->alamat_pengiriman?>
                                          <br>Phone: <?php echo $detail_trx->telp?>
                                          <br>Email: -
                                      </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          
                        </div>
                        <!-- /.col -->
              
                        <!-- /.col -->
                      </div>
                    </div>
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
                      <div class="col-md-12">
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
                                <tr>
                                <th colspan="4" class="warning"></th>
                                </tr>
                                  <tr>
                                  <th colspan="2" style="width:50%">Payment Methode:</th>
                                   
                                    <th></th>
                                  <td class="text-right">
                                  <?php if (($detail_trx->payment_type) == 1) { ?> <button class="btn btn-default btn-xs active" >Cash</button> <?php } ?>
                                  <?php if (($detail_trx->payment_type) == 2) { ?> <button class="btn btn-default btn-xs active" >Bank Transfer</button> <?php } ?>
                                  <?php if (($detail_trx->payment_type) == 3) { ?> <button class="btn btn-default btn-xs active" >T O P</button> <?php } ?>
                                  <?php if (($detail_trx->payment_type) == 4) { ?> <button class="btn btn-default btn-xs active" >Credit Card</button> <?php } ?>
                                  </td>
                                </tr>
                                <tr>
                                  <th colspan="2" style="width:50%">Status:</th>
                                   
                                    <th></th>
                                  <td class="text-right">
                                  <?php if (($detail_trx->status) == 0) { ?> <button class="btn btn-warning btn-xs active" >Menunggu Pembayaran</button> <?php } ?>
                                  <?php if (($detail_trx->status) == 1) { ?> <button class="btn btn-info btn-xs active" >Pembayaran sudah diterima</button> <?php } ?>
                                  <?php if (($detail_trx->status) == 2) { ?> <button class="btn btn-info btn-xs active" >Proses Pengiriman</button> <?php } ?>
                                  <?php if (($detail_trx->status) == 3) { ?> <button class="btn btn-success btn-xs active" >Barang Telah Dikirim</button> <?php } ?>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>

                   </section>
                  </div>
        </div>
  </div>
</div>