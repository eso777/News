@extends('admin.layout')
@section('title' , 'الأخبار العاجلة')
@section('content')
<a href="{!!Url('/')!!}/admin/breaking-news/create" class="btn btn-success"><i class="fa fa-plus"></i></a>
<br>
<br>

@if(Session::has('msg'))
	<div class="alert alert-success">
		{{ Session::get('msg') }}
	</div>
@endif

<div class="panel panel-success">
	<div class="text-center panel-heading">الاخبار العاجلة</div>
	<table class="table table-responsive table-striped">
	<thead>
		<th>#</th>
		<th>عنوان الخبر </th>
		<th>محتوي الخبر </th>
		<th colspan="2">خيارات</th>
	</thead>
	<tbody>
		@foreach($news as $row)
		<tr>
			<td>{{ $row->id }}</td>
			<td>{{ $row->title }}</td>
			<td>{{ $row->content }}</td>
			<td>
				<a href="{{ Url('/') }}/admin/breaking-news/{{ $row->id }}/edit" class="btn btn-warning"> تعديل الخبر </a>
			</td>
			<td>
				{!! Form::open(['method'=>'DELETE','action' =>['breakingNewsCtrl@destroy',$row->id]]) !!}
					{!! Form::submit('حذف', ['class'=>'btn btn-danger conf','data-title'=>"سيتم 	حذف كل بيانات هذا العضو هل انت متأكد من الحذف ؟"] ) !!}
				{!! Form::close() !!}
			</td>
		</tr>
		@endforeach
	</tbody>
	</table>
</div>
	{!! $news->render() !!}

<!-- Latest compiled and minified CSS & JS -->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/2.5.1/jquery-confirm.min.js"></script>

<script>
	$('.conf').confirm();
</script>

@endsection
@stop

