<div class='col-md-12'>
	 
	 <div class="col-md-8 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	     {!! Form::label('name', 'الأسم') !!}
	     {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
	     <small class="text-danger">{{ $errors->first('name') }}</small>
	 </div>

	 <div class="col-md-8 form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
	     {!! Form::label('desc', 'الوصف') !!}
	     {!! Form::textarea('desc', null, ['class' => 'form-control', 'required' => 'required']) !!}
	     <small class="text-danger">{{ $errors->first('desc') }}</small>
	 </div>

	 <div class="col-md-8 form-group">
	     <div class="checkbox{{ $errors->has('show_side_bar') ? ' has-error' : '' }}">
	         <label for="show_side_bar">
	             {!! Form::checkbox('show_side_bar', 1, false )!!} عرض في الشريط الجانبي ؟
	         </label>
	     </div>
	     <small class="text-danger">{{ $errors->first('show_side_bar') }}</small>
	 </div>
 
</div>
 <button class="col-md-4 btn btn-primary">
 	{{ $text }}
 </button>