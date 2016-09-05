@extends('admin.layout')
@section('title' , 'تعديل حساب صحفي جديد')

@section('content')

	<div class="panel panel-primary">
		<div class="panel-heading text-center">تعديل حساب الصحفي ( {{ $jourAcc->fname }} )</div> 
		<div class="panel-body">
			<div class="col-md-10">
				{!! Form::model($jourAcc, ['action' =>['JournalistsAccCtrl@update',$jourAcc->id], 'method' => 'PUT', 'class' => 'form-horizontal' ,'files'=>true]) !!}

					@include('admin.journalistsAcc._form',['type'=>'edit' , 'btnName'=>'حفظ التعديلات']) 				
			
				{!! Form::close() !!}
    		</div>		
		</div>
	</div>

@endsection
@stop