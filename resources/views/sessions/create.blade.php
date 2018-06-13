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

	<div class="separator">
        <p class="change_link">Wrong direction ?
                  <a href="/" class="to_register"><i class="fa fa-home"></i> Go back to our website. </a>
        </p>
    </div>

    <h1 id="site">Cell'ection</h1>

	@include('layouts.errors')

</form>
@endsection