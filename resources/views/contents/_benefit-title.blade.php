<button class="btn btn-link"
        type="button"
        data-toggle="collapse"
        data-target="#collapse_{{ $content->order }}"
        aria-expanded="false"
        aria-controls="collapse_{{ $content->order }}">
    {{ $content->content }}
</button>
@if(app('request')->input('editor') == true)
    <vue-content-editor editor="vue-input-editor"
                        content-id="{{ $content->id }}"
                        default-content="{{ $content->content }}">
    </vue-content-editor>
@endif
