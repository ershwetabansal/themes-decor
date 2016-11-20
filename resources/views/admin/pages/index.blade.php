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
				Title
			</th>
			<th>
				Content
			</th>
			<th>
				Template
			</th>
			<th>
				Images
			</th>
		</tr>
	</thead>
	<tbody>
		@foreach($pages as $page)
		<tr>
			<td>
				{{ $page->name }}
			</td>
			<td>
				{{ $page->description }}
			</td>
			<td>
				{{ $page->title }}
			</td>
			<td>
				{{ str_limit($page->content, 100) }}
			</td>
			<td>
				{{ $page->pageType->name }}
			</td>
			<td>
				<div class="btn-group">
					<a class="btn btn-default" data-target="#pages_update_{{ $page->id }}" data-toggle="tab">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>
					<button class="btn btn-default"
							data-disk-browser="true"
							data-disks="Pages">
						<i class="fa fa-picture-o" aria-hidden="true"></i>
					</button>
				</div>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>