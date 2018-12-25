<div class="form-group row @if ($errors->has($name)) has-error @endif">
    <div id="{{ $name }}-preview">
        @if(isset($image_url))
            <img src="{{ $image_url }}" alt="{{ $name }}" style="width: 100%; margin-bottom: 10px;">
        @endif
    </div>
    <label for="{{ $name }}"
           class="col-md-4 col-form-label text-md-right">{{ __("{$label}") }}</label>
    <div class="col-md-8">
        <input id="{{ $name }}" type="file"
               class="{{ $errors->has($name) ? ' is-invalid' : '' }}"
               name="{{ $name }}"
               @if(isset($attrs) and is_array($attrs))
                    @foreach($attrs as $k => $v)
                    {{ $k }} = "{{ $v }}"
                    @endforeach
               @endif>
        @if ($errors->has($name))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div>
</div>

<style>
    #{{ $name }}-preview > img{
        width: 100%;
        margin-bottom: 10px;
    }
</style>

<script type="text/javascript">
    window.onload = function(){
        var file = document.getElementById('{{ $name }}');
        var previewDiv = document.getElementById('{{ $name }}-preview')
        if(file){
            file.onchange = function(){
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        previewDiv.innerHTML = "<img src='"+e.target.result+"' alt='img preview'>";
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            };
        }
    }
</script>