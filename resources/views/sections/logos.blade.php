<div class="row">

    @foreach($section['contents'] as $index => $content)

        <div class="col">

            @include($section['contents'][$index]->template, [ 'content' => $content ])

        </div>

    @endforeach

</div>
