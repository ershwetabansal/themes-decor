<form class="form-horizontal" action="{{ url('/admin/service/store') }}" method="POST">
    	
	{{ csrf_field() }}

  <div class="form-group">
    <label for="input1" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input1" placeholder="Birthday celebration"
      		name="name" value="{{ old('name') }}" required/>
    </div>
  </div>
  <div class="form-group">
    <label for="input2" class="col-sm-2 control-label">Slug</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input2" placeholder="birthday-celebration"
      		name="slug" value="{{ old('slug') }}" required/>
    </div>
  </div>
  <div class="form-group">
    <label for="input3" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input3" placeholder="Description"
      		name="description" value="{{ old('description') }}" />
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Create new service</button>
    </div>
  </div>
</form>