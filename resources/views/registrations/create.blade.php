@section('content')
<div class="content-wrapper">
 	<div class="container">
		<div class="col-sm-8">
			<h1>Register</h1>

			<form method="POST" action="/register" id="registerform">
				{{csrf_field() }}
				<div class="form-group">
					<label for="name">Name : </label>
					<input type="text" class="form-control" id="name" name="name" required>
					
				</div>

				<div class="form-group">
					<label for="emalil">E-Mail Address :</label>
					<input type="email" class="form-control" id="email" name="email" required>	
				</div>

				<div class="form-group">
					<label for="password">Password : </label>
					<input type="password" class="form-control" id="password" name="password" required>
					
				</div>

				<div class="form-group">
					<label for="password_confirmation">Password Confirmation : </label>
					<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
				
				</div>

				<div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Register</button>
				</div>
			
				<script>
					$(function(){
						$('#registerform').submit(function(event) {
							var verified = grecaptcha.getResponse();
							if (verified.length === 0) {
								event.preventDefault();
							}
						});
					});
				</script>

			@include('layouts.errors')	


			</form>
		</div>
	</div>
</div>

@endsection