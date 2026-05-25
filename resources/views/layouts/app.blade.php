<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://kit.fontawesome.com/41d46ddf95.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body class="bg-gray-50 min-h-screen">

    <div class="mx-auto my-4 sm:my-8 p-4 sm:p-8 border border-gray-200 bg-white w-full max-w-4xl rounded-md shadow-sm">
        <div class="flex justify-start mb-4">
            <a href="{{ route('cv.download') }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-gray-800 text-white text-sm
              rounded hover:bg-gray-700 transition-colors print:hidden">
                <i class="fa-solid fa-download"></i>
                Download PDF
            </a>
        </div>

        @yield('header')
        @yield('content')
    </div>
</body>

</html>