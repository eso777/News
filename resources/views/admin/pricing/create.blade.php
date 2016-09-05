@extends('admin.layout')
@section('title' , 'أسعار المقالات')
@section('content')
		
	<div class="panel panel-primary">
		<div class="panel-heading text-center">أضافة </div> 
		<div class="panel-body">
			<div class="col-md-10">
			{!! Form::open(['action'=>'PricingCtrl@store','class' => 'form-horizontal']) !!}
				@include('admin.pricing._form',['type'=>'create' , 'btnName'=>'حفظ'])
			{!! Form::close() !!}
	    </div>		
		</div>
	</div>
	
</div>
@endsection
@stop

