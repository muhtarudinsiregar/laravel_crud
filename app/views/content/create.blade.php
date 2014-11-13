@extends("admin/master")
@section("content")
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block sukses">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>Success</h4>
	{{ $message }}
</div>
@endif

<div class="panel panel-default">
	<div class="panel-heading">
		<i class="fa fa-bar-chart-o fa-fw"></i> Create Artikel
		
	</div>
	<!-- /.panel-heading -->
	<div class="panel-body">
		<form role="form" action="store" method="POST">
			<div class="form-group">
				<label for="judul">Title</label>
				<input type="text" class="form-control" id="judul" placeholder="Enter title" name="title">
			</div>
			<textarea class="form-control" rows="6" name="isi"></textarea>
			<br>
			<div class="form-group">
				<label for="judul">Author</label>
				<input type="text" class="form-control" id="" placeholder="Enter Author" name="author">
			</div>

			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
	<!-- /.panel-body -->
</div>
@stop
