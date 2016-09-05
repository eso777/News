
<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('title', 'عنوان الخبر') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('title') }}</small>
</div>

<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
    {!! Form::label('content', 'محتوي الخبر') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('content') }}</small>
</div>

<div>
    <button type="submit" class="btn btn-primary">
    {{ $btnName }}
    </button>
</div>