@extends('admin.layout')
@section('title' , 'اضافة حساب صحفي جديد')
@section('content')
		
	<div class="panel panel-primary">
		<div class="panel-heading text-center">أضافة حساب لصحفي جديد</div> 
		<div class="panel-body">
			<div class="col-md-10">
			{!! Form::open(['action'=>'JournalistsAccCtrl@store', 'class' => 'form-horizontal' , 'files'=>true]) !!}
				@include('admin.journalistsAcc._form',['type'=>'create' , 'btnName'=>'حفظ'])
			{!! Form::close() !!}
	    </div>		
		</div>
	</div>
	
</div>
@endsection
@stop

