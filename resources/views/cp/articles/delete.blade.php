@extends('_layouts.default')

@section('title', 'Delete Article - Articles - '.config('app.name'))
@section('description', 'Delete Article - Articles - '.config('app.name'))
@section('keywords', 'Delete, Article, Articles, '.config('app.name'))

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
					<p>Please confirm that you wish to delete the <strong>{{ $article->title }}</strong> article.</p>
					<p class="font-weight-bold text-warning">Caution: This action cannot be undone.</p>
					<form name="removeArticle" id="removeArticle" class="removeArticle" role="form" method="POST" action="/cp/articles/{{ $article->id }}">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<div class="form-buttons">
							@if ($currentUser->hasPermission('view_articles'))
								<a href="/cp/articles" title="Cancel" class="btn btn-outline-secondary cancel-button" tabindex="2" title="Cancel">Cancel</a>
							@endif
							<button type="submit" name="submit" id="submit" class="btn btn-outline-danger" tabindex="1" title="Delete">Delete</button>
						</div>
					</form>
				</div>
			</div>
		</div>
@endsection