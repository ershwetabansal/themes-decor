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
				<button>Browse</button>
			</td>			
		</tr>
		@endforeach
	</tbody>
</table>