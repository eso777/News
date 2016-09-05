@extends('admin.layout') 
@section('title', 'اضافة صفحات')

@section('content')
	
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="text-center panel-heading">أضافة صفحة جديدة</div>	
			<div class="panel-body">
			
				{!! Form::open([ 'action'=>'PagesCtrl@store' ]) !!}	
					@include('admin.pages._form',['type'=>'create' , 'btnName'=>'حفظ'])
				{!! Form::close() !!}
			</div>	
		</div>
	</div>

@endsection
@stop