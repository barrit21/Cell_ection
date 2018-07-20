@section('contentsessions')
<form method="POST" action="/admin/login">
	{{csrf_field()}}
	<h1>Sign In</h1>
	<div class="form-group">
		<input type="email" class="form-control" id="email" name="email">
	</div>

	<div class="form-group">
		<input type="password" class="form-control" id="password" name="password">
	</div>

	<div class="form-group" id="signinbutton">
		<button type="submit" class="btn btn-default submit">Sign In</button>
	</div>

    <h1 id="site"> <a href="/" class="to_register"> <i class="fa fa-home"></i> Cell'ection </a></h1>

	@include('layouts.errors')

</form>
@endsection