@props([
    'data',
    'url'
])

@if ($data->embed)
    <div class="mb-16">
        @if (is_array($data->embed))
            @foreach ($data->embed as $e)
                @php
                    $url = is_array($e) ? $e['url'] ?? null : $e;
                @endphp
                @if ($url)
                    <x-project-embed :url="$url" />
                @endif
            @endforeach
        @else
            <x-project-embed :url="$url" />
        @endif
    </div>
@endif