@extends('admin.layout')
@section('title' , 'الأقسام')

@section('content')
	<a href="{!!Url('/')!!}/admin/sections/create" class="btn btn-success"><i class="fa fa-plus"></i></a>
<br>
<br>
<!-- 
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 -->

@if(Session::has('msg'))
	<div class="alert alert-success">
		{{ Session::get('msg') }}
	</div>
@endif

<table class="table table-responsive table-striped">
	<thead>
		<th>#</th>
		<th>الاسم</th>
		<th>الوصف </th>
		<th colspan="2">خيارات</th>
	</thead>
	<tbody>
		@foreach($sections as $section)
		<tr>
			<td>{{ $section->id }}</td>
			<td>{{ $section->name }}</td>
			<td>{{ $section->desc }}</td>
			<td>
				<a href="{{ Url('/') }}/admin/sections/{{ $section->id }}/edit" class="		btn btn-warning" title='تعديل القسم'><i class='fa fa-edit'></i>
				</a>
			</td>
			<td>
			<i class='fa fa-delete'>
				{!! Form::open(['method'=>'DELETE','action' => ['SectionsCtrl@destroy' , $section->id] ]) !!}
			
				{!! Form::submit('حذف',['class'=>'btn btn-danger','onClick' =>'return confirm("سيتم حذف القسم . هل متأكد من الحذف ؟")' , 'title'=>'حذف القسم'] ) !!}
					
				{!! Form::close() !!}
			</i>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
@stop