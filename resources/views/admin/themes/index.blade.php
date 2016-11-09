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
		@foreach($themes as $theme)
		<tr>
			<td>
				{{ $theme->name }}
			</td>
			<td>
				{{ $theme->description }}
			</td>
			<td>
				<button>Browse</button>
			</td>			
		</tr>
		@endforeach
	</tbody>
</table>