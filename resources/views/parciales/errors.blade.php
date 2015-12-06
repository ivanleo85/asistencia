@if (count($errors) > 0)
	<div class="alert danger-new" style="text-align: justify;">
		@lang('error.title')<br><br>
		<ul style="padding-left: 25px;">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif