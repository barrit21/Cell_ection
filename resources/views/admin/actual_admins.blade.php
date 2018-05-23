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

    @if (Session::has('flash_message'))
      <div class="alert alert-success" role="alert">
        {{Session::get('flash_message')}}
      </div>
    @endif

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
                  
                  <?php 
                    $currentuser = Auth::user();

                    if($currentuser->name !== $user->name){
                      echo '<a type="button" href="{{ url('.'/admin/actual_admins'.',$user->id) }}" class="remove_item btn btn-primary btn-xs">Delete Admin <i class="fa fa-times"></i></a>';
                    }
                  ?>    

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

