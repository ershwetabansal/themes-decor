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
				<a data-target="#services_update_{{ $service->id }}" data-toggle="tab">
					Edit
				</a>
				<button>Browse</button>
			</td>			
		</tr>
		@endforeach
	</tbody>
</table>