@extends('admin.layout')
@section('title' , 'الصفحات')
@section('content')
<a href="{!!Url('/')!!}/admin/pages/create" class="btn btn-success"><i class="fa fa-plus"></i></a>
<br>
<br>

@if(Session::has('msg'))
	<div class="alert alert-success">
		{{ Session::get('msg') }}
	</div>
@endif
	
<div class="panel panel-success">
	<div class="text-center panel-heading">الصفحات</div>
	<table class="table table-responsive table-striped">
	<thead>
		<th>#</th>
		<th>أسم الصفحة</th>
		<th colspan="2">خيارات</th>
	</thead>
	<tbody>
		@foreach($pages as $page)
		<tr>
			<td>{{ $page->id }}</td>
			<td>{{ $page->page_name }}</td>
			<td>
				<a href="{{ Url('/') }}/admin/pages/{{ $page->id }}/edit" class="btn btn-warning"> تعديل الصفحة </a>
			</td>
			<td>
				{!! Form::open(['method'=>'DELETE','action' =>['PagesCtrl@destroy',$page->id]]) !!}
					{!! Form::submit('حذف', ['class'=>'btn btn-danger conf','data-title'=>"سيتم 	حذف كل بيانات هذا العضو هل انت متأكد من الحذف ؟"] ) !!}
				{!! Form::close() !!}
			</td>
		</tr>
		@endforeach
	</tbody>
	</table>
</div>
	{!! $pages->render() !!}

<!-- Latest compiled and minified CSS & JS -->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/2.5.1/jquery-confirm.min.js"></script>

<script>
	$('.conf').confirm();
</script>

@endsection
@stop

