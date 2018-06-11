<img src="{{ '' }}">

@if(app('request')->input('editor') == true)
    <vue-content-editor editor="vue-upload-editor"
                        content-id="{{ $content->id }}"
                        default-content="{{ $content->content }}">
    </vue-content-editor>
@endif
