@section('contentadmin')
<!-- page content -->
<div class="right_col" role="main">
	<form action="" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="file" name="fichier" ></input>
		<input name="enregistrer" value="Submit" type="submit"></input>
	</form>
</div>


@endsection