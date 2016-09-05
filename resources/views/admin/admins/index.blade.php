@extends('admin.layout')
@section('title' , 'المديرين ')
@section('content')
<a href="{!!Url('/')!!}/admin/admins/create" class="btn btn-success"><i class="fa fa-plus"></i></a>
<br>
<br>

@if(Session::has('msg'))
	<div class="alert alert-success">
		{{ Session::get('msg') }}
	</div>
@endif

<div class="panel panel-success">
	<div class="text-center panel-heading">المديرين </div>
	<table class="table table-responsive table-striped">
	<thead>
		<th>#</th>
		<th>الاسم</th>
		<th>البريد الالكترونى</th>
		<th colspan="2">خيارات</th>
	</thead>
	<tbody>
		@foreach($admins as $admin)
		<tr>
			<td>{{ $admin->id }}</td>
			<td>{{ $admin->name }}</td>
			<td>{{ $admin->email }}</td>
			<td>
				<a href="{{ Url('/') }}/admin/admins/{{ $admin->id }}/edit" class="btn btn-warning">تعديل</a>
			</td>
			<td>
				{!! Form::open(['method'=>'DELETE' , 'action' => ['AdminsCtrl@destroy' , $admin->id]]) !!}
				@if(Auth::admin()->get()->id == $admin->id)
				{!! Form::submit('حذف', ['class'=>'btn btn-danger disabled'] ) !!}
				@else
				
				{!! Form::submit('حذف', ['class'=>'btn btn-danger conf','data-title'=>"سيتم حذف كل بيانات هذا العضو هل انت متأكد من الحذف ؟"] ) !!}
				
				@endif
				{!! Form::close() !!}

			</td>
		</tr>
		@endforeach
	</tbody>
	</table>
</div>
	{!! $admins->render() !!}

<!-- Latest compiled and minified CSS & JS -->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/2.5.1/jquery-confirm.min.js"></script>

<script>
	$('.conf').confirm();
</script>

@endsection
@stop

