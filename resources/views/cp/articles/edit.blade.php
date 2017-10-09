@extends('_layouts.default')

@section('title', 'Edit Article - Articles - '.config('app.name'))
@section('description', 'Edit Article - Articles - '.config('app.name'))
@section('keywords', 'Edit, Article, Articles, '.config('app.name'))

@push('styles')
	<link rel="stylesheet" href="{{ mix('/assets/css/cp.css') }}">
@endpush

@push('headScripts')
@endpush

@push('bodyScripts')
	<script async src="{{ mix('/assets/js/cp.js') }}"></script>
	@include('cp._partials.listeners')
	<script async>
	'use strict';
	
	window.onload = () => {	
		let assetBrowserElements = [];
	
		@foreach ($articleTemplate->fields as $field)
			@if (str_contains(strtolower($field['id']), 'image'))
				assetBrowserElements.push('{{ $field['id'] }}');
			@endif
		@endforeach	
		
		assetBrowserElements.map(assetBrowserElement => {
			$('#' + assetBrowserElement + '-browse-modal').on('show.bs.modal', event => {
				const button = $(event.relatedTarget);
				
				const fieldId = button.data('field_id');
				
				const value = button.data('value');
				
				window.CMS.ControlPanel.attachAssetBrowser('#' + assetBrowserElement + '-container', fieldId, value);
			});
			
			$('#' + assetBrowserElement + '-reset-field').on('click', () => {
				$('#' + assetBrowserElement).val('').blur();
				
				$('a[data-target="#' + assetBrowserElement + '-browse-modal"]').data('value', '');
			});
		});
	};
	</script>
@endpush

