<div class="form-group {{ $errors->has('bandID') ? 'has-error' : ''}}">
    <label for="bandID" class="control-label">{{ 'Bandid' }}</label>
    <input class="form-control" name="bandID" type="number" id="bandID" value="{{ isset($band->bandID) ? $band->bandID : ''}}" disabled>
    {!! $errors->first('bandID', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bandName') ? 'has-error' : ''}}">
    <label for="bandName" class="control-label">{{ 'Bandname' }}</label>
    <input class="form-control" name="bandName" type="text" id="bandName" value="{{ isset($band->bandName) ? $band->bandName : ''}}" >
    {!! $errors->first('bandName', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
