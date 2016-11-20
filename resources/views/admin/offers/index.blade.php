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
				<div class="btn-group">
					<a class="btn btn-default" data-target="#offers_update_{{ $offer->id }}" data-toggle="tab">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>
					<button class="btn btn-default"
							data-disk-browser="true"
							data-disks="Offers">
						<i class="fa fa-picture-o" aria-hidden="true"></i>
					</button>
					<button class="btn btn-default"
							data-modal="confirmation"
							data-message="Are you sure you want to delete {{ $offer->name }} offer?"
							data-form="{{ $offer->id }}_delete">
						<i class="fa fa-trash-o" aria-hidden="true"></i>
					</button>
				</div>

				<form method="POST" action="{{ url('/admin/offer/destroy') }}" id="{{ $offer->id }}_delete">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{ $offer->id }}">
				</form>

			</td>			
		</tr>
		@endforeach
	</tbody>
</table>