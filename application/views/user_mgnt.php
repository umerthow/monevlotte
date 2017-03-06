<style type="text/css">
	.table {
margin: 20px auto;
width: 100%;
}
table.display tr.even.row_selected td {
background-color: #B0BED9;
}
table.display tr.odd.row_selected td {
background-color: #9FAFD1;
}

</style>
<!-- <div class="page-title">
        <div class="title_left">
            <h3>
                Users Management
                <small>
                    Manage Users Account 
                </small>
            </h3>
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div> -->
  <div class="row">
     <div class="clearfix"></div>
     <div class="col-md-12 col-sm-12 col-xs-12">
     <div class="x_panel">
      <div class="x_title">
                    <h2>Data User <small> </small> <button type="button" class="btn btn-primary btn-sm addnew"><span class="fa fa-plus-square"></span> New User</button> 
                    <button type="button" class="btn btn-default btn-sm"  onclick="reload_table()"><span class="fa fa-refresh"></span> Reload Data</button> 
                   
</h2>
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
     <table id="table" class="table table-striped table-bordered compact">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Level</th>
                                <th>Last Visit</th>
                                <th>Last Login</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                         <tbody>
            				</tbody>
                    <!--     <tbody>

                        
                     
                        <?php foreach ($usernya as $user) { ?> 
                        <tr>
                                <td><?php echo $user->nama_lengkap?></td>
                                <td><?php echo $user->code?></td>
                                <td><?php echo $user->username?></td>
                                <td><?php echo $user->level?></td>
                                <td>2011/04/25</td>
                                <td>2011/04/25</td>
                                <td><button>edit</button></td>
                       </tr>

                        <?php }  ?>
                        </tbody> -->
    </table>
    </div>
    </div>
    </div>
    </div>

<div class="modal fade" tabindex="-1" role="dialog" id="myaprv">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
  
      <div class="modal-body">
      <form action="#" id="form" class="form-horizontal form-label-left">
	      <div id="groupid">
	      	<input type="hidden" value="" name="id"/> 
	      </div>	
      	<div class="form-group">
      	 <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
      	  <div class="col-md-9 col-sm-9 col-xs-12">
         <input type="text" name="username" class="form-control" id="username" >
         </div>
        </div>

        <div class="form-group" id="grouppassword">
      	 <label class="control-label col-md-3 col-sm-3 col-xs-12" id="password1">Password</label>
      	  <div class="col-md-9 col-sm-9 col-xs-12">
         <input type="text" name="password" class="form-control" id="password" >
         </div>
        </div>

        <div class="form-group" id="groupkaryawan">
      	 <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Karyawan</label> 
      	 <div class="col-md-9 col-sm-9 col-xs-12"><br/><i id="demo2"></i>
      	  <select name="emp_no" class="combobox form-control col-md-9 col-sm-9 col-xs-12" id="namalengkap" required>
      	   <option  id="orders">Choose option</option> 
      	  
      	   <?php foreach ($karyawan as $key => $value) { ?>
      	   	  <option value="<?php echo $value->emp_no?>"><?php echo $value->emp_no?> - <?php echo $value->emp_nm?> </option> 

      	   <?php }?>
      	  
      	  </select>
      	</div>
        </div>

        <div class="form-group">
      		 <label class="control-label col-md-3 col-sm-3 col-xs-12">Level</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
         <select name="level" class="form-control col-md-9 col-sm-9 col-xs-12">
            <option value="0">Choose option</option>
            <option value="1">Administrator</option>
            <option value="2">User HO</option>
            <option value="3">User Store</option>
            
         </select>

      	</div>
        </div>

       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button  type="submit" class="submit btn btn-primary btn-process " id="btnSave">Save</button>
        <button  type="button" class="update btn btn-primary btn-process " id="btnUpdate" onclick="update_in()">Update</button>
      </div>
       
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
var table;
var save_method;

$(document).ready(function() {
//datatable
table = $('#table').DataTable({
	"processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.

    "ajax": {
            "url": "<?php echo site_url('user/ajax_list_user')?>",
            "type": "POST"
        },
    //Set column definition initialisation properties.
    "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ], 


});

});

</script>
<script>

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
</script>


<script>
$(document).on("click", ".addnew", function () {
		 $('#form')[0].reset();
	 	 $('#myaprv').modal('show');
	 	 $(".modal-body #password").show();
	 	 $('.modal-title').text('Add New User Account');
	 	 $(".modal-body #groupid").hide();
	 	 $(".modal-body #grouppassword").show();
 		 $(".modal-body #groupkaryawan").show();
	 	 $('#btnUpdate').hide();
	 	 $('#btnSave').show();
	 });



</script>




<script>
// $(document).ready(function() {
	
//     $("#namalengkap").one('click',function(){
//     	var $orders = $('#orders');
//     	 var result="";
//         $.ajax({
//              type: 'GET',
//              url: "<?php echo  base_url()?>user/get_karyawan",
//              contentType : "application/json; charset=utf-8",
//              dataType : 'json',
//              beforeSend: function(){
//              	 $('#demo2').html("Loading..");
//              },
//              success: function(data){
//              	 try{
//              	 	$.each(data,function(key,value) {
             	 		
//              	 		$orders.append('<option value="">'+value.emp_nm+'</option>');
             	 		
