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
		{{ Form::model($artikelsbyid,array('route' =>array('artikel.update',$artikelsbyid->id),'method'=>'PUT')) }}
		
		{{ Form::hidden('id', $artikelsbyid->id) }}
		<div class="form-group">
			<label for="judul">Title</label>
			{{ Form::text('title', null, array('class' => 'form-control','placeholder'=>'masukkan title')) }}
			{{ '<div>'.$errors->first('title').'</div>' }}
		</div>
		<div class="form-group">
			{{ Form::label('alamat', 'Isi') }}
			{{ Form::textarea('isi', null, array('class' => 'form-control','placeholder'=>'masukkan isi')) }}
			{{ '<div>'.$errors->first('isi').'</div>' }}  
			<br>
		</div>
		<div class="form-group">
			{{ Form::label('author', 'Author') }}
			{{ Form::text('author', null, array('class' => 'form-control','placeholder'=>'masukkan author')) }}
			{{ '<div>'.$errors->first('author').'</div>' }}
		</div>

		<button type="submit" class="btn btn-default">Submit</button>
	{{ Form::close() }}
</div>
<!-- /.panel-body -->
</div>
@stop
