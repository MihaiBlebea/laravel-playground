<div class="accordion">
    @foreach($section['contents'] as $index => $content)

        <div class="card">

            @if($content->name == 'benefit-title')

                <div class="card-header" id="heading_{{ $content->order }}">
                    <h5 class="mb-0">
                        @include($section['contents'][$index]->template, [ 'content' => $content ])
                    </h5>
                </div>

            @else

                <div id="collapse_{{ $content->order }}" class="collapse" aria-labelledby="heading_{{ $content->order }}" data-parent="#accordionExample">
                    <div class="card-body">
                        @include($section['contents'][$index]->template, [ 'content' => $content ])
                    </div>
                </div>

            @endif

        </div>

    @endforeach
</div>
