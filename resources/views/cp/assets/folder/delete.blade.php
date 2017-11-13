@extends('_layouts.default')

@section('title', 'Delete Folder - Assets - '.config('app.name'))
@section('description', 'Delete Folder - Assets - '.config('app.name'))
@section('keywords', 'Delete, Folder, Assets, '.config('app.name'))

@push('styles')
	@include('cp._partials.styles')
@endpush

@push('headScripts')
	@include('cp._partials.headScripts')
@endpush

@push('bodyScripts')
	@include('cp._partials.bodyScripts')
@endpush

@section('content')
	<div class="container-fluid">
		<div class="row">
			@include('cp._partials.sidebar')
			<div class="{{ $mainSmCols }} {{ $mainMdCols }} {{ $mainLgCols }} {{ $mainXlCols }} main">
				@include('cp._partials.message')
				@include('cp._partials.pageTitle')
				<div class="content padding bg-white">
					<p>Please confirm that you wish to delete the <strong>{{ $folder }}</strong> folder and any sub-folders and/or files.</p>
					<p class="font-weight-bold text-warning"><i class="icon fa fa-exclamation-triangle" aria-hidden="true"></i>Caution: This action cannot be undone.</p>
					<form name="removeFolderAsset" id="removeFolderAsset" class="removeFolderAsset" role="form" method="POST" action="/cp/assets/folder">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="hidden" name="folder" value="{{ $folder }}">
						<input type="hidden" name="directory" value="{{ $directory }}">
						<div class="spacer"></div>
						<div class="spacer" style="width: auto;margin-left: -15px;margin-right: -15px;margin-bottom: -30px;"><hr></div>
						<div class="form-buttons">
							@if ($currentUser->hasPermission('view_assets'))
								<a href="/cp/assets" title="Cancel" class="btn btn-link text-secondary cancel-button" tabindex="2" title="Cancel">Cancel</a>
							@endif
							<button type="submit" name="submit_remove_folder_assets" id="submit_remove_folder_assets" class="pull-right float-sm-right float-md-none float-lg-none float-xl-none btn btn-danger" tabindex="1" title="Delete">Delete</button>
						</div>
					</form>
				</div>
				@include('cp._partials.footer')
			</div>
		</div>
	</div>
@endsection
