<div class="form-group {{ $errors->has('orderID') ? 'has-error' : ''}}">
    <label for="orderID" class="control-label">{{ 'Orderid' }}</label>
    <input class="form-control" name="orderID" type="number" id="orderID" value="{{ isset($order->orderID) ? $order->orderID : ''}}" >
    {!! $errors->first('orderID', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('userID') ? 'has-error' : ''}}">
    <label for="userID" class="control-label">{{ 'Userid' }}</label>
    <input class="form-control" name="userID" type="number" id="userID" value="{{ isset($order->userID) ? $order->userID : ''}}" >
    {!! $errors->first('userID', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('order_date') ? 'has-error' : ''}}">
    <label for="order_date" class="control-label">{{ 'Order Date' }}</label>
    <input class="form-control" name="order_date" type="date" id="order_date" value="{{ isset($order->order_date) ? $order->order_date : ''}}" >
    {!! $errors->first('order_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('order_ship') ? 'has-error' : ''}}">
    <label for="order_ship" class="control-label">{{ 'Order Ship' }}</label>
    <input class="form-control" name="order_ship" type="date" id="order_ship" value="{{ isset($order->order_ship) ? $order->order_ship : ''}}" >
    {!! $errors->first('order_ship', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="number" id="status" value="{{ isset($order->status) ? $order->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
