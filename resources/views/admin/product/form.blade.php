<?php $partstype = DB::connection('mysql')->select('select * from product_type'); ?> 
<?php $partsband = DB::connection('mysql')->select('select * from band'); ?> 

<div class="form-group {{ $errors->has('productID') ? 'has-error' : ''}}">
    <label for="productID" class="control-label">{{ 'Productid' }}</label>
    <input class="form-control" name="productID" type="number" id="productID" value="{{ isset($product->productID) ? $product->productID : ''}}"disabled >
    {!! $errors->first('productID', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('producttypeID') ? 'has-error' : ''}}">
   <label for="producttypeID" class="control-label">{{ 'productTypeID' }}</label>
   <select class="form-control" name="producttypeID" id="productTypeID">
           <option value="{{ isset($product->producttypeID) ? $product->producttypeID : ''}}">{{ isset($product->producttypeID) ? $product->producttypeID : ''}}</option>
           @foreach($partstype as $row)
           	<option value="{{$row->producttypeID}}">{{$row->typename}}</option>
           @endforeach    
   </select>
   {!! $errors->first('bandID', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('bandID') ? 'has-error' : ''}}">
   <label for="bandID" class="control-label">{{ 'bandID' }}</label>
   <select class="form-control" name="bandID" id="bandID">
           <option value="{{ isset($product->bandID) ? $product->bandID : ''}}">{{ isset($product->bandID) ? $product->bandID : ''}}</option>
           @foreach($partsband as $row)
           	<option value="{{$row->bandID}}">{{$row->bandName}}</option>
           @endforeach    
   </select>
   {!! $errors->first('bandID', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('productname') ? 'has-error' : ''}}">
    <label for="productname" class="control-label">{{ 'Productname' }}</label>
    <input class="form-control" name="productname" type="text" id="productname" value="{{ isset($product->productname) ? $product->productname : ''}}" >
    {!! $errors->first('productname', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('stock') ? 'has-error' : ''}}">
    <label for="stock" class="control-label">{{ 'Stock' }}</label>
    <input class="form-control" name="stock" type="number" id="stock" value="{{ isset($product->stock) ? $product->stock : ''}}" >
    {!! $errors->first('stock', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($product->price) ? $product->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($product->image) ? $product->image : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('Likes') ? 'has-error' : ''}}">
    <label for="Likes" class="control-label">{{ 'Likes' }}</label>
    <input class="form-control" name="Likes" type="number" id="Likes" value="{{ isset($product->Likes) ? $product->Likes : ''}}" >
    {!! $errors->first('Likes', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