@section('content')
	<div class="container-fluid">
		<div class="row">
			@include('cp._partials.sidebar')
			<div class="{{ $mainSmCols }} {{ $mainMdCols }} {{ $mainLgCols }} {{ $mainXlCols }} main">
				@include('cp._partials.message')
				@include('cp._partials.pageTitle')
				<div class="content padding bg-white">
					<p><span class="text-danger">&#42;</span> denotes a required field.</p>
					<form name="editArticle" id="editArticle" class="editArticle" role="form" method="POST" action="/cp/articles/{{ $article->id }}">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<input type="hidden" name="template_id" value="{{ $article->template_id }}">
						<input type="hidden" name="article_category_ids[]" value="1">
						<div class="form-group">
							<label for="title" class="control-label font-weight-bold">Title <span class="text-danger">&#42;</span></label>
							<input type="text" name="title" id="title" class="form-control" value="{{ old('title', optional($article)->title) }}" placeholder="e.g Blog Post Title" tabindex="1" autocomplete="off" aria-describedby="helpBlockTitle" required autofocus>
							@if ($errors->has('title'))
								<span id="helpBlockTitle" class="form-control-feedback form-text gf-red">- {{ $errors->first('title') }}</span>
							@endif
							<span id="helpBlockTitle" class="form-control-feedback form-text text-muted"></span>
						</div>
						<div class="form-group">
							<label for="slug" class="control-label font-weight-bold">Slug <span class="text-danger">&#42;</span></label>
							<input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', optional($article)->slug) }}" placeholder="e.g blog-post-title" tabindex="2" autocomplete="off" aria-describedby="helpBlockSlug" required>
							@if ($errors->has('slug'))
								<span id="helpBlockSlug" class="form-control-feedback form-text gf-red">- {{ $errors->first('slug') }}</span>
							@endif
							<span id="helpBlockSlug" class="form-control-feedback form-text text-muted">- The slug is auto-generated based on the title but feel free to edit it.</span>
						</div>
						<div class="form-group">
							<label for="description" class="control-label font-weight-bold">Meta Description</label>
							<input type="text" name="description" id="description" class="form-control" value="{{ old('description', optional($article)->description) }}" placeholder="e.g Blog Post Description" tabindex="3" autocomplete="off" aria-describedby="helpBlockDescription">
							@if ($errors->has('description'))
								<span id="helpBlockDescription" class="form-control-feedback form-text gf-red">- {{ $errors->first('description') }}</span>
							@endif
							<span id="helpBlockDescription" class="form-control-feedback form-text text-muted"></span>
						</div>
						<div class="form-group">
							<label for="keywords" class="control-label font-weight-bold">Meta Keywords</label>
							<input type="text" name="keywords" id="keywords" class="form-control" value="{{ old('keywords', optional($article)->keywords) }}" placeholder="e.g Blog, Post, Keywords" tabindex="4" autocomplete="off" aria-describedby="helpBlockKeywords">
							@if ($errors->has('keywords'))
								<span id="helpBlockKeywords" class="form-control-feedback form-text gf-red">- {{ $errors->first('keywords') }}</span>
							@endif
							<span id="helpBlockKeywords" class="form-control-feedback form-text text-muted">- Separate your keywords by commas.</span>
						</div>
						<div class="form-group">
							<label for="published_at" class="control-label font-weight-bold">Publish Date</label>
							<div class="input-group date">
								<span class="input-group-addon" id="helpBlockPublishedAt"><i class="fa fa-calendar" aria-hidden="true"></i></span>
								<input type="text" name="published_at" id="published_at" class="form-control" value="{{ old('published_at', optional($article)->published_at) }}" placeholder="e.g yyyy-mm-dd h:i:s" tabindex="5" autocomplete="off" aria-describedby="helpBlockPublishedAt">
							</div>
							@if ($errors->has('published_at'))
								<span id="helpBlockPublishedAt" class="form-control-feedback form-text gf-red">- {{ $errors->first('published_at') }}</span>
							@endif
							<span id="helpBlockPublishedAt" class="form-control-feedback form-text text-muted">- Articles will only appear on/after this date.</span>
						</div>
						<div class="form-group">
							<label class="control-label font-weight-bold">Status</label>
							@foreach ($statuses as $status)
								<div class="form-check status_id-{{ $status->id }}">
									<label for="status_id-{{ str_slug($status->title) }}" class="form-check-label">
										<input type="radio" name="status_id" id="status_id-{{ str_slug($status->title) }}" class="form-check-input" value="{{ $status->id }}" tabindex="6" aria-describedby="helpBlockStatusId" {{ (old('status_id') == $status->id || $article->status_id == $status->id) ? 'checked' : '' }}>{{ $status->title }}@if (!empty($status->description))&nbsp;<i class="fa fa-info-circle text-muted" data-toggle="tooltip" data-placement="top" title="{{ $status->description }}" aria-hidden="true"></i>@endif
									</label>
								</div>
							@endforeach
							@if ($errors->has('status_id'))
								<span id="helpBlockStatusId" class="form-control-feedback form-text gf-red">- {{ $errors->first('status_id') }}</span>
							@endif
							<span id="helpBlockStatusId" class="form-control-feedback form-text text-muted"></span>
						</div>
						<div class="form-group">
							<label class="control-label font-weight-bold">Article Categories</label>
							@if (old('article_category_ids'))
								@php ($articleCategoryIds = old('article_category_ids'))
							@else
								@php ($articleCategoryIds = $article->article_categories->pluck('id')->toArray())
							@endif
							@foreach ($articleCategories->chunk(3) as $chunk)
								<div class="row">
									@foreach ($chunk as $articleCategory)
										<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
											<div class="form-check">
												<label for="article_category_id-{{ $articleCategory->slug }}" class="form-check-label">
													<input type="checkbox" name="article_category_ids[]" id="article_category_id-{{ $articleCategory->slug }}" class="form-check-input" value="{{ $articleCategory->id }}" tabindex="7" aria-describedby="helpBlockArticleCategoryIds" {{ (in_array($articleCategory->id, $articleCategoryIds)) ? 'checked' : '' }} {{ ($articleCategory->id == 1) ? 'disabled checked' : '' }}>{{ $articleCategory->title }}
												</label>
											</div>
										</div>
									@endforeach
								</div>
							@endforeach
							@if ($errors->has('article_category_ids'))
								<span id="helpBlockArticleCategoryIds" class="form-control-feedback form-text gf-red">- {{ $errors->first('article_category_ids') }}</span>
							@endif
							<span id="helpBlockArticleCategoryIds" class="form-control-feedback form-text text-muted"></span>
						</div>
						<div class="form-group">
							<label for="user_id" class="control-label font-weight-bold">Author</label>
							<select name="user_id" id="user_id" class="form-control" tabindex="8" aria-describedby="helpBlockUserId" required>
								@foreach ($users as $user)
									<option value="{{ $user->id }}" {{ (old('user_id') == $user->id || $article->user_id == $user->id) ? 'selected' : '' }}>{{ $user->first_name }} {{ $user->last_name }}</option>
								@endforeach
							</select>
							@if ($errors->has('user_id'))
								<span id="helpBlockUserId" class="form-control-feedback form-text gf-red">- {{ $errors->first('user_id') }}</span>
							@endif
							<span id="helpBlockUserId" class="form-control-feedback form-text text-muted"></span>
						</div>
						@foreach ($articleTemplate->fields as $field)
							<div class="form-group">
								{{ showField($field, old($field['id']), (9 + $loop->iteration)) }}
								@if ($errors->has($field['id']))
									<span id="helpBlock_{{ $field['id'] }}" class="form-control-feedback form-text gf-red">- {{ $errors->first($field['id']) }}</span>
								@endif
							</div>
						@endforeach
						<div class="form-buttons">
							@if ($currentUser->hasPermission('view_articles'))
								<a href="/cp/articles" title="Cancel" class="btn btn-outline-secondary cancel-button" title="Cancel">Cancel</a>
							@endif
							<button type="submit" name="submit" id="submit" class="btn btn-primary" title="Save Changes">Save Changes</button>
							@if ($currentUser->hasPermission('delete_articles'))
								<a href="/cp/articles/{{ $article->id }}/delete" title="Delete Article" class="pull-right btn btn-outline-danger">Delete Article</a>
							@endif
						</div>
					</form>
				</div>
				@include('cp._partials.footer')
			</div>
		</div>
	</div>
@endsection
