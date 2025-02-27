@props(['meta_words', 'meta_description', 'url'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compable" content="ie=edge">
    <meta name="keywords" content="{{ $meta_words ?? ($seo->meta_keywords ?? '') }}">
    <meta name="discription" content="{{ $meta_description ?? ($seo->meta_description ?? '') }}">
    <link rel="shortcut icon" href="{{ asset('\favicon-16x16.png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <meta property="og:title" content="K SQUARE KHABAR" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="{{ $url ?? '/' }}" />
    <meta property="og:description" content="" />
    <title>khadkakamal.com.np &#8211; No 1 News Portal from Nepal in Nepali</title>
    <script type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property=6780e66e5e09d6001a1a13d7&product=inline-share-buttons'
        async='async'></script>
    <script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=6780e66e5e09d6001a1a13d7&product=inline-share-buttons&source=platform"
        async="async"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/app.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="/frontend/style.css">
    <style>
        .description figure,
        .description img {
            width: 1020px !important;

    }
    </style>
</head>
<body class="md:ring-offset-4 box-border hover:box-content">
    <header class="ring-2 ring-offset-2 md:ring-offset-4">
        <div class="container md:items-center grid md:grid-cols-12 gap-1">
            <div class="md:col-span-9 w-[100%]">
                {{ nepalidate(now()) }}
                <img src="{{ asset($company->logo) }}" alt="logo">
                <audio id="stream" controls="none" style="width:400px">
                    <source src="https://stream.zeno.fm/dq3x4kbhue0vv" type="audio/mpeg">
                </audio>
            </div>
            <div class="md:flex col-span-3">
                <img src="/images/gifkamal.gif" width="400px" height="80px" alt="logo">
            </div>
        </div>
    </header>
    <main>
        <x-frontend-navbar />
        {{ $slot }}
    </main>
    <x-frontend-footer />
</body>
</html>
