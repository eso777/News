<div class="form-group{{ $errors->has('page_name') ? ' has-error' : '' }}">
    {!! Form::label('page_name', 'الأسم') !!}
    {!! Form::text('page_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('page_name') }}</small>
</div>

<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
    {!! Form::label('content', 'محتوي الصفحة') !!}
    {!! Form::textarea('content', null, ['class' => 'ckeditor form-control' ,'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('content') }}</small>
</div>


<button type="submit" class="btn btn-primary">
	{{  $btnName }}	
</button>


