@extends('admin.layout')
@section('title' , 'تعديل القسم')

@section('content')
	
	<div class="panel panel-primary">
	
		<div class='panel-heading'>تعديل القسم</div>
		<div class='panel-body'>
			{!! Form::model($section, ['action'=>['SectionsCtrl@update',$section->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
			    @include('admin.sections._form',['text'=>'حفظ التعديلات'])
			{!! Form::close() !!}
		</div>
		
	</div>

@endsection

