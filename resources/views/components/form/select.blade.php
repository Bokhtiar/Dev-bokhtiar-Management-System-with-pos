<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    @if (isset($label))
        <label for="{{ $label }}" class="control-label">{{ $label }}</label>
    @endif

    <div class="col-md-12">
       <select
        id="{{ $name }}" 
        name="{{ $name }}"
        class="form-control">
        <option value="">{{ $label }}</option>
        @foreach ($resource as $item)
        <option value="{{ $item->$field_id }}" {{ $item->$field_id == @$edit->$field_id ? 'selected' : '' }}>
            {{ $item->$field_name }}</option>
        @endforeach
       </select>

        @if ($errors->has($name))
            <span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div> 
</div>
