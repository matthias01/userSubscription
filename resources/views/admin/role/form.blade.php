<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" required value="{{ isset($role->name) ? $role->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'permissions', ['class' => 'control-label']) !!}

   {!! Form::select('permissions[]',$permissions ,old('permissions')?? isset($role)?$role->permissions->pluck('name','name') : '', ('' == 'required') ? ['class'=> 'form-control', 'required'=>'required', 'multiple'] : ['class'=> 'form-control', 'required'=>'required', 'multiple'] )!!}
    
    {!! $errors->first('permissions', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
