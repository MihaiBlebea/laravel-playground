<h1>{{ $content->content }}</h1>

@if(app('request')->input('editor') == true)
    <vue-content-editor editor="vue-input-editor"
                        content-id="{{ $content->id }}"
                        default-content="{{ $content->content }}">
    </vue-content-editor>
@endif
