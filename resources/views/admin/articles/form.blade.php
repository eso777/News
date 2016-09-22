<div class="aside-box">
  	<div class="tab-content">
		<div role="tabpanel" class="tab-pane fade in active" id="main">
			<div class="{{ $errors->has('name') ? ' has-error' : '' }}">
			    {!! Form::label('name', 'عنوان الخبر') !!}
			    {!! Form::text('name', null, ['class' => 'form-control',"data-placeholder"=>"Select..."]) !!}
			    <small class="text-danger">{{ $errors->first('name') }}</small>
			</div>
			
			<div class="{{ $errors->has('content') ? ' has-error' : '' }}">
			    {!! Form::label('content', 'نص الخبر') !!}
			    {!! Form::textarea('content', null, ['class' => 'ckeditor form-control']) !!}
			    <small class="text-danger">{{ $errors->first('content') }}</small>
			</div>
			
		</div>

		<div role="tabpanel" class="tab-pane fade" id="publish_oprions">
		    <div class="{{ $errors->has('published_at') ? ' has-error' : '' }}">
			    {!! Form::label('published_at', 'تاريخ النشر') !!}
			    @if($type == 'edit')
				{!! Form::text('published_at', null, ['id'=>'datetimepicker1','class' => 'form-control']) !!}
				@else
				{!! Form::text('published_at', date('Y-m-d H:i'), ['id'=>'datetimepicker1','class' => 'form-control']) !!}
				@endif
			    <small class="text-danger">{{ $errors->first('published_at') }}</small>
			</div>
		    <br>
			<div class="{{ $errors->has('writer') ? ' has-error' : '' }}">
			    {!! Form::label('writer', 'الكاتب') !!}
			    {!! Form::select('writer',$writers, null, ['id' => 'writer', 'class' => 'form-control']) !!}
			    <small class="text-danger">{{ $errors->first('writer') }}</small>
			</div>
		    <br>
			<div class="{{ $errors->has('categories_id') ? ' has-error' : '' }}">
			    {!! Form::label('categories_id', 'القسم') !!}
			    {!! Form::select('categories_id',[], null, ['id' => 'categories_id', 'class' => 'form-control']) !!}
			    <small class="text-danger">{{ $errors->first('categories_id') }}</small>
			</div>
		    <br>
			<div class="{{ $errors->has('atricle_type') ? ' has-error' : '' }}">
			    {!! Form::label('atricle_type', 'نوع المقاله') !!}
			    {!! Form::select('atricle_type',$prices, null, ['id' => 'atricle_type', 'class' => 'form-control']) !!}
			    <small class="text-danger">{{ $errors->first('atricle_type') }}</small>
			</div>
		    <br>
			<div class="{{ $errors->has('status') ? ' has-error' : '' }}">
			    {!! Form::label('status', 'تفعيل') !!}
			    {!! Form::select('status',['تفعيل','إلغاء  التفعيل','ارجاع للصفحى'], null, ['id' => 'status', 'class' => 'form-control']) !!}
			    <small class="text-danger">{{ $errors->first('status') }}</small>
			</div>	
			<br>
			<div class="{{ $errors->has('choosen') ? ' has-error' : '' }}">
			    {!! Form::label('choosen', 'عرض فى السايد بار') !!}
				<input type="checkbox" name="choosen" class="make-switch" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>">
			    <small class="text-danger">{{ $errors->first('choosen') }}</small>
			</div>	
		    <br>
			<div class="{{ $errors->has('main_slider') ? ' has-error' : '' }}">
			    {!! Form::label('main_slider', 'عرض فى الاسلايدر الرئيسي') !!}
				<input type="checkbox" name="main_slider" class="make-switch" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>">
			    <small class="text-danger">{{ $errors->first('main_slider') }}</small>
			</div>
		</div>

		<div role="tabpanel" class="tab-pane fade" id="images">
			<div class="{{ $errors->has('show_in_slider') ? ' has-error' : '' }}">
			    {!! Form::label('show_in_slider', 'عرض فى اسلايدر') !!}
				<input type="checkbox" name="show_in_slider" class="make-switch" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>">
			    <small class="text-danger">{{ $errors->first('show_in_slider') }}</small>
			</div>	
			<div class="contant-images-file">
				<div class="">
				    <label for="img"> </label>
				    <input class="form-control" name="img[]" type="file">
				    <p class="help-block">أضافة صور مناسبة</p>
				    <small class="text-danger"></small>
				</div>
			</div>
			<a href="#" id="img-file-plus" class="btn btn-info btn-icon-only">
				<i class="fa fa-plus"></i>
			</a>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="seo">
			<div class="{{ $errors->has('description') ? ' has-error' : '' }}">
			    {!! Form::label('description', 'الوصف') !!}
			    <textarea id="maxlength_textarea" class="form-control" name="description" maxlength="160" rows="2" placeholder=""></textarea>
			    <small class="text-info"> الحد الأقصى 160 حرف</small>
			    <small class="text-danger">{{ $errors->first('description') }}</small>
			</div>
			<br>
			<div class="{{ $errors->has('tags') ? ' has-error' : '' }}">
			    {!! Form::label('tags', 'الكلمات الدلاليه') !!}
			    {!! Form::text('tags', null, ['id' => 'tags_1', 'class' => 'form-control']) !!}
			    <small class="text-danger">{{ $errors->first('tags') }}</small>
			</div>

		</div>
  	</div>
</div>
{!! Form::submit("نشر", ['onClick'=>'validator_tabs()','class' => 'btn btn-success btn-lg','style'=>'margin:10px 0 0 0']) !!}
</div>