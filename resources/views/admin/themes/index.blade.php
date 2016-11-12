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
				<div class="btn-group">
					<a class="btn btn-success" data-target="#themes_update_{{ $theme->id }}" data-toggle="tab">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>
					<button class="btn btn-default"
							data-disk-browser="true"
							data-disks="Themes">
						<i class="fa fa-picture-o" aria-hidden="true"></i>
					</button>
					<button class="btn btn-danger"
							data-modal="confirmation"
							data-message="Are you sure you want to delete {{ $theme->name }} theme?"
							data-form="{{ $theme->id }}_delete">
						<i class="fa fa-trash-o" aria-hidden="true"></i>
					</button>
				</div>

				<form method="POST" action="{{ url('/admin/theme/destroy') }}" id="{{ $theme->id }}_delete">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{ $theme->id }}">
				</form>

			</td>
		</tr>
		@endforeach
	</tbody>
</table>