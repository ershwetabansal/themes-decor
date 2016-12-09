<form class="form-horizontal" action="{{ url('/admin/package/update') }}" method="POST">
    	
	{{ csrf_field() }}

	<input type="hidden" name="id" value="{{ $package->id }}">
  <div class="form-group">
    <label for="input1" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input1" placeholder="Surprise gift bag"
      		name="name" value="{{ old('name', $package->name) }}" required/>
    </div>
  </div>
  <div class="form-group">
    <label for="input2" class="col-sm-2 control-label">Slug</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input2" placeholder="surprise-gift-bag"
      		name="slug" value="{{ old('slug', $package->slug) }}" required/>
    </div>
  </div>
  <div class="form-group">
    <label for="input3" class="col-sm-2 control-label">Content</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input3" 
      		name="content" value="{{ old('content', $package->content) }}"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Update</button>
    </div>
  </div>
</form>