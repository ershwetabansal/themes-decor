<table class="table">
	<thead>
		<tr>
			<th>
				Name
			</th>
			<th>
				Description
			</th>
			<th>
				Images
			</th>
		</tr>
	</thead>
	<tbody>
		@foreach($services as $service)
		<tr>
			<td>
				{{ $service->name }}
			</td>
			<td>
				{{ $service->description }}
			</td>
			<td>
				<div class="btn-group">
					<a class="btn btn-success" data-target="#services_update_{{ $service->id }}" data-toggle="tab">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>
					<button class="btn btn-default"
							data-disk-browser="true"
							data-disks="Services">
						<i class="fa fa-picture-o" aria-hidden="true"></i>
					</button>
					<button class="btn btn-danger"
							data-modal="confirmation"
							data-message="Are you sure you want to delete {{ $service->name }} theme?"
							data-form="{{ $service->id }}_delete">
						<i class="fa fa-trash-o" aria-hidden="true"></i>
					</button>
				</div>

				<form method="POST" action="{{ url('/admin/service/destroy') }}" id="{{ $service->id }}_delete">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{ $service->id }}">
				</form>

			</td>			
		</tr>
		@endforeach
	</tbody>
</table>