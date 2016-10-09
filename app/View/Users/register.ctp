<div class="modal-dialog"> 
 	<?php  echo $this->Form->create('User',array('class'=>'form-horizontal style-form','enctype'=>'multipart/form-data','validate'));?>
 	<?php 
 		echo $this->Form->hidden('role',array('value'=>2));
 		echo $this->Form->hidden('id');
 	?>
 	<div class="modal-content p-0">
		<div class="modal-body"> 
			<a href="" >
				<?php echo $this->Html->image('front/close_popup.png', array('style'=>'margin-left:90%;margin-top:3%;'));?>
			</a>
			<div class="error-box"></div>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
				<?php echo $this->Html->image('front/close_popup_black.png');?>
			</button> 
			<h2 class="" style="text-align:center;font-size:25px;"><b>Register Now</b></h2>
			<p style="text-align:center;font-size:12px;">Nulla eu urna elementum nunc lacinia egestas.Quisque interdum ,<br><span>dolor a eleifend imperdiet.</span></p>
			
			<div style="margin-left:30%;">
					<div class="btn-group  btn-lg btn-group-center" style="border-radius:10px;">
						<a href="#" class="btn btn-success bt-lg role" data-value="2">INSTRUCATOR</a>
						<a href="#" class="btn btn-success bt-lg role" data-value="3">STUDENT</a>
					</div>
			</div><br>

			<div class="row"> 
				<div class="col-md-6"> 
					<div class="form-group"> 
						<div class="input-group">
								<span class="input-group-addon" style="background-color:#3d556d;">
								<?php echo $this->Html->image('front/email_address.png');?>
								</span>
								<!-- <input type="text" class="form-control" id="field-1" placeholder="Full Name" style="border-radius:3%;"> -->
								<?php echo $this->Form->input('fname',array('class'=>'form-control','label'=>false,'div'=>false,'placeholder'=>'Full Name','style'=>'border-radius:3%'));?>
						</div>
					</div> 
				</div> 
				<div class="col-md-6"> 
					<div class="form-group"> 
						<div class="input-group">
								<span class="input-group-addon" style="background-color:#3d556d;">
								<?php echo $this->Html->image('front/email_address.png');?>
								</span>
								<!-- <input type="text" class="form-control" id="field-2" placeholder="Email Address" style="border-radius:3%;"> -->
								<?php echo $this->Form->input('email',array('class'=>'form-control','label'=>false,'div'=>false,'placeholder'=>'Email Address','style'=>'border-radius:3%','error'=>false));?>
						</div>
						<?php echo $this->Form->error('email', null, array('class' => 'error-message'));?>
					</div> 
				</div> 
			</div>

			<div class="row"> 
				<div class="col-md-6"> 
					<div class="form-group"> 
						<div class="input-group">
								<span class="input-group-addon" style="background-color:#3d556d;">
								<?php echo $this->Html->image('front/password.png');?>
								</span>
								<!-- <input type="text" class="form-control" id="field-1" placeholder="Password" style="border-radius:3%;"> -->
								<?php echo $this->Form->input('password',array('class'=>'form-control','label'=>false,'div'=>false,'required'=>true,'placeholder'=>'Password','style'=>'border-radius:3%'));?>
						</div>
					</div> 
				</div> 
				<div class="col-md-6"> 
					<div class="form-group"> 
						<div class="input-group">
								<span class="input-group-addon" style="background-color:#3d556d;">
								<?php echo $this->Html->image('front/password.png');?>
								</span>
								<!-- <input type="text" class="form-control" id="field-2" placeholder="Confirm Password" style="border-radius:3%;"> -->
								<?php echo $this->Form->input('cpassword',array('type'=>'password','class'=>'form-control','label'=>false,'div'=>false,'placeholder'=>'Confirm Password','style'=>'border-radius:3%','equalTo'=>'#UserPassword'));?>
						</div>
					</div> 
				</div> 
			</div> <br>

			<button type="submit" class="btn btn-default btn-lg btn-block reg-submit" style="width:35%;background-color:#2e566e;color:white;margin-left:30%;font-size:16px; " >Register</button> 
		</div><br><br>
	</div> 
	<?php echo $this->Form->end();?>  
</div>

<script type="text/javascript">
	var form = $("#UserRegisterForm");
	form.validate();
	form.on('submit', function(e){
        var isvalidate = form.valid();
        if(isvalidate)
        {
            e.preventDefault();
	        var paramss = $(this).serialize();
			var URL = '<?php echo $this->Html->url(array("controller" => "users","action" => "register","full_base"=>false));?>';
			$.ajax({
	            url : URL,
	            type: "POST",
	            data : paramss,
	            beforeSend: function (XMLHttpRequest) {
	            },
	            complete: function (XMLHttpRequest, textStatus) {
	                $("#reset_button").click();
	            },
	            success : function(data){
	                try {
					    var res = JSON.parse(data);
					    if(res.err ==0 ) {    
	                    	window.location = '<?php echo $this->Html->url(array("controller" => "pages","action" => "home","full_base"=>false));?>';
		                }else {
		                	
		                }
					} catch(error) {
					    $('#myModal').html(data);
					}
	            }
	        });	
        }
    });
	
	$(".role").click(function(){
		$('#UserRole').val($(this).data('value'));
	})
</script>
