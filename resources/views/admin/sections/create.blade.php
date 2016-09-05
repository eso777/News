@extends('admin.layout')
@section('title' , 'الأقسام')

@section('content')
	
	<div class="panel panel-primary">
	
		<div class='panel-heading'>أضافة قسم جديد</div>
		<div class='panel-body'>
			{!! Form::open(['method' => 'POST', 'action' => 'SectionsCtrl@store', 'class' => 'form-horizontal']) !!}
					@include('admin.sections._form',['text'=>'أضافة'])
			{!! Form::close() !!}
		</div>
		
	</div>

@endsection

