<script type="text/javascript">
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '537066419745678',
      xfbml      : true,
      version    : 'v2.7'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  
</script>
<?php
$login = Router::url(array('controller' => 'users', 'action' => 'login'));
$register = Router::url(array('controller' => 'users', 'action' => 'register'));
?>
<div class="modal-dialog ">
<!-- Modal content-->
	 <?php  echo $this->Form->create('User',array('class'=>'form-horizontal style-form','enctype'=>'multipart/form-data','validate'));?>
	<div class="modal-content">
		<div class="row">
			<div class="col-sm-6"  >	
				<div class="error-box"></div>
				<div class="modal-body"><br>
					<h3>LOGIN </h3>
					<p>In Maximus justo aliquet rise efficitur in por ttitor nisl fsucibus.</p>
				
						<div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon" style="background-color:#3d556d;">
                                <?php echo $this->Html->image('front/email_address.png', array());?>
                                </span>
                                <!-- <input type="text" class="form-control" placeholder="Email Address" style="border-radius:3%;"> -->
                                <?php echo $this->Form->input('email',array('class'=>'form-control','label'=>false,'div'=>false,'placeholder'=>'Email Address','style'=>'border-radius:3%'));?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group" >
                                <span class="input-group-addon" style="background-color:#3d556d;">
                                <i ><?php echo $this->Html->image('front/password.png', array());?></i>
                                </span>
                                <!-- <input type="password" class="form-control" placeholder="Password"> -->
                                <?php echo $this->Form->input('password',array('class'=>'form-control','label'=>false,'div'=>false,'placeholder'=>'Password'));?>
                            </div>
                        </div>
					
				<div class="" > 
				<button type="submit" class="btn btn-default btn-lg" style="width:100%;background-color:#134b6e;color:white;font-size:13px;border:none; ">LOGIN</button> 
				<br><br>
				<h6 style="text-align:center;"><b>OR</b></h6>
				<button type="button" onclick="chkLoginStatus()" class="btn btn-info" style="width:100%;background-color: #4575bf;color:white;font-size:13px;border:none; " >
				<?php echo $this->Html->image('front/login_with_facebook.png', array());?>&nbsp;&nbsp;LOGIN WITH FACEBOOK</button>
				
				</div>
				</div>
			</div>
			<div class="col-sm-6"  >
				<div class="carousel-inner" role="listbox" >
					  <div class="item active"  >
						<div class="slide" style="background: url('popup_background.jpg');background-repeat:no-repeat;">
							<a href="" > <?php echo $this->Html->image('front/close_popup.png', array("style"=>"margin-left:90%;margin-top:3%;"));?></a>
							<div style="margin-top:53%;">	
								<h4 class="" style="text-align:center;font-size:25px;color:white;"><b>REGISTER  NOW</b></h4>
								<p style="text-align:center;font-size:15px;color:white;">Nulla eu urna elementum nunc lacinia<br><span> egestas.Quisque interdum ,</span>dolor a <br><span>eleifend imperdiet.</span></p>
								<!-- <button type="button" class="btn btn-default btn-lg " style="background-color: white;color:black;font-size:14px;border:none;margin-left:33%; " >REGISTER NOW</button> -->
								<button class="openModal btn btn-default btn-lg" style="background-color: white;color:black;font-size:14px;border:none;margin-left:33%;" onclick="getPartialView(this)" data-url="<?php echo $register;?>">REGISTER</button>
							</div><br><br>
						</div>
					 </div>
					 <div>
					
				</div>
				</div>
				
			</div>
		</div>
	</div>
	<?php echo $this->Form->end();?>  
</div>

<script type="text/javascript">
	$("#UserLoginForm").submit(function(e){
		e.preventDefault();
		var paramss = $(this).serialize();
		var URL = '<?php echo $this->Html->url(array("controller" => "users","action" => "login","full_base"=>false));?>';
		$.ajax({
            url : URL,
            type: "POST",
            data : paramss,
            /*beforeSend: function (XMLHttpRequest) {
            },
            complete: function (XMLHttpRequest, textStatus) {
                $("#reset_button").click();
            },*/
            success : function(data){
                if(data.err ==1 ) {    
                    $(".error-box").html(data.err);
                }else {
                    window.location = '<?php echo $this->Html->url(array("controller" => "users","action" => "dashboard","full_base"=>false));?>';
                }
            }
        });	
	})
</script>
