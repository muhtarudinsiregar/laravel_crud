@extends("admin.layout.master")
@section("content")

@if (Session::has('message'))
<div class="alert alert-success alert-block sukses">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Success</h4>
    {{ Session::get('message') }}
</div>
@endif

<div class="panel panel-default">
	<div class="panel-heading">
		<i class="fa fa-bar-chart-o fa-fw"></i> Create Artikel
		
	</div>
	<!-- /.panel-heading -->
	<div class="panel-body">
		{{ Form::open(array('url'=>'artikel')) }}
			<div class="form-group">
				<label for="judul">Title</label>
				<input type="text" class="form-control"placeholder="Enter title" name="title">
				{{ '<div>'.$errors->first('title').'</div>' }}
			</div>
			<textarea class="form-control" rows="6" name="isi"></textarea>
			{{ '<div>'.$errors->first('isi').'</div>' }}
			<br>
			<div class="form-group">
				<label for="judul">Author</label>
				<input type="text" class="form-control"placeholder="Enter Author" name="author">
				{{ '<div>'.$errors->first('author').'</div>' }}
			</div>

			<button type="submit" class="btn btn-default" value="Simpan">Submit</button>
		</form>
	</div>
	<!-- /.panel-body -->
</div>
@stop
