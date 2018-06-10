
@foreach($section['contents'] as $index => $content)

    @include($section['contents'][$index]->template, [ 'content' => $content ])

@endforeach
