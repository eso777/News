@extends('admin.layout')
@section('title' , 'تعديل الأسعار ')

@section('content')
	
	<div class="panel panel-primary">
		<div class="panel-heading text-center">تعديل الأسعار</div> 
		<div class="panel-body">
			<div class="col-md-10">
				{!! Form::model($data, ['action' =>['PricingCtrl@update',$data->id], 'method' => 'PUT', 'class' => 'form-horizontal' ,'files'=>true]) !!}

					@include('admin.pricing._form',['type'=>'edit' , 'btnName'=>'حفظ التعديلات']) 				
			
				{!! Form::close() !!}
    		</div>		
		</div>
	</div>

@endsection

