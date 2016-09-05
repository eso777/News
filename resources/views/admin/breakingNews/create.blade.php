@extends('admin.layout')
@section('title' , 'اضافة خبر عاجل جديد')
@section('content')
		
	<div class="panel panel-primary">
		<div class="panel-heading text-center">أضافة خبر عاجل</div> 
		<div class="panel-body">
			<div class="col-md-10">
			{!! Form::open(['action'=>'breakingNewsCtrl@store','class' => 'form-horizontal' , 'files'=>true]) !!}
				@include('admin.breakingNews._form',['type'=>'create' , 'btnName'=>'حفظ'])
			{!! Form::close() !!}
	    </div>		
		</div>
	</div>
	
</div>
@endsection
@stop

