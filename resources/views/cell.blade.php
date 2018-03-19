@section('content')

<a href= "/">
    Retour
</a>

<div class="panel panel-default">
  <div class="panel-heading"><?php echo $datum->name; ?></div>
  <div class="panel-body">
    <?php echo $datum->replicate; ?>
  </div>
</div>



@stop