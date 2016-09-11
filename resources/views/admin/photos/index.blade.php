@extends('admin.layout')
@section('title' , 'الصور')
@section('content')
<a href="{!!Url('/')!!}/admin/photos/create" class="btn btn-success">
	<i class="fa fa-plus"></i></a>

<br />
<br />

@if(Session::has('msg'))
	<div class="alert alert-success">
		{{ Session::get('msg') }}
	</div>
@endif

@if ($photos->total() > 0 )

	<div class="panel panel-info">
		<div class="text-center panel-heading">الصور</div>
		<div class="panel-body">
			<i class="fa fa-arrow-circle-o-right" aria-hidden="true" id='arrow' title:'Click To view Images';></i>
			<div class="img-section col-lg-12 ">
				 <?php $i = 0 ; $images ='' ; ?>
				@foreach ($photos as $photo)
                <?php $images = explode('|', $photo->image) ;?>
					<div class="col-lg-3" id="div">
						<a href='#'>
							<i class="fa fa-times" aria-hidden="true" title='حذف الصورة'></i>
						</a>
						{!! $i = 1 !!}
						@foreach($images as $image)
							<img src="{!! Url('/') !!}/uploads/back-end/photos/{{ $image }}" class="img-thumbnail">
							<small class='pull-left text text-danger '>{{ $photo->name }}</small>
						{!! $i++ !!}
							
						@endforeach
					</div>
				@endforeach
			</div>
		</div>		
	</div>		

@else
	<div class="alert alert-info"> عفوا , لا توجد صور للعرض</div>
@endif


@endsection
@stop