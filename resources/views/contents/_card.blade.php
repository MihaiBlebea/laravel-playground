<div class="card">
    <div class="card-body">
        {!! Markdown::convertToHtml($content->content) !!}
    </div>
</div>

@if(app('request')->input('editor') == true)
    <vue-content-editor editor="vue-textarea-editor"
                        content-id="{{ $content->id }}"
                        default-content="{{ $content->content }}">
    </vue-content-editor>
@endif
