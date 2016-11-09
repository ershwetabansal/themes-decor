<table class="table">
	<thead>
		<tr>
			<th>
				Key
			</th>
			<th>
				Value
			</th>
		</tr>
	</thead>
	<tbody>
		@foreach($configurations as $config)
		<tr>
			<td>
				{{ $config->key }}
			</td>
			<td>
				{{ $config->value }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>