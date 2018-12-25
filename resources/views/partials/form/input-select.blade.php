<div class="form-group row @if ($errors->has($name)) has-error @endif">
    <label for="{{ $name }}"
           class="col-md-4 col-form-label text-md-right">{{ __("{$label}") }}</label>
    <div class="col-md-8">
        <select id="{{ $name }}" type="text"
                class="form-control {{ $errors->has($name) ? ' is-invalid' : '' }}"
                name="{{ $name }}">
            <option value="">Select {{ $label }}</option>
            @if(gettype($options) != 'array')
                @php
                    $parentName = $parentName ?? null
                @endphp
                @foreach($options as $v)
                    <option value="{{ $v->id }}"
                        @if(isset($model) && old($name) == '' && $model->$name == $v->id)
                            selected
                        @elseif(old($name) == $v->{$name})
                            selected
                        @endif
                        @if($parentName)
                            data-{{ $parentName }}-id = {{ $v->{$parentName}->id }}
                        @endif
                    >
                        {{ $v->name }}
                    </option>
                @endforeach
            @else
                @foreach($options as $k => $v)
                    <option value="{{ $v }}"
                        @if(isset($model) && old($name) == '' && $model->$name == $v)
                        selected
                        @elseif(old($name) == $v)
                        selected
                        @endif
                    >
                        {{ $k }}
                    </option>
                @endforeach
            @endif
        </select>

        @if ($errors->has($name))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div>
</div>