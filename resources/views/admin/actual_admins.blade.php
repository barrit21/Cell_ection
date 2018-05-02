@section('contentadmin')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Admins</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_content">
            <div class="row">

              <div class="clearfix"></div>
              <?php foreach ($users as $user) : ?>
              <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                <div class="well profile_view">
                  <div class="col-sm-12">
                    <h4 class="brief"><i>Admin</i></h4>
                    <div class="left col-xs-7">
                      <h2><?php echo $user->name; ?></h2>
                      <p><strong>Email: </strong> <?php echo $user->email; ?> </p>
                    </div>
                    <div class="right col-xs-5 text-center">
                      <img src="/img/user.png" class="img-circle img-responsive">
                    </div>
                  </div>
                  <div class="col-xs-12 bottom text-center">
                    
                    <div class="col-xs-12 col-sm-6 emphasis">
                      <button type="button" class="btn btn-primary btn-xs">
                        <i class="fa fa-user"> </i> Delete Admin
                      </button>
                    </div>
                    
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
@endsection