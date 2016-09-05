@extends('admin.layout')
@section('title' , 'تعديل الاخبار العاجلة')

@section('content')
	
	<div class="panel panel-primary">
		<div class="panel-heading text-center">تعديل الخبر</div> 
		<div class="panel-body">
			<div class="col-md-10">
				{!! Form::model($breakingNews, ['action' =>['breakingNewsCtrl@update',$breakingNews->id], 'method' => 'PUT', 'class' => 'form-horizontal' ,'files'=>true]) !!}

					@include('admin.breakingNews._form',['type'=>'edit' , 'btnName'=>'حفظ التعديلات']) 				
			
				{!! Form::close() !!}
    		</div>		
		</div>
	</div>

@endsection

