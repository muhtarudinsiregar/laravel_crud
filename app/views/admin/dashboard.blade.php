@extends("admin.layout.master")
@include("admin.layout.notif")
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
        <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
        <div class="pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                    Actions
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Action</a>
                    </li>
                    <li><a href="#">Another action</a>
                    </li>
                    <li><a href="#">Something else here</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover tablesorter">
                <thead>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Update At</th>
                    <th>Action</th>
                </thead>
                <tbody>

                    @foreach($artikels as $value)
                    <tr>
                        <td> {{ $value->title }} </td>
                        <td> {{ $value->author }} </td>
                        <td> {{ $value->updated_at }} </td>
                        <td>
                            {{ Form::open(array('url' => 'artikel/' . $value->id)) }}
                                <div class="btn-group">
                                    <a href="{{ URL::to('artikel/' . $value->id . '/edit') }}" class="btn btn-primary">Ubah</a>
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{Form::button('Hapus', array('type' => 'submit', 'class' => 'btn btn-primary'))}}
                                </div>
                            {{ Form::close() }}
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
                {{ $artikels->links() }}
            </div>
        </div>
        <!-- /.panel-body -->
    </div>

    @stop