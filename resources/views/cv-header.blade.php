<header class="mb-6">
    <h1 class="font-semibold text-3xl sm:text-4xl text-center">
        {{ $data['personal']['name'] }}
    </h1>
    <div class="text-lg sm:text-2xl text-center italic pb-3 text-gray-600">
        {{ $data['personal']['title'] }}
    </div>

    <!-- Contact row — wraps on small screens -->
    <div class="flex flex-wrap items-center justify-center gap-x-4 gap-y-1 text-sm sm:text-base">
        <div><i class="fa-regular fa-envelope mr-1"></i>{{ $data['personal']['email'] }}</div>
        <div><i class="fa-solid fa-phone mr-1"></i>{{ $data['personal']['phone'] }}</div>
        <div><i class="fa-solid fa-location-dot mr-1"></i>{{ $data['personal']['location'] }}</div>
    </div>

    <!-- Social links -->
    <div class="flex flex-wrap items-center justify-center gap-3 mt-2 text-sm sm:text-base">
        @foreach ($data['social'] as $social)
        <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
            class="hover:underline">
            <i class="fa-brands fa-{{ $social['platform'] }} mr-1"></i>{{ $social['label'] }}
        </a>
        @endforeach
    </div>
</header>
