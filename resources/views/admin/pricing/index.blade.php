@extends('admin.layout')
@section('title' , 'أسعار المقالات')
@section('content')
<a href="{!!Url('/')!!}/admin/pricing/create" class="btn btn-success"><i class="fa fa-plus"></i></a>
<br>
<br>

@if(Session::has('msg'))
	<div class="alert alert-success">
		{{ Session::get('msg') }}
	</div>
@endif

<div class="panel panel-success">
	<div class="panel-heading">أنواع المقالات</div>
	<table class="table table-sm table-responsive">
		<thead class="">
			<th>#</th>
			<th>أسم النوع</th>
			<th>سعر المقال بالـجنية</th>
			<th>تعديل </th>
			<th>حذف</th>
		</thead>
		<tbody>
			@foreach($pricing as $row)
			<tr>		
				<td>{{ $row->id }}</td>
				<td>{{ $row->type_name }}</td>
				<td>{{ $row->price }}</td>
				<td>
					<a href="{{ Url('/') }}/admin/pricing/{{ $row->id }}/edit" class="btn btn-success">تعديل</a>
				</td>
				<td>
					{!! Form::open(['method'=>'DELETE' , 'action'=>['PricingCtrl@destroy',$row->id]]) !!}
						{!! Form::submit('حذف',['class'=>'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<div class="">{!! $pricing->render() !!}</div>

<!-- Latest compiled and minified CSS & JS -->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/2.5.1/jquery-confirm.min.js"></script>

<script>
	$('.conf').confirm();
</script>

@endsection
@stop

