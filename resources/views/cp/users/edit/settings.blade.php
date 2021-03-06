@extends('_layouts.default')

@section('title', 'Edit Settings - Users - '.config('app.name'))
@section('description', 'Edit Settings - Users - '.config('app.name'))
@section('keywords', 'Edit, Settings, Users, '.config('app.name'))

@push('styles')
	@include('cp._partials.styles')
@endpush

@push('headScripts')
	@include('cp._partials.headScripts')
@endpush

@push('bodyScripts')
	@include('cp._partials.bodyScripts')
@endpush

@section('formButtons')
	<div class="form-buttons">
		@if ($currentUser->hasPermission('view_users'))
			<a href="/cp/users" title="Cancel" class="btn btn-link text-secondary" tabindex="4" title="Cancel">Cancel</a>
		@endif
		<button type="submit" name="submit_edit_user" id="submit_edit_user" class="pull-right btn btn-primary" tabindex="3" title="Save Changes"><i class="icon fa fa-check-circle" aria-hidden="true"></i>Save Changes</button>
	</div>
@endsection

@section('content')
	<div class="container-fluid">
		<div class="row">
			@include('cp._partials.sidebar')
			<div class="{{ $mainSmCols }} {{ $mainMdCols }} {{ $mainLgCols }} {{ $mainXlCols }} main">
				@include('cp._partials.message')
				@include('cp._partials.pageTitle')
				<div class="content padding bg-white">
					<form name="editUser" id="editUser" class="editUser" role="form" method="POST" action="/cp/users/{{ $user->id }}">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<input type="hidden" name="settings" value="1">
						@yield('formButtons')
						<div class="spacer" style="width: auto;margin-left: -15px;margin-right: -15px;"><hr></div>
						<div class="spacer"></div>
						<p><i class="fa fa-info-circle" aria-hidden="true"></i> Fields marked with <span class="text-danger">&#42;</span> are required.</p>
						@if ($user->id != $currentUser->id)
							<div class="form-group">
								<label class="control-label font-weight-bold">User Account</label>
								<input type="text" class="form-control text-disabled" value="{{ $user->first_name }} {{ $user->last_name }}" disabled>
							</div>
							<div class="spacer"></div>
						@endif
						<div class="form-group">
							<label class="control-label font-weight-bold">Receive Emails</label>
							<div class="form-check">
								<label class="switch form-check-label" for="receive_emails">
									<input type="checkbox" name="receive_emails" id="receive_emails" class="" value="1" tabindex="1" aria-label="&hellip;" aria-describedby="helpBlockReceiveEmails" {{ ((old('receive_emails') && old('receive_emails') == $user->receive_emails || $user->receive_emails == 1)) ? 'checked' : '' }}>
									<span class="slider round"></span>
								</label>
							</div>
							@if ($errors->has('receive_emails'))
								<span id="helpBlockReceiveEmails" class="form-control-feedback form-text gf-red">- {{ $errors->first('receive_emails') }}</span>
							@endif
							<span id="helpBlockReceiveEmails" class="form-control-feedback form-text text-muted">- Turn Off if you don&#39;t want to receive emails.<br>- E.g Order created confirmations.</span>
						</div>
						<div class="spacer"></div>
						<div class="form-group">
							<label class="control-label font-weight-bold">Receive Notifications</label>
							<div class="form-check">
								<label class="switch form-check-label" for="receive_notifications">
									<input type="checkbox" name="receive_notifications" id="receive_notifications" class="" value="1" tabindex="2" aria-label="&hellip;" aria-describedby="helpBlockReceiveNotifications" {{ ((old('receive_notifications') && old('receive_notifications') == $user->receive_notifications || $user->receive_notifications == 1)) ? 'checked' : '' }}>
									<span class="slider round"></span>
								</label>
							</div>
							@if ($errors->has('receive_notifications'))
								<span id="helpBlockReceiveNotifications" class="form-control-feedback form-text gf-red">- {{ $errors->first('receive_notifications') }}</span>
							@endif
							<span id="helpBlockReceiveNotifications" class="form-control-feedback form-text text-muted">- Turn Off if you don&#39;t want to receive notifications.<br>- E.g Order update notifications.</span>
						</div>
						<div class="spacer"></div>
						<div class="spacer" style="width: auto;margin-left: -15px;margin-right: -15px;margin-bottom: -30px;"><hr></div>
						@yield('formButtons')
					</form>
				</div>
				@include('cp._partials.footer')
			</div>
		</div>
	</div>
@endsection
