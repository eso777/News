@extends('admin.layout')
	@section('title','خبر جديد')
	@section('content')
	<!-- Latest compiled and minified CSS & JS -->
	
		<div class="panel panel-primary">
			<div class="panel-heading text-center">خبر جديد</div>
				<div class="panel-body">
					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
	  				<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#main" aria-controls="main" role="tab" data-toggle="tab">الخبر</a></li>
						<li role="presentation"><a href="#images" aria-controls="images" role="tab" data-toggle="tab">صور الخبر</a></li>
						<li role="presentation"><a href="#publish_oprions" aria-controls="publish_oprions" role="tab" data-toggle="tab">خيارات النشر</a></li>
						<li role="presentation"><a href="#seo" aria-controls="seo" role="tab" data-toggle="tab">تهيئه محركات البحث ( SEO ) </a></li>
					</ul>

					<!-- Tab panes -->
					{!! Form::open(['method' => 'POST', 'action' => 'ArticlesCtrl@store', 'class' => 'form-horizontal','files'=>true]) !!}
						@include('admin.articles.form')

					{!! Form::close() !!}
		</div>	
		<!-- Latest compiled and minified CSS & JS -->
		<script src="http://code.jquery.com/jquery.js"></script>
		<script>
		$(document).ready(function()
		{
			 $(function () {
                $('#datetimepicker1').datetimepicker({
                	format:'YYYY-MM-DD HH:mm A',
                	locale:'en'
                	//extraFormats: [ 'DD.MM.YY' ]
                });
            });
			$.get('{{Url("/")}}/admin/articles/categories/'+$('#writer').val(), function( data )
			{
			  $('#categories_id').find('option').remove();
				  $.each(data, function( index, value )
				  {
			  		$.each(value, function( k, v ) {
				  		$('#categories_id').append('<option value="'+v.id+'">'+v.name+'</option>');
					});
				});
			});
		})

		$('#writer').on('change',function(argument) {
			$('#categories_id').addClass('disabled');
			$.get('{{Url("/")}}/admin/articles/categories/'+$('#writer').val(), function( data )
			{
			  $('#categories_id').find('option').remove();
				  $.each(data, function( index, value ) {
				  		$.each(value, function( k, v ) {
					  		$('#categories_id').append('<option value="'+v.id+'">'+v.name+'</option>');
						});
					});
			});
			$('#categories_id').removeClass('disabled');
		});
			
		</script>
	@endsection
@stop