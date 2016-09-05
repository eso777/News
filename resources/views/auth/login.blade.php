@extends('app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					{!! Form::open() !!}
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						{!! Form::label('email', 'Email address') !!}
						{!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
						<small class="text-danger">{{ $errors->first('email') }}</small>
					</div>
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						{!! Form::label('password', 'Password') !!}
						{!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
						<small class="text-danger">{{ $errors->first('password') }}</small>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="remember"> Remember Me
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn btn-primary">Login</button>
							<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection