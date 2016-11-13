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
				Quantity
			</th>
			<th>
				Unit
			</th>
			<th>
				Price
			</th>
			<th>
				Discount
			</th>
			<th>
				Images
			</th>
		</tr>
	</thead>
	<tbody>
		@foreach($products as $product)
		<tr>
			<td>
				{{ $product->name }}
			</td>
			<td>
				{{ $product->description }}
			</td>
			<td>
				{{ $product->quantity }}
			</td>
			<td>
				{{ $product->unit }}
			</td>
			<td>
				{{ $product->price }}
			</td>
			<td>
				{{ $product->discount }}
			</td>
			<td>
				<div class="btn-group">
					<a class="btn btn-default" data-target="#products_update_{{ $product->id }}" data-toggle="tab">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>
					<button class="btn btn-default"
							data-disk-browser="true"
							data-disks="Products">
						<i class="fa fa-picture-o" aria-hidden="true"></i>
					</button>
					<button class="btn btn-default"
							data-modal="confirmation"
							data-message="Are you sure you want to delete {{ $product->name }} theme?"
							data-form="{{ $product->id }}_delete">
						<i class="fa fa-trash-o" aria-hidden="true"></i>
					</button>
				</div>

				<form method="POST" action="{{ url('/admin/product/destroy') }}" id="{{ $product->id }}_delete">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{ $product->id }}">
				</form>

			</td>			
		</tr>
		@endforeach
	</tbody>
</table>