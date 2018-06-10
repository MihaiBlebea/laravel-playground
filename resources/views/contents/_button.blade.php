<a href="">
    <button type="button" class="btn btn-primary">{{ $content->content }}</button>
</a>

@if(app('request')->input('editor') == true)
    <vue-content-editor editor="vue-input-editor"
                        content-id="{{ $content->id }}"
                        default-content="{{ $content->content }}">
    </vue-content-editor>
@endif
