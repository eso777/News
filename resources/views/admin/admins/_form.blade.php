<div class="form-group">
	<label class="col-md-4 control-label">الإسم</label>
	<div class="col-md-6">
		{!! Form::text('name',null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label">البريد الإلكترونى</label>
	<div class="col-md-6">
		{!! Form::email('email',null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label">كلمه المرور</label>
	<div class="col-md-6">
		{!! Form::password('password',['class'=>'form-control' , 'autocomplete'=>"new-password"])!!}
		@if(@$help)
		{!!$help!!}
		@endif
	</div>
</div>
<div class="col-md-offset-4">
	<div class="label-control" style="padding-right: 10px;">
		<a href="#" class="btn btn-sm btn-danger show-pre" style="margin-left: 41px;;">صلاحيات المدير</a>
		<a href="#" class="btn btn-sm btn-danger show-cat">صلاحيات الأقسام</a>
	</div>
</div>
<br>
<div id="pre" style="display:none;">
	<div clss="row">
		<div class="col-md-3">
			<h5><strong>صلاحيات المدير</strong></h5>
		</div>
		@if(@$type !== 'edit')
		<div class="col-md-9 manager-info">
			<ul  class="list-unstyled">
				<strong class="col-md-4">اعدادات الموقع</strong>
				<input type="checkbox" name="pre[]" value="settings">
				تحكم في اعدادات الموقع
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">الأعضاء</strong>
				<input type="checkbox" name="pre[]" value="members_add">اضافة
				<input type="checkbox" name="pre[]" value="members_edit">تعديل
				<input type="checkbox" name="pre[]" value="members_active">تفعيل
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">المديرين</strong>
				<input type="checkbox" name="pre[]" value="admins_add">اضافة
				<input type="checkbox" name="pre[]" value="admins_edit">تعديل
				<input type="checkbox" name="pre[]" value="admins_delete">حذف
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">الأقسام</strong>
				<input type="checkbox" name="pre[]" value="cat_add">اضافة
				<input type="checkbox" name="pre[]" value="cat_edit">تعديل
				<input type="checkbox" name="pre[]" value="cat_delete">حذف
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">المقالات</strong>
				<input type="checkbox" name="pre[]" value="articles_add">اضافة
				<input type="checkbox" name="pre[]" value="articles_edit">تعديل
				<input type="checkbox" name="pre[]" value="articles_delete">حذف
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">الصفحات</strong>
				<input type="checkbox" name="pre[]" value="pages_add">اضافة
				<input type="checkbox" name="pre[]" value="pages_edit">تعديل
				<input type="checkbox" name="pre[]" value="pages_delete">حذف
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">التعليقات</strong>
				<input type="checkbox" name="pre[]" value="comments_add">اضافة
				<input type="checkbox" name="pre[]" value="comments_edit">تعديل
				<input type="checkbox" name="pre[]" value="comments_delete">حذف
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">الأعلانات</strong>
				<input type="checkbox" name="pre[]" value="ads_add">اضافة
				<input type="checkbox" name="pre[]" value="ads_edit">تعديل
				<input type="checkbox" name="pre[]" value="ads_delete">حذف
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">الفيديوهات</strong>
				<input type="checkbox" name="pre[]" value="videos_add">اضافة
				<input type="checkbox" name="pre[]" value="videos_edit">تعديل
				<input type="checkbox" name="pre[]" value="videos_delete">حذف
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">الصور</strong>
				<input type="checkbox" name="pre[]" value="img_add">اضافة
				<input type="checkbox" name="pre[]" value="img_edit">تعديل
				<input type="checkbox" name="pre[]" value="img_delete">حذف
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">استطلاع رأي</strong>
				<input type="checkbox" name="pre[]" value="Poll_add">اضافة
				<input type="checkbox" name="pre[]" value="Poll_edit">تعديل
				<input type="checkbox" name="pre[]" value="Poll_delete">حذف
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">الأخبار العاجلة</strong>
				<input type="checkbox" name="pre[]" value="breaking_news_add">اضافة
				<input type="checkbox" name="pre[]" value="breaking_news_edit">تعديل
				<input type="checkbox" name="pre[]" value="breaking_news_delete">حذف
			</ul>
		</div>
		@else 
		<div class="col-md-9 manager-info">
			<ul  class="list-unstyled">
				<strong class="col-md-4">اعدادات الموقع</strong>
				<input type="checkbox" name="pre[]" value="settings" @if(in_array('settings', $pre)){{ 'checked' }}@endif>
				تحكم في اعدادات الموقع
			</ul>
			<ul class="list-unstyled"> 
				<strong class="col-md-4">الأعضاء</strong>
				<input type="checkbox" name="pre[]" value="members_add" @if(in_array('members_add', $pre)){{ 'checked' }}@endif>اضافة
				<input type="checkbox" name="pre[]" value="members_edit" @if(in_array('members_edit', $pre)){{ 'checked' }}@endif>تعديل
				<input type="checkbox" name="pre[]" value="members_active" @if(in_array('members_active', $pre)){{ 'checked' }}@endif>تفعيل
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">المديرين</strong>
				<input type="checkbox" name="pre[]" value="admins_add" @if(in_array('admins_add', $pre)){{ 'checked' }}@endif>اضافة
				<input type="checkbox" name="pre[]" value="admins_edit" @if(in_array('admins_edit', $pre)){{ 'checked' }}@endif>تعديل
				<input type="checkbox" name="pre[]" value="admins_delete" @if(in_array('admins_delete', $pre)){{ 'checked' }}@endif>حذف
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">الأقسام</strong>
				<input type="checkbox" name="pre[]" value="cat_add" @if(in_array('cat_add', $pre)){{ 'checked' }}@endif>اضافة
				<input type="checkbox" name="pre[]" value="cat_edit" @if(in_array('cat_edit', $pre)){{ 'checked' }}@endif>تعديل
				<input type="checkbox" name="pre[]" value="cat_delete" @if(in_array('cat_delete', $pre)){{ 'checked' }}@endif>حذف
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">المقالات</strong>
				<input type="checkbox" name="pre[]" value="articles_add" @if(in_array('articles_add', $pre)){{ 'checked' }}@endif>اضافة
				<input type="checkbox" name="pre[]" value="articles_edit" @if(in_array('articles_edit', $pre)){{ 'checked' }}@endif>تعديل
				<input type="checkbox" name="pre[]" value="articles_delete" @if(in_array('articles_delete', $pre)){{ 'checked' }}@endif>حذف
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">الصفحات</strong>
				<input type="checkbox" name="pre[]" value="pages_add" @if(in_array('pages_add', $pre)){{ 'checked' }}@endif>اضافة
				<input type="checkbox" name="pre[]" value="pages_edit" @if(in_array('pages_edit', $pre)){{ 'checked' }}@endif>تعديل
				<input type="checkbox" name="pre[]" value="pages_delete" @if(in_array('pages_delete', $pre)){{ 'checked' }}@endif>حذف
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">التعليقات</strong>
				<input type="checkbox" name="pre[]" value="comments_add" @if(in_array('comments_add', $pre)){{ 'checked' }}@endif>اضافة
				<input type="checkbox" name="pre[]" value="comments_edit" @if(in_array('comments_edit', $pre)){{ 'checked' }}@endif>تعديل
				<input type="checkbox" name="pre[]" value="comments_delete" @if(in_array('comments_delete', $pre)){{ 'checked' }}@endif>حذف
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">الأعلانات</strong>
				<input type="checkbox" name="pre[]" value="ads_add" @if(in_array('ads_add', $pre)){{ 'checked' }}@endif>اضافة
				<input type="checkbox" name="pre[]" value="ads_edit" @if(in_array('ads_edit', $pre)){{ 'checked' }}@endif>تعديل
				<input type="checkbox" name="pre[]" value="ads_delete" @if(in_array('ads_delete', $pre)){{ 'checked' }}@endif>حذف
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">الفيديوهات</strong>
				<input type="checkbox" name="pre[]" value="videos_add" @if(in_array('videos_add', $pre)){{ 'checked' }}@endif>اضافة
				<input type="checkbox" name="pre[]" value="videos_edit" @if(in_array('videos_edit', $pre)){{ 'checked' }}@endif>تعديل
				<input type="checkbox" name="pre[]" value="videos_delete" @if(in_array('videos_delete', $pre)){{ 'checked' }}@endif>حذف
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">الصور</strong>
				<input type="checkbox" name="pre[]" value="img_add"@if(in_array('img_add', $pre)){{ 'checked' }}@endif>اضافة
				<input type="checkbox" name="pre[]" value="img_edit"@if(in_array('img_edit', $pre)){{ 'checked' }}@endif>تعديل
				<input type="checkbox" name="pre[]" value="img_delete"@if(in_array('img_delete', $pre)){{ 'checked' }}@endif>حذف
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">استطلاع رأي</strong>
				<input type="checkbox" name="pre[]" value="Poll_add" @if(in_array('Poll_add', $pre)){{ 'checked' }}@endif>اضافة
				<input type="checkbox" name="pre[]" value="Poll_edit" @if(in_array('Poll_edit', $pre)){{ 'checked' }}@endif>تعديل
				<input type="checkbox" name="pre[]" value="Poll_delete" @if(in_array('Poll_delete', $pre)){{ 'checked' }}@endif>حذف
			</ul>
			<ul class="list-unstyled">
				<strong class="col-md-4">الأخبار العاجلة</strong>
				<input type="checkbox" name="pre[]" value="breaking_news_add" @if(in_array('breaking_news_add', $pre)){{ 'checked' }}@endif>اضافة
				<input type="checkbox" name="pre[]" value="breaking_news_edit" @if(in_array('breaking_news_edit', $pre)){{ 'checked' }}@endif>تعديل
				<input type="checkbox" name="pre[]" value="breaking_news_delete" @if(in_array('breaking_news_delete', $pre)){{ 'checked' }}@endif>حذف
			</ul>
		</div>
		@endif
	</div>
</div>

<!--*************** Start Section Cat Permissions ****************-->
<div>
	<hr style="height:0; width:100%; border:1px solid #efefef">
</div>

<div id="cat_pre" style="display:none;">
	<div class='row'>
		<div class="col-md-3">
			<h5><strong>صلاحيات الأقسام</strong></h5>
		</div>
		@if(@$type !== 'edit')
		<div class="col-md-9 manager-info">
			@foreach ($sections as $section)
			<ul class="list-unstyled">
				<strong class="col-md-4">{{ $section->name }}</strong>
				<input type="checkbox" name="cat_pre[]" value="{{ $section->id }}_add">إضافه
				<input type="checkbox" name="cat_pre[]" value="{{ $section->id }}_edit">تعديل
				<input type="checkbox" name="cat_pre[]" value="{{ $section->id }}_activate">تفعيل
				<input type="checkbox" name="cat_pre[]" value="{{ $section->id }}_delete">حذف
			</ul>
			@endforeach
		</div>
		@else
			<div class="col-md-9 manager-info">
				@foreach ($sections as $section)
					<ul class="list-unstyled">
						<strong class="col-md-4">{{ $section->name }}</strong>
						
						<input type="checkbox" name="cat_pre[]" value="{{$section->id}}_add" @if(in_array( $section['id'] .'_add', $cat_pre)){{'checked'}}@endif />إضافه
						
						<input type="checkbox" name="cat_pre[]" value="{{$section->id }}_edit" @if(in_array( $section['id'].'_edit',$cat_pre)){{'checked'}} @endif />تعديل

						<input type="checkbox" name="cat_pre[]" value="{{$section->id }}_activate" @if(in_array($section['id'].'_activate',$cat_pre)){{'checked'}} @endif />تفعيل

						<input type="checkbox"name="cat_pre[]"value="{{$section->id}}_delete" @if(in_array($section['id'].'_delete', $cat_pre)) {{'checked'}} @endif />حذف
					</ul>
				@endforeach
			</div>
		@endif
	</div> 

</div>
<!--- End Section permissions -->
<div class="form-group">
	<div class="col-md-6 col-md-offset-3">
		<button type="submit" class="btn btn-block btn-primary">
		{!! $text !!}
		</button>
	</div>
</div>
</form>
<!-- Latest compiled and minified CSS & JS -->
<script src="http://code.jquery.com/jquery.js"></script>
<script>
	$('.show-pre').on('click',function(){
		$('#pre').toggle('slow');
	});
	$('.show-cat').on('click',function(){
		$('#cat_pre').toggle('slow');
	});
	
</script>