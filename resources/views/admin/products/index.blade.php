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
				<a data-target="#products_update_{{ $product->id }}" data-toggle="tab">
					Edit
				</a>
				<button>Browse</button>
			</td>			
		</tr>
		@endforeach
	</tbody>
</table>