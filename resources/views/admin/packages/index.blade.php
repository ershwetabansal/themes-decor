<table class="table">
	<thead>
		<tr>
			<th>
				Name
			</th>
			<th>
				Content
			</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($packages as $package)
		<tr>
			<td>
				{{ $package->name }}
			</td>
			<td>
				{{ $package->content }}
			</td>
			<td>
				<div class="btn-group">
					<a class="btn btn-default" data-target="#package_update_{{ $package->id }}" data-toggle="tab">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>
					<button class="btn btn-default"
							data-modal="confirmation"
							data-message="Are you sure you want to delete {{ $package->name }} package?"
							data-form="package_{{ $package->id }}_delete">
						<i class="fa fa-trash-o" aria-hidden="true"></i>
					</button>
				</div>

				<form method="POST" action="{{ url('/admin/package/destroy') }}" id="package_{{ $package->id }}_delete">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{ $package->id }}">
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>