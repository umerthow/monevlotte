
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
    <link href="<?php echo base_url(); ?>gentelella/build/css/custom.min.css" rel="stylesheet">

 <!-- PNotify -->
    <link href="<?php echo base_url(); ?>gentelella/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">




</head>




  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form>
              <h1>MONEV SISTEM</h1>
              <p class="form-group" id="demo2"> </p>
              <div>
                <input type="text" name="username" id ="user" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" id="pass" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" >Log in</a>
                <a class="reset_pass" href="#">Lost your password?</a>
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> LOTTE</h1>
                  <p>©2016 All Rights Reserved. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
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
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

<div class="modal fade" tabindex="-1" role="dialog" id="myaprv">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Aprroval Confirmation</h4>
      </div>
  
      <div class="modal-body">
      <p id="notifikasi"></p>
       
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

 $(document).on("click", ".submit", function () {

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
                         $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/4.gif' /> Loading..");
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
                                stack: {"dir1":"down", "dir2":"right", "push":"top"},
                                hide: false
                              });
                                   $('#demo2').html('<p>Failed</p>');
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

