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
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <style>
        .neumorphism-shadow {
            box-shadow: -4px -4px 10px rgb(255, 255, 255), 4px 4px 10px rgba(0, 0, 0, 0.219);
        }
        /* Rotate chevron in collapsing */
        [data-bs-toggle='collapse'][aria-expanded='true'] span:nth-child(3) svg {
            transform: rotate(-90deg);
        }

        /* For bootstrap collapse plugin */
        .fade {
            transition: opacity 0.15s linear;
        }
        .fade:not(.show) {
            opacity: 0;
        }
        .collapse:not(.show) {
            display: none;
        }
        .collapsing {
            height: 0;
            overflow: hidden;
            transition: height 0.35s ease;
        }
        @media (prefers-reduced-motion: reduce) {
            .collapsing {
                transition: none;
            }
            .fade {
                transition: none;
            }
        }

    </style>

</head>
<body>
    {{$slot}}
</body>
</html>
