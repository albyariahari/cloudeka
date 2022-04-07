@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
	<!-- form start -->
	<form action="{{route('admin.setting.update')}}" class="form-horizontal" method="POST" enctype="multipart/form-data" id="form">
		@csrf
        <span class="form-button"><a href="{{url()->previous()}}" class="btn btn-secondary pull-right">Back</a><button type="submit" class="btn btn-success pull-right create">Update</button></span>
        @include('layouts.session')
      	<!-- Default box -->
      	<div class="card card-default">
      		<div class="card-header with-border">
                <h3 class="box-title">Company Info</h3>
			</div>
      		<div class="card-body">

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Company Name" value="{{ old('company_name',$setting['company_name'])}}" name='company_name'>
                        <span class="text-danger">{{ $errors->first('company_name') }}</span>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-10">
                        <textarea id="editor2" name="company_address" rows="10" cols="80">{{ old('company_address',$setting['company_address'])}}</textarea>
                        <span class="text-danger">{{ $errors->first('company_address') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Map Latitude</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Map Latitude" value="{{ old('setting__map_latitude',$setting['setting__map_latitude'])}}" name='setting__map_latitude'>
                        <span class="text-danger">{{ $errors->first('setting__map_latitude') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Map Longitude</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Map Longitude" value="{{ old('setting__map_longitude',$setting['setting__map_longitude'])}}" name='setting__map_longitude'>
                        <span class="text-danger">{{ $errors->first('setting__map_longitude') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Email" value="{{ old('company_email',$setting['company_email'])}}" name='company_email'>
                        <span class="text-danger">{{ $errors->first('company_email') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email cc</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Email cc" value="{{ old('company_email2',$setting['company_email2'])}}" name='company_email2'>
                        <span class="text-danger">{{ $errors->first('company_email2') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Copyright</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Copyright" value="{{ old('system_copyright',$setting['system_copyright'])}}" name='system_copyright'>
                        <span class="text-danger">{{ $errors->first('system_copyright') }}</span>
                    </div>
                </div>

      		</div>
      		<!-- /.card-body -->

        </div>

      	<div class="card card-default">
      		<div class="card-header with-border">
                <h3 class="box-title">Social Media</h3>
			</div>
      		<div class="card-body">

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Facebook</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Facebook" value="{{ old('company_socmed_facebook',$setting['company_socmed_facebook'])}}" name='company_socmed_facebook'>
                        <span class="text-danger">{{ $errors->first('company_socmed_facebook') }}</span>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Instagram</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Instagram" value="{{ old('company_socmed_instagram',$setting['company_socmed_instagram'])}}" name='company_socmed_instagram'>
                        <span class="text-danger">{{ $errors->first('company_socmed_instagram') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Linkedin</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Linkedin" value="{{ old('setting__social_media_linkedin_link',$setting['setting__social_media_linkedin_link'])}}" name='setting__social_media_linkedin_link'>
                        <span class="text-danger">{{ $errors->first('setting__social_media_linkedin_link') }}</span>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Twitter</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Twitter" value="{{ old('company_socmed_twitter',$setting['company_socmed_twitter'])}}" name='company_socmed_twitter'>
                        <span class="text-danger">{{ $errors->first('company_socmed_twitter') }}</span>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Youtube</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Twitter" value="{{ old('setting__social_media_youtube_link',$setting['setting__social_media_youtube_link'])}}" name='setting__social_media_youtube_link'>
                        <span class="text-danger">{{ $errors->first('setting__social_media_youtube_link') }}</span>
                    </div>
                </div>

      		</div>
      		<!-- /.card-body -->

        </div>

        <div class="card card-default">
      		<div class="card-header with-border">
                <h3 class="box-title">Component Setting</h3>
			</div>
      		<div class="card-body">

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Home Page: Success Story Display</label>
                    <div class="col-sm-10">
                        <select name="setting__success_story_display" class="form-control">
                            <option value="false" {{ old('setting__success_story_display', $setting['setting__success_story_display']) == "false" ? 'selected' : ''}}>No</option>
                            <option value="true" {{ old('setting__success_story_display', $setting['setting__success_story_display']) == "true" ? 'selected' : ''}} >Yes</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('setting__success_story_display') }}</span>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Home Page: Call Center Display</label>
                    <div class="col-sm-10">
                        <select name="setting__call_center_display" class="form-control">
                            <option value="false" {{ old('setting__call_center_display', $setting['setting__call_center_display']) == "false" ? 'selected' : ''}}>No</option>
                            <option value="true" {{ old('setting__call_center_display', $setting['setting__call_center_display']) == "true" ? 'selected' : ''}} >Yes</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('setting__call_center_display') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Home Page: Panel Login Display</label>
                    <div class="col-sm-10">
                        <select name="setting__cmd_display" class="form-control">
                            <option value="false" {{ old('setting__cmd_display', $setting['setting__cmd_display']) == "false" ? 'selected' : ''}}>No</option>
                            <option value="true" {{ old('setting__cmd_display', $setting['setting__cmd_display']) == "true" ? 'selected' : ''}} >Yes</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('setting__cmd_display') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nav: Show Documentation</label>
                    <div class="col-sm-10">
                        <select name="setting__show_documentation" class="form-control">
                            <option value="false" {{ old('setting__show_documentation', $setting['setting__show_documentation']) == "false" ? 'selected' : ''}}>No</option>
                            <option value="true" {{ old('setting__show_documentation', $setting['setting__show_documentation']) == "true" ? 'selected' : ''}} >Yes</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('setting__show_documentation') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nav: Show FAQ</label>
                    <div class="col-sm-10">
                        <select name="setting__show_faq" class="form-control">
                            <option value="false" {{ old('setting__show_faq', $setting['setting__show_faq']) == "false" ? 'selected' : ''}}>No</option>
                            <option value="true" {{ old('setting__show_faq', $setting['setting__show_faq']) == "true" ? 'selected' : ''}} >Yes</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('setting__show_faq') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nav: Calculator</label>
                    <div class="col-sm-10">
                        <!--- <input type="text" class="form-control" placeholder="Calculator Slug" value="{{ old('setting__calculator_link',$setting['setting__calculator_link'])}}" name='setting__calculator_link'> --->
						<select name='setting__calculator_link' class="form-control">
							<option value="">--SELECT CALCULATOR--</option>
							@foreach ($calculators as $key => $val)
							<option value="{{ $key }}" {{ $setting['setting__calculator_link'] === $key ? 'selected' : '' }}>{!! $val !!}</option>
							@endforeach
						</select>
                        <span class="text-danger">{{ $errors->first('setting__calculator_link') }}</span>
                    </div>
                </div>

      		</div>
      		<!-- /.card-body -->

        </div>

      	<div class="card card-default">
      		<div class="card-header with-border">
                <h3 class="box-title">Contact Us Notification</h3>
			</div>
      		<div class="card-body">
        		<div class="form-group row">
					{{ Form::label('setting__notif_subject', 'Subject', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::text('setting__notif_subject', old('setting__notif_subject', $setting['setting__notif_subject']), ['class' => 'form-control', 'placeholder' => 'Subject']) }}
                        <span class="text-danger">{{ $errors->first('setting__notif_subject') }}</span>
                    </div>
                </div>
        		<div class="form-group row">
					{{ Form::label('setting__notif_from', 'From', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::text('setting__notif_from', old('setting__notif_from', $setting['setting__notif_from']), ['class' => 'form-control', 'placeholder' => 'From']) }}
                        <span class="text-danger">{{ $errors->first('setting__notif_from') }}</span>
                    </div>
                </div>
        		<div class="form-group row">
					{{ Form::label('setting__notif_to', 'Send To', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::text('setting__notif_to', old('setting__notif_to', $setting['setting__notif_to']), ['class' => 'form-control', 'placeholder' => 'Send To']) }}
                        <span class="text-danger">{{ $errors->first('setting__notif_to') }}</span>
                    </div>
                </div>
        		<div class="form-group row">
					{{ Form::label('setting__notif_cc', 'Send CC', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::text('setting__notif_cc', old('setting__notif_cc', $setting['setting__notif_cc']), ['class' => 'form-control', 'placeholder' => 'Send CC']) }}
                        <span class="text-danger">{{ $errors->first('setting__notif_cc') }}</span>
                    </div>
                </div>
        		<div class="form-group row">
					{{ Form::label('setting__notif_bcc', 'Send BCC', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::text('setting__notif_bcc', old('setting__notif_bcc', $setting['setting__notif_bcc']), ['class' => 'form-control', 'placeholder' => 'Send BCC']) }}
                        <span class="text-danger">{{ $errors->first('setting__notif_bcc') }}</span>
                    </div>
                </div>
			</div>
		</div>
				
      	<div class="card card-default">
      		<div class="card-header with-border">
                <h3 class="box-title">Quotation</h3>
			</div>
      		<div class="card-body">
        		<div class="form-group row">
					{{ Form::label('setting__notif_banner', 'Banner', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::file('setting__notif_banner', ['class' => 'form-control']) }}
                        <span class="text-danger">{{ $errors->first('setting__notif_banner') }}</span>
                    </div>
                </div>
        		<div class="form-group row">
					{{ Form::label('setting__notif_body_quotation', 'Body Quotation', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::textarea('setting__notif_body_quotation', old('setting__notif_body_quotation', $setting['setting__notif_body_quotation']), ['class' => 'form-control', 'placeholder' => 'Body Quotation']) }}
                        <span class="text-danger">{{ $errors->first('setting__notif_body_quotation') }}</span>
                    </div>
                </div>
        		<div class="form-group row">
					{{ Form::label('setting__notif_disclaimer', 'Disclaimer', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::textarea('setting__notif_disclaimer', old('setting__notif_disclaimer', $setting['setting__notif_disclaimer']), ['class' => 'form-control', 'placeholder' => 'Disclaimer']) }}
                        <span class="text-danger">{{ $errors->first('setting__notif_disclaimer') }}</span>
                    </div>
                </div>
      		</div>
        </div>
				
      	<div class="card card-default">
      		<div class="card-header with-border">
                <h3 class="box-title">Join Program</h3>
			</div>
      		<div class="card-body">
        		<div class="form-group row">
					{{ Form::label('setting__notif_join_program_banner', 'Banner', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::file('setting__notif_join_program_banner', ['class' => 'form-control']) }}
                        <span class="text-danger">{{ $errors->first('setting__notif_join_program_banner') }}</span>
                    </div>
                </div>
        		<div class="form-group row">
					{{ Form::label('setting__notif_join_program_body', 'Body Quotation', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::textarea('setting__notif_join_program_body', old('setting__notif_join_program_body', $setting['setting__notif_join_program_body']), ['class' => 'form-control', 'placeholder' => 'Body Quotation']) }}
                        <span class="text-danger">{{ $errors->first('setting__notif_join_program_body') }}</span>
                    </div>
                </div>
        		<div class="form-group row">
					{{ Form::label('setting__notif_join_program_disclaimer', 'Disclaimer', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::textarea('setting__notif_join_program_disclaimer', old('setting__notif_join_program_disclaimer', $setting['setting__notif_join_program_disclaimer']), ['class' => 'form-control', 'placeholder' => 'Disclaimer']) }}
                        <span class="text-danger">{{ $errors->first('setting__notif_join_program_disclaimer') }}</span>
                    </div>
                </div>
      		</div>
        </div>

      	<div class="card card-default">
      		<div class="card-header with-border">
                <h3 class="box-title">Default SEO Data</h3>
			</div>
      		<div class="card-body">

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Facebook" value="{{ old('setting__seo_default_title',$setting['setting__seo_default_title'])}}" name='setting__seo_default_title'>
                        <span class="text-danger">{{ $errors->first('setting__seo_default_title') }}</span>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Keyword</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Instagram" value="{{ old('setting__seo_default_keyword',$setting['setting__seo_default_keyword'])}}" name='setting__seo_default_keyword'>
                        <span class="text-danger">{{ $errors->first('setting__seo_default_keyword') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea name="setting__seo_default_description" class="form-control">{{ old('setting__seo_default_description',$setting['setting__seo_default_description'])}}</textarea>
                        <span class="text-danger">{{ $errors->first('setting__seo_default_description') }}</span>
                    </div>
                </div>

      		</div>
      		<!-- /.card-body -->

        </div>

        <!-- /.card-footer -->
      	<!-- /.box -->
	</form>
    <!-- /.card-body -->
<!-- /.box -->
@stop

@push('js')
<script type="text/javascript">
    $(function () {
       // Replace the <textarea id="editor1"> with a CKEditor
       // instance, using default configuration.
       CKEDITOR.replace('editor2');
	   CKEDITOR.replace('setting__notif_body_quotation');
	   CKEDITOR.replace('setting__notif_join_program_body');
     });
</script>
@endpush
