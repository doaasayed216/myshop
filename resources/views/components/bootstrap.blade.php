<!DOCTYPE html>
@props(['title'])
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$title}}</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/tailwindcss@2.0.1/dist/tailwind.min.css'>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <style>
        @media screen and (max-width: 1060px) {
            #primary { width:64%; margin-right: 3%;}
            #secondary { width:30%; margin-right:3%;}
            #content{width: 100%; overflow: scroll}
        }

        /* Media Queries: Tabled Portrait */
        @media screen and (max-width: 768px) {
            #primary { width:96%; margin-right: 2%; margin-left: 2%;}
            #secondary { width:100%; margin:0; border:none; }
            #content {width:100%; overflow: scroll;}
        }
    </style>
</head>
<body>
    {{$slot}}
</body>
</html>


