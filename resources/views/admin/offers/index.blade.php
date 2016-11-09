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
				Valid until
			</th>
			<th>
				Link to the offer page
			</th>
			<th>
				Images
			</th>
		</tr>
	</thead>
	<tbody>
		@foreach($offers as $offer)
		<tr>
			<td>
				{{ $offer->name }}
			</td>
			<td>
				{{ $offer->description }}
			</td>
			<td>
				{{ ($offer->valid_until) ? $offer->valid_until->format('j M Y') : '-' }}
			</td>
			<td>
				{{ $offer->url }}
			</td>
			<td>
				<a data-target="#offers_update_{{ $offer->id }}" data-toggle="tab">
					Edit
				</a>
				<button>Browse</button>
			</td>			
		</tr>
		@endforeach
	</tbody>
</table>