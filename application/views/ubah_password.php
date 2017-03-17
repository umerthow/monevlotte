<div class="row">

<div class="col-md-10">
           <div class="x_panel">
                  <div class="x_title">
                    <h2>Ubah Password Login <small> </small>  </h2>
                    	
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
       
        		<form action="javascript:void(0)" id="form_change" class="c_pass form-horizontal form-label-left">

        		<input type="hidden" name="nik" id="nik" value="<?php echo $this->session->userdata('kode')?>">
            
        	
        		<div class="form-group" id="grouppassword">
	      	 		<label class="control-label col-md-3 col-sm-3 col-xs-12" id="password1">New Password </label>
	      	 		 <div class="col-md-9 col-sm-9 col-xs-12">
	         				<input type="text" name="password" class="form-control" id="password" >
	       			</div>
	        	</div>

			<div class="item form-group">
                 <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Retype Password </label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                 <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                </div>
             </div>

             <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Alamat 
                        </label>
                        <div class="col-md-9">
                          <textarea id="alamat" required="required" name="textarea" class="form-control" row="5"></textarea>
                        </div>
             </div>
          	<div class="ln_solid"></div>
             <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button  type="submit" class="btn btn-success btn-pass" id="btnUpdate">Submit</button>
                        </div>
              </div>            



      		 </form>
      	
    	</div>
     </div>
     </div>
   </div>



<script type="text/javascript">
var id = $('#nik').val();
$('form.c_pass').on('submit', function () {
$('#btnUpdate').text('Validating..');
$('#btnUpdate').attr('disable',true);

$.ajax({       
            url :"<?php echo  base_url()?>/user/change_pass/"+id,
            type: 'POST',
            data: $('form.c_pass').serialize(),
            cache:false,
            success: function(json){
               var obj = jQuery.parseJSON(json);
               var message = obj['STATUS'];
                  try {

                        if(message=='true') {
                          PNotify.prototype.options.styling = "bootstrap3";
                          new PNotify({

                          title: 'Success',
                          text: 'Sukses Updating Password. :)',
                          type: 'success',
                          stack: {"dir1":"down", "dir2":"right", "push":"top"},
                          });      
                            setTimeout(function(){
                                   window.location = "<?php echo site_url('Welcome/index')?>";
                                    //window.location.reload('<?php echo site_url("Welcome/index")?>');
                                     /* or window.location = window.location.href; */
                                
                            }, 3000);
                       

                        } else {
                          if(message=='false') {
                          alert('Failed to Update! password not match');
                           $('#form.c_pass')[0].reset();
                          return false;

                          }

                        }

                      }  catch(e) {  
                          PNotify.prototype.options.styling = "bootstrap3";
                            new PNotify({

                            title: 'Error',
                            text: 'Gagal mengupdate data.',
                            type: 'error',
                            stack: {"dir1":"down", "dir2":"right", "push":"top"},
                            });       
                          
                            $('#btnUpdate').text('Submit');
                            $('#btnUpdate').attr('disabled',false); //set button enable 
                            

                              }  
              
            },
            error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                    return false;
                }




  });



});
</script>

    <!-- Custom Theme Scripts -->

