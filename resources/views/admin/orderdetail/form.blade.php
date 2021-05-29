<div class="form-group {{ $errors->has('order_detailID') ? 'has-error' : ''}}">
    <label for="order_detailID" class="control-label">{{ 'Order Detailid' }}</label>
    <input class="form-control" name="order_detailID" type="number" id="order_detailID" value="{{ isset($orderdetail->order_detailID) ? $orderdetail->order_detailID : ''}}" >
    {!! $errors->first('order_detailID', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('orderID') ? 'has-error' : ''}}">
    <label for="orderID" class="control-label">{{ 'Orderid' }}</label>
    <input class="form-control" name="orderID" type="number" id="orderID" value="{{ isset($orderdetail->orderID) ? $orderdetail->orderID : ''}}" >
    {!! $errors->first('orderID', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('productID') ? 'has-error' : ''}}">
    <label for="productID" class="control-label">{{ 'productID' }}</label>
    <input class="form-control" name="productID" type="number" id="productID" value="{{ isset($orderdetail->productID) ? $orderdetail->productID : ''}}" >
    {!! $errors->first('productID', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('LensID') ? 'has-error' : ''}}">
    <label for="LensID" class="control-label">{{ 'Lensid' }}</label>
    <input class="form-control" name="LensID" type="number" id="LensID" value="{{ isset($orderdetail->LensID) ? $orderdetail->LensID : ''}}" >
    {!! $errors->first('LensID', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Quantity') ? 'has-error' : ''}}">
    <label for="Quantity" class="control-label">{{ 'Quantity' }}</label>
    <input class="form-control" name="Quantity" type="number" id="Quantity" value="{{ isset($orderdetail->Quantity) ? $orderdetail->Quantity : ''}}" >
    {!! $errors->first('Quantity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price_total') ? 'has-error' : ''}}">
    <label for="price_total" class="control-label">{{ 'Price Total' }}</label>
    <input class="form-control" name="price_total" type="number" id="price_total" value="{{ isset($orderdetail->price_total) ? $orderdetail->price_total : ''}}" >
    {!! $errors->first('price_total', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