//              	 	});
             	 	
//              	 } catch(e) {  
//                    alert('Exception while request..');
//                   }  
//               },
//                   error: function(){      
//                    alert('Error while request..');
//                   },

//                   complete: function(){

//                   }
            
//         });
//     });
// });
</script>

<script type="text/javascript">
      //<![CDATA[
        $(document).ready(function(){
          $('.combobox').combobox()
        });
      //]]>
 </script>


 <script>
 $(document).on("click", ".submit", function () {

 	$('#btnSave').text('saving..');
 	$('#btnSave').attr('disable',true);

 	$.ajax({
 		url : "<?php echo  base_url()?>user/add_user",
 		type:"POST",
 		data: $('#form').serialize(),
 		dataType: "JSON",
        success: function(json){

		try{
		var obj = jQuery.parseJSON(json);
        var a = obj['STATUS'];	
         if(obj['STATUS']=='true') {
		          PNotify.prototype.options.styling = "bootstrap3";
										new PNotify({
										title: 'Notification',
										text: 'Sukses menambah data.',
										type: 'success',
										stack: {"dir1":"down", "dir2":"right", "push":"top"},
										});
				 $('#myaprv').modal('hide');
				  reload_table();

		  	} else if(obj['STATUS']=='ada') {
		  					PNotify.prototype.options.styling = "bootstrap3";
                                new PNotify({
                                title: 'ERROR',
                                text: 'Username tersebut sudah ada!',
                                type: 'error',
                                stack: {"dir1":"down", "dir2":"right", "push":"top"},
                               
                              });
                                return false;

		  	}

		 } catch(e) {  
                   PNotify.prototype.options.styling = "bootstrap3";
                                new PNotify({
                                title: 'ERROR',
                                text: 'Username tersebut sudah ada!',
                                type: 'error',
                                stack: {"dir1":"down", "dir2":"right", "push":"top"},
                               
                              });
                                return false;
                  }  
 
        },
        error: function(){      
                             PNotify.prototype.options.styling = "bootstrap3";
                                new PNotify({

                                title: 'ERROR',
                                text: 'GAGAL DALAM MENAMBAH DATA',
                                type: 'error',
                                stack: {"dir1":"down", "dir2":"right", "push":"top"},
                               
                              });
                            },
 	});


 });

 </script>

 <script>
 function edit_person(id){
 	alert('Edit this User');
	save_method = 'update';
 	$('#myaprv').modal('show');
 	$('#form')[0].reset();
 	$('#btnUpdate').show();
	$('#btnSave').hide();
	$(".modal-body #groupid").show();

 	$.ajax({
 		url :"<?php echo  base_url()?>/user/edit_user/"+id,
 		type: 'GET',
 		dataType: 'JSON',
 		success: function(data){
 			$('.modal-title').text('Edit User Account '+data.nama_lengkap);
 			$('[name="id"]').val(data.noid);
 			$('[name="username"]').val(data.username);
 			$(".modal-body #grouppassword").hide();
 			$(".modal-body #groupkaryawan").hide();

 			//$(".modal-body #namalengkap").val(data.nama_lengkap);
 			$('[name="level"]').val(data.level);
 			
 		},
 		error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }




 	});



 }

 function update_in(){
  var id = $('[name="id"]').val();
  var user = $('[name="username"]').val();
  var level = $('[name="level"]').val();

 $('#btnUpdate').text('Updating..');
 $('#btnUpdate').attr('disable',true);
 $.ajax({

 	url : "<?php echo  base_url()?>user/update_user",
 	type:"POST",
 	data: {'id':id, 'username': user,'level' : level},
 	dataType: "JSON",
 	success : function(json){
 		try{  

 			 if ((obj['STATUS']=='true')) {
 			 	  				PNotify.prototype.options.styling = "bootstrap3";
								new PNotify({

								title: 'Notification',
								text: 'Sukses mengupdate data.',
								type: 'success',
								stack: {"dir1":"down", "dir2":"right", "push":"top"},
								});				
		 						$('#myaprv').modal('hide');
		 						 reload_table();
 			 }
				$('#btnUpdate').text('Update'); //change button text
           		$('#btnUpdate').attr('disabled',false); //set button enable 

 		}catch(e) {  
                   				PNotify.prototype.options.styling = "bootstrap3";
								new PNotify({

								title: 'Notification',
								text: 'Sukses mengupdate data.',
								type: 'success',
								stack: {"dir1":"down", "dir2":"right", "push":"top"},
								});				
		 						$('#myaprv').modal('hide');
		 						$('#btnUpdate').text('Update'); //change button text
           						$('#btnUpdate').attr('disabled',false); //set button enable 
		 						 reload_table();
		 						

                  }  

 			
 	},
 	error: function(){      
                             PNotify.prototype.options.styling = "bootstrap3";
                                new PNotify({

                                title: 'ERROR',
                                text: 'GAGAL DALAM UPDATE DATA',
                                type: 'error',
                                stack: {"dir1":"down", "dir2":"right", "push":"top"},
                                
                              });
                            },


 });

 }
 </script>

 <script>

 function delete_person(id){


 	if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo  base_url()?>user/ajax_delete/"+id,
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
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
    }
 }

 </script

