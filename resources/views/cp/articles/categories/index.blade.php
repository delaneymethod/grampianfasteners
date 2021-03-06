@extends('_layouts.default')

@section('title', 'Article Categories - Articles - '.config('app.name'))
@section('description', 'Article Categories - Articles - '.config('app.name'))
@section('keywords', 'Article, Categories, Articles, '.config('app.name'))

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
				@if ($currentUser->hasPermission('create_article_categories'))
					<div class="row">
						<div class="col-12 text-center text-sm-center text-md-left text-lg-left text-xl-left">
							<ul class="list-unstyled list-inline buttons">
								<li class="list-inline-item"><a href="/cp/articles/categories/create" title="Add Article Category" class="btn btn-success"><i class="icon fa fa-plus" aria-hidden="true"></i>Add Article Category</a></li>
							</ul>
						</div>
					</div>
				@endif
				<div class="content padding bg-white">	
					<div class="spacer"></div>
					<table id="datatable" class="table table-hover" cellspacing="0" border="0" cellpadding="0" width="100%">
						<thead>
							<tr>
								<th class="align-middle no-sort">&nbsp;</th>
								<th class="align-middle">Title</th>
								<th class="align-middle d-none d-sm-none d-md-table-cell d-lg-table-cell d-xl-table-cell">Slug</th>
								<th class="align-middle no-sort">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($articleCategories as $articleCategory)
								<tr>
									<td class="align-middle status text-center"><i class="fa fa-circle fa-1 status_id-{{ $articleCategory->status->id }}" title="{{ $articleCategory->status->title }}" data-toggle="tooltip" data-placement="top" aria-hidden="true"></i></td>
									<td class="align-middle">{{ $articleCategory->title }}</td>
									<td class="align-middle d-none d-sm-none d-md-table-cell d-lg-table-cell d-xl-table-cell">{{ $articleCategory->slug }}</td>
									@if ($currentUser->hasPermission('edit_article_categories') || ($currentUser->hasPermission('delete_article_categories') && $articleCategory->id != 1))
										<td class="align-middle actions dropdown text-center" id="submenu">
											<a href="javascript:void(0);" title="Article Category Actions" rel="nofollow" class="dropdown-toggle needsclick" id="pageActions" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">
												@if ($currentUser->hasPermission('edit_article_categories'))
													<li class="dropdown-item gf-info"><a href="/cp/articles/categories/{{ $articleCategory->id }}/edit" title="Edit Article Category"><i class="icon fa fa-pencil" aria-hidden="true"></i>Edit Article Category</a></li>
												@endif
												@if ($currentUser->hasPermission('delete_article_categories') && $articleCategory->id != 1)
													<li class="dropdown-item gf-danger"><a href="/cp/articles/categories/{{ $articleCategory->id }}/delete" title="Delete Article Category"><i class="icon fa fa-trash" aria-hidden="true"></i>Delete Article Category</a></li>
												@endif
											</ul>
										</td>
									@else
										<td class="align-middle">&nbsp;</td>
									@endif
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				@include('cp._partials.footer')
			</div>
		</div>
	</div>
@endsection
