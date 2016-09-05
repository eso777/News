<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'الأسم') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>

<div class="contant-images-file">
	<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
	    {!! Form::label('img', ' ') !!}
	    {!! Form::file('img[]', ['class'=>'form-control']) !!}
	    <p class="help-block">أضافة صور مناسبة</p>
	    <small class="text-danger">{{ $errors->first('img') }}</small>
	</div>
</div>

<hr>

<p title="أضافة المزيد من الصور">
	<i class='btn btn-info fa fa-plus fa-3x' id="img-file-plus"></i>
</p>

<p>
	<div class="alert alert-danger" id='msg_err'>
		عفوا , لقد تجاوزت الحد المسموح بة .
	</div>
</p>


<button type="submit" class="btn btn-primary">
	{{  $btnName }}	
</button>


