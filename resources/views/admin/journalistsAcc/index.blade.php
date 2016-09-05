@extends('admin.layout')
@section('title' , 'حسابات الصحفيين')
@section('content')
<a href="{!!Url('/')!!}/admin/Journalists/acc/create" class="btn btn-success"><i class="fa fa-plus"></i></a>
<br>
<br>

@if(Session::has('msg'))
	<div class="alert alert-success">
		{{ Session::get('msg') }}
	</div>
@endif

<div class="panel panel-success">
	<div class="panel-heading">جميع حسابات الصحفيين المتاحة | أجمالي الصحفيين المفعلين : {{ $userActived }} </span> | أجمالي الصحفيين المعطليين :<span style='color:#ffc107'> {{ $userDisabled }} </span>
	</div>
	<table class="table table-sm table-responsive">
		<thead class="">
			<th>#</th>
			<th>الاسم الأول</th>
			<th>الاسم الأخير</th>
			<th>نوع الحساب</th>
			<th>الصورة</th>
			<th>البريد الالكترونى</th>
			<th colspan="2">خيارات</th>
		</thead>
		<tbody>
			@foreach($accounts as $account)

			<tr @if($account->status == 0){!! 'style="color:#000; background-color:#999"'!!} @endif !!}>
				
				<td>{{ $account->id }}</td>
				<td>{{ $account->fname }}</td>
				<td>{{ $account->lname }}</td>
				<td>
					@if($account->type_acc == 0)
						{{ 'بالمقالة' }}
					@else
						{{ 'شهري' }}
					@endif
				</td>
			
				<td>
					<img src = "{!!Url('/')!!}/uploads/back-end/journalistsAcc/{{$account->image }}" style="width:50px;height:50px">
				</td>
				<td>
					{{ $account->email }}
				</td>
				<td>
					<a href="{{ Url('/') }}/admin/Journalists/acc/{{ $account->id }}/edit" class="btn btn-success">تعديل</a>
				</td>
				<td>
					@if($account->status == 0 )
						<a href="{{ Url('/') }}/admin/disableJour/{{ $account->id }}" class="btn btn-success">
						تفعيل الحساب 				
						</a>
					@else
						<a href="{{ Url('/') }}/admin/disableJour/{{ $account->id }}" class="btn btn-danger">
						تعطيل الحساب 				
						</a>
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<div class="">{!! $accounts->render() !!}</div>

<!-- Latest compiled and minified CSS & JS -->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/2.5.1/jquery-confirm.min.js"></script>

<script>
	$('.conf').confirm();
</script>

@endsection
@stop

