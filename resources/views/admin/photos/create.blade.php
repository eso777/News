@extends('admin.layout') 
@section('title', 'اضافة صور')

@section('content')
	
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="text-center panel-heading">أضافة صور جديدة</div>	
			<div class="panel-body">
			
				{!! Form::open([ 'action'=>'PhotosCtrl@store', 'files'=>true]) !!}	
					@include('admin.photos._form',['type'=>'create' , 'btnName'=>'حفظ'])
				{!! Form::close() !!}
			</div>	
		</div>
	</div>

@endsection
@stop