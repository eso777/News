@extends('admin.layout') 
@section('title', 'تعديل بيانات الصفحات')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="text-center panel-heading">أضافة صفحة جديدة</div>	
			<div class="panel-body col-md-11">
				{!! Form::model($page, ['action' => ['PagesCtrl@update', $page->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
					@include('admin.pages._form',['type'=>'edit' , 'btnName'=>'حفظ التعديلات'])
				{!! Form::close() !!}				
			</div>	
		</div>
	</div>
@endsection

@stop