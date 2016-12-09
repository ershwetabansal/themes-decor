<table class="table">
	<thead>
		<tr>
			<th>
				Key
			</th>
			<th>
				Value
			</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($configurations as $config)
			<form action="/admin/configuration/update" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $config->id }}">
				<tr>
					<td>
						{{ ucwords(str_replace('_', ' ', $config->key)) }}
					</td>
					<td>
						@if(!$config->rich)
							<input type="text" name="value" value="{{ $config->value }}" class="form-control" required>
						@else
							<textarea name="value" id="" cols="30" rows="4" class="form-control">{{ $config->value }}</textarea>
						@endif
					</td>
					<td>
						<button class="btn btn-success">Save</button>
					</td>
				</tr>
			</form>
		@endforeach
	</tbody>
</table>