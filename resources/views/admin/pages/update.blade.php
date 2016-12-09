<form class="form-horizontal" action="{{ url('/admin/page/update') }}" method="POST">
    	
	{{ csrf_field() }}

	<input type="hidden" name="id" value="{{ $page->id }}">
  <div class="form-group">
    <label for="input1" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input1" 
             name="name" value="{{ old('name', $page->name) }}" data-action="update_slug" data-update="page_slug"
             required />
    </div>
  </div>
  <div class="form-group">
    <label for="input2" class="col-sm-2 control-label">Slug</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input2" 
             name="slug" value="{{ old('slug', $page->slug) }}" data-type="page_slug" required/>
    </div>
  </div>
  <div class="form-group">
    <label for="input4" class="col-sm-2 control-label">title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input4" 
             name="title" value="{{ old('title', $page->title) }}" required/>
    </div>
  </div>
  <div class="form-group">
    <label for="input5" class="col-sm-2 control-label">Content</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="input5" name="content" >{{ old('content', $page->content) }}</textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="input6" class="col-sm-2 control-label">Page type</label>
    <div class="col-sm-10">
      <select name="page_type_id" id="input6" class="form-control" required>
        @foreach($pageTypes as $pageType)
          <option value="{{ $pageType->id }}"
            @if($page->page_type_id == $pageType->id) selected @endif
          >{{ $pageType->name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Update</button>
    </div>
  </div>
</form>