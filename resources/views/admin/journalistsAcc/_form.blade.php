<div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
    {!! Form::label('fname', 'الأسم الأول ') !!}
    {!! Form::text('fname', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('fname') }}</small>
</div>
<div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
    {!! Form::label('lname', 'الأسم الأخير') !!}
    {!! Form::text('lname', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('lname') }}</small>
</div>
<div class="form-group{{ $errors->has('type_acc') ? ' has-error' : '' }}">
    {!! Form::label('type_acc', 'نوع الحساب') !!}
    {!! Form::select('type_acc', ['0'=>'بالمقالة' , '1'=>'شهري'], null, ['id' => 'type_acc', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('type_acc') }}</small>
</div>
@if(@$type == 'create')
    <div class="articel-month" style="display:none" >
        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
            {!! Form::label('price', 'السعر بالجنية') !!}
            {!! Form::text('price', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('price') }}</small>
        </div>
        <div class="form-group{{ $errors->has('target') ? ' has-error' : '' }}">
            {!! Form::label('target', 'التارجت الشهري') !!}
            {!! Form::text('target', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('target') }}</small>
        </div>
    </div>
@else
    <div class="articel-month" @if($jourAcc->type_acc == 0){!! 'style="display:none"' !!}@endif>
        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
            {!! Form::label('price', 'السعر بالجنية') !!}
            {!! Form::text('price', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('price') }}</small>
        </div>
        <div class="form-group{{ $errors->has('target') ? ' has-error' : '' }}">
            {!! Form::label('target', 'التارجت الشهري') !!}
            {!! Form::text('target', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('target') }}</small>
        </div>
    </div>
@endif
<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
    {!! Form::label('img', 'اختر صورة') !!}
    {!! Form::file('img') !!}
    <p class="help-block">اختر صورة مناسبة</p>
    <small class="text-danger">{{ $errors->first('img') }}</small>
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'البريد الألكتروني') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com' , 'autocomplete'=>"off"]) !!}
    <small class="text-danger">{{ $errors->first('email') }}</small>
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    {!! Form::label('password', 'كلمة السر') !!}
    {!! Form::input('password','password', null, ['class' => 'form-control' , 'autocomplete'=>'new-password']) !!}
    <small class="text-danger">{{ $errors->first('password') }}</small>
    @if(@$type == 'edit')
        {!!"<small class='text-danger'> 'Leave it blank if you do not want to change your password' </small>" !!}
    @endif
</div>
<div class="col-md-12 manager-info ">
    @if(@$type !== 'edit')
    @foreach ($sections as $section)
    <ol class="col-lg-6 list-unstyled">
        <li>
            <strong class="col-md-3">{{ $section->name }}</strong>
            <input class="col-md-1" type="checkbox" name="sections_controls[]" value="{{ $section->id }}">
        </li>
    </ol>
    @endforeach
    @else
    @foreach ($sections as $section)
        <ol class="col-lg-6 list-unstyled">
            <li>
                <strong class="col-md-3">{{ $section->name }}</strong>
                <input class="col-md-1" type ='checkbox'
                name="sections_controls[]" value="{{ $section->id }}"
                @if(in_array($section['id'],$sections_controls))
                 {{'checked'}}
                @endif />
            </li>
        </ol>
    @endforeach
    @endif
</div>
<div>
    <button type="submit" class="waves-effect waves-light btn">
         {{ $btnName }}
    </button>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script type="text/javascript">
    
    

    $('#type_acc').on('change',function(event) {

        if(!$('#type_acc').find(":selected").val() == 0)
        {
            $('.articel-month').slideDown(1000);
        }

        if($('#type_acc').find(":selected").val() == 0)
        {
            $('.articel-month').slideUp(1000);
        }
    });

</script>