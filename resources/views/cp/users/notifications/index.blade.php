@extends('_layouts.default')

@section('title', 'Messages - Users - '.config('app.name'))
@section('description', 'Messages - Users - '.config('app.name'))
@section('keywords', 'Messages, Users, '.config('app.name'))

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
					<table id="datatable" class="table table-hover" cellspacing="0" border="0" cellpadding="0" width="100%">
						<thead>
							<tr>
								<th class="align-middle no-sort">Subject</th>
								<th class="align-middle text-center d-none d-sm-none d-md-table-cell d-lg-table-cell d-xl-table-cell">Date / Time</th>
								<th class="align-middle no-sort">&nbsp;</th>
							</tr>
						</thead>
						<tbody id="all-notifications">
							@foreach ($notifications as $notification)
								<tr>
									<td class="align-middle">{{ $notification->subject }} {!! (is_null($notification->read_at)) ? '&nbsp;<span class="badge badge-pill badge-suspended align-middle text-uppercase"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;Unread</span>' : '' !!}</td>
									<td class="align-middle text-center d-none d-sm-none d-md-table-cell d-lg-table-cell d-xl-table-cell">{{ $notification->created_at->format('jS M Y H:i') }}</td>
									<td class="align-middle text-center"><a href="/cp/users/{{ $currentUser->id }}/notifications/{{ $notification->id }}" title="View Notification"><i class="icon fa fa-envelope" aria-hidden="true"></i></td>
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
