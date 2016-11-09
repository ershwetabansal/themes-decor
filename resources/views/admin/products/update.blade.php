<form class="form-horizontal" action="{{ url('/admin/product/update') }}" method="POST">
    	
	{{ csrf_field() }}

	<input type="hidden" name="id" value="{{ $product->id }}">
  <div class="form-group">
    <label for="input1" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input1" placeholder="Surprise gift bag"
      		name="name" value="{{ old('name', $product->name) }}" required/>
    </div>
  </div>
  <div class="form-group">
    <label for="input2" class="col-sm-2 control-label">Slug</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input2" placeholder="surprise-gift-bag"
      		name="slug" value="{{ old('slug', $product->slug) }}" required/>
    </div>
  </div>
  <div class="form-group">
    <label for="input3" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input3" placeholder="Description"
      		name="description" value="{{ old('description', $product->description) }}" required/>
    </div>
  </div>
  <div class="form-group">
    <label for="input4" class="col-sm-2 control-label">Quantity</label>
    <div class="col-sm-5">
      <input type="number" class="form-control" id="input4" placeholder="1.00"
      		name="quantity" value="{{ old('quantity', $product->quantity) }}"  required/>
    </div>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="input41" placeholder="kg"
      		name="unit" value="{{ old('unit', $product->unit) }}" required/>
    </div>
  </div>
  <div class="form-group">
    <label for="input5" class="col-sm-2 control-label">Price</label>
    <div class="col-sm-9">
      <input type="number" class="form-control" id="input5" placeholder="100.00"
      		name="price" value="{{ old('price', $product->price) }}" required/>
    </div>
    <div class="col-sm-1">
    	Rs
    </div>
  </div>

   <div class="form-group">
    <label for="input3" class="col-sm-2 control-label">Discount</label>
    <div class="col-sm-9">
      <input type="number" class="form-control" id="input3" placeholder="10"
      		name="discount" value="{{ old('discount', $product->discount) }}" required/>
    </div>
    <div class="col-sm-1">
    	%
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Update</button>
    </div>
  </div>
</form>