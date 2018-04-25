@section('contentadmin')

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Registration</h3>
        @if (Session::has('flash_message'))
          <div class="alert alert-success col-xs-12" role="alert">
            {{Session::get('flash_message')}}
          </div>
        @endif
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form validation <small>Create a new admin</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <form class="form-horizontal form-label-left" method="POST" action="/admin/register" id="registerform">
            {{ csrf_field() }}
              <span class="section">Personal Info</span>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Full Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control col-md-7 col-xs-12" id="name" name="name" placeholder="both name(s) e.g Jon Doe" data-validate-words="2" required>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-Mail Address <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<input type="email" class="form-control col-md-7 col-xs-12" id="email" placeholder="email@example.com" name="email" required>
                </div>
              </div>

              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Password</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<input type="password" class="form-control col-md-7 col-xs-12" id="password" name="password" placeholder="password" required>
                </div>
              </div>

              <div class="item form-group">
                <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<input type="password" class="form-control col-md-7 col-xs-12" id="password_confirmation" name="password_confirmation" required>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <a role="button" class="btn btn-primary" href="/admin/home">Cancel</a>
                  <button type="submit" class="btn btn-success">Register</button>
                </div>
              </div>
              @include('layouts.errors')
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
@endsection