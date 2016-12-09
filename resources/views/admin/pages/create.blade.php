<form class="form-horizontal" action="{{ url('/admin/page/store') }}" method="POST">
    	
	{{ csrf_field() }}

  <div class="form-group">
    <label for="input1" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input1" placeholder="Contact us"
      		name="name" value="{{ old('name') }}" data-action="update_slug" data-update="page_slug"
             required />
    </div>
  </div>
  <div class="form-group">
    <label for="input2" class="col-sm-2 control-label">Slug</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input2" placeholder="contact-us"
      		name="slug" value="{{ old('slug') }}" data-type="page_slug" required/>
    </div>
  </div>
  <div class="form-group">
    <label for="input4" class="col-sm-2 control-label">title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input4" placeholder="Contact us"
      		name="title" value="{{ old('title') }}" required/>
    </div>
  </div>
  <div class="form-group">
    <label for="input5" class="col-sm-2 control-label">Content</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input5" placeholder=""
      		name="content" value="{{ old('content') }}" />
    </div>
  </div>
  <div class="form-group">
    <label for="input6" class="col-sm-2 control-label">Page type</label>
    <div class="col-sm-10">
      <select name="page_type_id" id="input6" class="form-control" required>
        <option value="" disabled selected>--Choose--</option>
        @foreach($pageTypes as $pageType)
          <option value="{{ $pageType->id }}">{{ $pageType->name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Create new page</button>
    </div>
  </div>
</form>