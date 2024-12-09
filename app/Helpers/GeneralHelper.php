<?php

function embedVideo($url) {
    // Cek apakah URL adalah YouTube
    if (str_contains($url, 'youtube.com') || str_contains($url, 'youtu.be')) {
        // Konversi ke embed URL
        $url = str_replace('watch?v=', 'embed/', $url);
        $url = str_replace('youtu.be/', 'youtube.com/embed/', $url);
    }
    // Tambahkan logika lain untuk platform video lain jika diperlukan
    return $url;
    
}
