
<head>
  
  
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url(); ?>gentelella/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>gentelella/build/css/custom.css" rel="stylesheet">

 <!-- PNotify -->
    <link href="<?php echo base_url(); ?>gentelella/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">




</head>
<div class="col-md-4"></div>
<div class="col-md-4">
 
<div class="col-md-4"></div>


  <body class="login ">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
  

      <div class="login_wrapper">
  
        <div class="animate form login_form">
          <section class="login_content">
            <form action="javascript:void(0)" id="form_login" class="login input_mask">
              <h1>MONEV SISTEM</h1>
              <p class="form-group" id="demo2"> </p>

              

                <div class="col-xs-12 form-group has-feedback">
                <input type="text" name="username" id ="user" class="form-control  has-feedback-left" placeholder="Username" required="" />
                <span class="fa fa-user form-control-feedback left" aria-hidden="false"></span>

              </div>
             <div class=" col-xs-12 form-group has-feedback">
                <input type="password" name="password" id="pass" class="form-control has-feedback-left" placeholder="Password" required="" />
               <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
              </div>

               <div class=" col-xs-12 form-group has-feedback">
                 <button type="submit" class="btn btn-danger submit-register" >Log In</button>
                <a class="reset_pass to_lostpassword" href="#" onclick="lostpassword()">Lost your password?</a>
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1> LOTTE SHOPPING INDONESIA</h1>
                  <p>©2017 All Rights Reserved. Privacy and Terms</p>


                </div>
              </div>
            </form>
          </section>
        </div>


    

        <div id="register" class="animate form registration_form">
        <section class="login_content">
        <p>You no need to Register</p>
           <div class="clearfix"></div>
            <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>
        </section>
         <!--  <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="button" class="btn btn-default submit-register" >Submit</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> LOTTE</h1>
                  <p>©2016 All Rights Reserved. LOTTE SHOPPING INDONES. Privacy and Terms</p>
                </div>

              </div>
            </form>
          </section> -->
        </div>
      </div>
    </div>

<div class="modal fade" tabindex="-1" role="dialog" id="lostpass">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Aprroval Confirmation</h4>
      </div>
  
      <div class="modal-body">
      <p id="notifikasi">Mohon maaf, untuk user yang mengalami lupa password saat ini mohon untuk menghubungi administrator COMM DF atau email ke : ahmad.umar@lottemart.co.id</p>
      
      <br/><p>Thank's</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
     
      </div>
       
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  </body>


    <script src="<?php echo base_url(); ?>gentelella/vendors/jquery/dist/jquery.min.js"></script>
       <!-- jQuery -->
    <script src="<?php echo base_url(); ?>gentelella/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>gentelella/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url(); ?>gentelella/vendors/nprogress/nprogress.js"></script>


        <!-- PNotify -->
    <script src="<?php echo base_url(); ?>gentelella/vendors/pnotify/dist/pnotify.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/pnotify/dist/pnotify.nonblock.js"></script>




<script type="text/javascript">
$('form.login').on('submit', function () {

  var username = $('#user').val();
  var pass = $('#pass').val();

 $empty1 = $('#user').filter(function() {
                        return this.value === "";
 });

 $empty2 = $('#pass').filter(function() {
                        return this.value === "";
 });



if($empty1.length || $empty2.length) {
                        //$('#myaprv').modal('show');
                       // $('#notifikasi').html('<b> Mohon Field username dan password Diisi</b>');

                       $(function(){
                            PNotify.prototype.options.styling = "bootstrap3";
                            new PNotify({

                                title: 'Caution!',
                                text: 'Mohon Username dan Password diisi lengkap.',
                                type: 'error'
                                
                               

                            });
                        });
                      
                        return false;
                    } else {

                       $.ajax({

                         url: "<?php echo  base_url()?>/user/auth_login",
                         data :{'username': username,'password' : pass},
                         type: "POST",
                         cache: false,
                         beforeSend: function(){
                         $('#myaprv').modal('hide');
                         $('#demo2').html("Loading...");
                         $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' /> Loading..");
                          },
                           success:  function(json){      
                           try{  
                              var obj = jQuery.parseJSON(json);
                              if (obj['STATUS']=='true') {
                               $('#demo2').html("<ul class='alert alert-success'><span>Sucess Verification!</span></ul>");
                                setTimeout(function(){
                               $('.alert-success').slideUp('slow').fadeOut(function() {
                                    window.location.reload();
                                     /* or window.location = window.location.href; */
                                 });
                            }, 3000);
                                }
                                else if(obj['STATUS']=='gagal') {
                                   PNotify.prototype.options.styling = "bootstrap3";
                                new PNotify({

                                title: 'Login Failed!',
                                text: 'Mohon Cek Username dan Password Anda.',
                                type: 'error',
                                stack: {"dir1":"top", "dir2":"left", "push":"top"},
                            
                              });
                                   $('#demo2').html('<p>Failed to Verification</p>');

                                }
                           }catch(e) {  
                             alert('Exception while request..');
                            }  
                            },
                            error: function(){      
                             alert('Error while request..');
                            },


                       });
                      
                      return true;
                    }
 });






</script>


<script>
  function lostpassword(){

    $('#lostpass').modal('show');
    $('.modal-title').text('Sorry')
    //alert('Mohon maaf, untuk user yang mengalami lupa password saat ini mohon untuk menghubungi administrator atau email ke : ahmad.umar@lottemart.co.id');
  }
</script>