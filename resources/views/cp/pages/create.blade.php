@extends('_layouts.default')

@section('title', 'Create Page - Pages - '.config('app.name'))
@section('description', 'Create Page - Pages - '.config('app.name'))
@section('keywords', 'Create, Page, Pages, '.config('app.name'))

@push('styles')
	<link rel="stylesheet" href="{{ mix('/assets/css/cp.css') }}">
@endpush

@push('headScripts')
@endpush

@push('bodyScripts')
	<script async src="{{ mix('/assets/js/cp.js') }}"></script>
@endpush

@section('content')
		<div class="row wrapper">
			@include('cp._partials.sidebar')
			<div class="{{ $mainSmCols }} {{ $mainMdCols }} {{ $mainLgCols }} main">
				@include('cp._partials.message')
				@include('cp._partials.pageTitle')
				<div class="content padding bg-white">
					<p><span class="text-danger">&#42;</span> denotes a required field.</p>
					<form name="createPage" id="createPage" class="createPage" role="form" method="POST" action="/cp/pages">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="title" class="control-label font-weight-bold">Title <span class="text-danger">&#42;</span></label>
							<input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="e.g New Page" tabindex="1" autocomplete="off" aria-describedby="helpBlockTitle" required autofocus>
							@if ($errors->has('title'))
								<span id="helpBlockTitle" class="form-control-feedback form-text gf-red">- {{ $errors->first('title') }}</span>
							@endif
							<span id="helpBlockTitle" class="form-control-feedback form-text text-muted"></span>
						</div>
						<div class="form-group">
							<label for="slug" class="control-label font-weight-bold">Slug <span class="text-danger">&#42;</span></label>
							<input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}" placeholder="e.g new-page" tabindex="2" autocomplete="off" aria-describedby="helpBlockSlug" required>
							@if ($errors->has('slug'))
								<span id="helpBlockSlug" class="form-control-feedback form-text gf-red">- {{ $errors->first('slug') }}</span>
							@endif
							<span id="helpBlockSlug" class="form-control-feedback form-text text-muted">- The slug is auto-generated based on the title but feel free to edit it.</span>
						</div>
						<div class="form-group">
							<label class="control-label font-weight-bold">Status</label>
							@foreach ($statuses as $status)
								<div class="form-check status_id-{{ $status->id }}">
									<label for="status_id-{{ str_slug($status->title) }}" class="form-check-label">
										<input type="radio" name="status_id" id="status_id-{{ str_slug($status->title) }}" class="form-check-input" value="{{ $status->id }}" tabindex="3" aria-describedby="helpBlockStatusId" {{ (old('status_id') == $status->id) ? 'checked' : ($loop->first) ? 'checked' : '' }}>{{ $status->title }}
									</label>
								</div>
							@endforeach
							@if ($errors->has('status_id'))
								<span id="helpBlockStatusId" class="form-control-feedback form-text gf-red">- {{ $errors->first('status_id') }}</span>
							@endif
							<span id="helpBlockStatusId" class="form-control-feedback form-text text-muted"></span>
						</div>
						<div class="form-group">
							<label for="parent_id" class="control-label font-weight-bold">Parent</label>
							<select name="parent_id" id="parent_id" class="form-control" tabindex="4" aria-describedby="helpBlockParentId" required>
								<option value="0" selected>Top Level</option>
								@foreach ($pages as $page)
									@php ($indent = '')
									@php ($depth = $page->depth)
									@while ($depth > 0)
										@php ($indent .= '-')
										@php ($depth--)
									@endwhile
									@if ($indent > '')
										@php ($indent .= '&nbsp;')
									@endif
									<option value="{{ $page->id }}" {{ (old('parent_id') == $page->id) ? 'selected' : '' }}>{{ $indent }}{{ $page->title }}</option>
								@endforeach
							</select>
							@if ($errors->has('parent_id'))
								<span id="helpBlockParentId" class="form-control-feedback form-text gf-red">- {{ $errors->first('parent_id') }}</span>
							@endif
							<span id="helpBlockParentId" class="form-control-feedback form-text text-muted"></span>
						</div>
						<div class="form-group">
							<label for="content" class="control-label font-weight-bold">Content</label>
							<textarea name="content" id="content" placeholder="e.g New page content..." tabindex="5" aria-describedby="helpBlockContent">{{ old('content') }}</textarea>
							@if ($errors->has('content'))
								<span id="helpBlockContent" class="form-control-feedback form-text gf-red">- {{ $errors->first('content') }}</span>
							@endif
							<span id="helpBlockContent" class="form-control-feedback form-text text-muted"></span>
						</div>
						<div class="form-buttons">
							<a href="/cp/pages" title="Cancel" class="btn btn-outline-secondary cancel-button" tabindex="7" title="Cancel">Cancel</a>
							<button type="submit" name="submit" id="submit" class="btn btn-outline-primary" tabindex="6" title="Save Changes">Save Changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>
@endsection
