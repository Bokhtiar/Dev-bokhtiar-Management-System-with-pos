<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    @if (isset($label))
        <label for="{{ $name }}" class=" control-label">{{ $label }}</label>
    @endif

    <div class="col-md-12">
        <input 
            id="{{ $name }}" 
            class="form-control"
            name="{{ $name }}"
            value="{{ @$value ? $value : '' }}"
            type="{{ @$type ? $type : 'text' }}"
            placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
            {{ isset($attributes) ? $attributes : '' }}>

        @if ($errors->has($name))
            <span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div> 
</div>
