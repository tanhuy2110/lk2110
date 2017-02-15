<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
	<style type="text/css">
		.error{
			color: red;
		}

	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form action="" method="POST" role="form" id="form-login">
					<legend>Login</legend>
						<div class="alert alert-danger error errorLogin" style="display: none;">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<p style="color: red;display: none" class="error errorLogin"></p>
						</div>					
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email')}}">
						<p style="color: red; display: none" class="error errorEmail"></p>			
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" id="password" placeholder="Password" name="password">
						<p style="color: red; display: none" class="errorPassword"></p>
					</div>
					<div class="form group">
						<input type="checkbox" name="remember"> Remember
					</div>
				
					<button id="sigin" type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(function(){
		$('#form-login').validate({
			rules : {
				email : {
					required : true,
					email : true,					
				},
				password : {
					required :true,
					minlength : 8
				}
			},
			messages: {
				email : {
					required : "Email khong duoc de trong",
					email : "Email khong dung dinh dang"
				},
				password : {
					required : "Mat khau khong duoc de trong",
					minlength : "Password khong du 8 ky tu"
				}
			},
			submitHandler : function(){
				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
			$.ajax({
				'url' : 'login',
				'data':{
					'email' :$('#email').val(),
					'password' :$('#password').val()
				},
				'type' :'POST',
				success: function (data){
					console.log(data);
					if (data.error == true){
						$('.error').hide();
						if(data.message.email != undefined){
							$('.errorEmail').show().text(data.message.email[0]);
						}
						if(data.message.password != undefined){
							$('.errorPassword').show().text(data.message.password[0]);
						}
						if(data.message.errorlogin != undefined){
							$('.errorLogin').show().text(data.message.errorlogin[0]);
						}
					} else{
						window.location.href = "http://localhost/www/adwooden/public/";
					}
				}
			});
			}
		});
		/*$('#sigin').click(function(e){
			e.preventDefault();
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
			$.ajax({
				'url' : 'login',
				'data':{
					'email' :$('#email').val(),
					'password' :$('#password').val()
				},
				'type' :'POST',
				success: function (data){
					console.log(data);
					if (data.error == true){
						$('.error').hide();
						if(data.message.email != undefined){
							$('.errorEmail').show().text(data.message.email[0]);
						}
						if(data.message.password != undefined){
							$('.errorPassword').show().text(data.message.password[0]);
						}
						if(data.message.errorlogin != undefined){
							$('.errorLogin').show().text(data.message.errorlogin[0]);
						}
					} else{
						window.location.href = "http://localhost/www/adwooden/public/";
					}
				}
			});
		})*/
	});
</script>
</html>
