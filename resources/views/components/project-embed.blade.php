@props(['url'])

@php
    $embedHtml = '';
    $url = trim($url);
    $platform = null;

    // YouTube
    if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/|youtube\.com\/shorts\/)([^"&?\/\s]{11})/i', $url, $matches)) {
        $videoId = $matches[1];
        $embedHtml = '<iframe class="w-full aspect-video rounded-sm shadow-sm" src="https://www.youtube.com/embed/' . $videoId . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    }
    // Spotify
    elseif (str_contains($url, 'spotify.com')) {
        $spotifyUrl = str_replace('spotify.com/', 'spotify.com/embed/', $url);
        $spotifyUrl = str_replace('/embed/embed/', '/embed/', $spotifyUrl);
        $embedHtml = '<iframe style="border-radius:12px" src="' . $spotifyUrl . '" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>';
    }
    // Instagram
    elseif (str_contains($url, 'instagram.com')) {
        $platform = 'instagram';
        $cleanUrl = strtok($url, '?');
        $embedHtml = '<blockquote class="instagram-media w-full mx-auto" data-instgrm-permalink="' . $cleanUrl . '" data-instgrm-version="14" style="background:#FFF; border:0; border-radius:3px; margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"></blockquote>';
    }
    // TikTok
    elseif (str_contains($url, 'tiktok.com')) {
        $platform = 'tiktok';
        $videoId = '';
        if (preg_match('/(?:\/video\/|\/v\/|\/embed\/|video_id=)(\d+)/', $url, $matches)) {
            $videoId = $matches[1];
        }

        if ($videoId) {
            $embedHtml = '<div class="tiktok-wrapper flex justify-center w-full my-6">
                    <iframe 
                        src="https://www.tiktok.com/embed/v2/' . $videoId . '" 
                        style="width: 100%; max-width: 325px; height: 580px; border-radius: 12px; border: none;"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        allowfullscreen>
                    </iframe>
                </div>';
        } else {
            $embedHtml = '<div class="p-4 bg-neutral-50 rounded-sm text-neutral-500 text-sm border border-neutral-100 flex items-center justify-between my-4">
                            <span class="truncate mr-4">' . $url . '</span>
                            <a href="' . $url . '" target="_blank" class="text-neutral-900 font-medium hover:underline flex-shrink-0">View TikTok</a>
                        </div>';
        }
    }
    // Generic iframe fallback
    elseif (str_contains($url, '<iframe')) {
        $embedHtml = $url;
    } else {
        $embedHtml = '<div class="p-4 bg-neutral-50 rounded-sm text-neutral-500 text-sm border border-neutral-100 flex items-center justify-between">
                            <span>' . $url . '</span>
                            <a href="' . $url . '" target="_blank" class="text-neutral-900 font-medium hover:underline">View Link</a>
                        </div>';
    }
@endphp

<div class="project-embed-wrapper mb-10 overflow-hidden">
    {!! $embedHtml !!}
</div>

@if ($platform === 'instagram')
@pushonce('scripts')
<script async src="//www.instagram.com/embed.js"></script>
@endpushonce
@endif

@if ($platform === 'tiktok')
    {{-- No additional script needed for iframe embed --}}
@endif