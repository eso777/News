
<div class="form-group{{ $errors->has('type_name') ? ' has-error' : '' }}">
    {!! Form::label('type_name', 'نوع المقالة') !!}
    {!! Form::text('type_name', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('type_name') }}</small>
</div>

<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
    {!! Form::label('price', 'السعر بالجنية') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('price') }}</small>
</div>

<button type="submit" class="btn btn-primary">
	{{ $btnName }}	
</button>