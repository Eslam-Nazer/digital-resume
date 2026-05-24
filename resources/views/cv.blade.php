@extends('layouts.app')

@section('header')
@include('cv-header')
@endsection

@section('content')
<main class="space-y-6">

    {{-- Profile --}}
    <section>
        <h2 class="font-semibold text-xl sm:text-2xl mb-2 border-b-2">Profile</h2>
        <p class="text-sm sm:text-base">{{ $data['personal']['summary']['main'] }}</p>
        @if(!empty($data['personal']['summary']['extra']))
        <div class="mt-2">
            <span class="font-semibold">Extra: </span>
            <span class="text-sm sm:text-base">{{ $data['personal']['summary']['extra'] }}</span>
        </div>
        @endif
    </section>

    {{-- Education --}}
    <section>
        <h2 class="font-semibold text-xl sm:text-2xl mb-2 border-b-2">Education</h2>
        @foreach ($data['education'] as $edu)
        <div class="mb-2">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-0.5">
                <div class="font-semibold">{{ $edu['institution'] }}</div>
                <div class="text-sm text-gray-500">{{ $edu['from'] }} – {{ $edu['to'] }}</div>
            </div>
            <div class="italic text-gray-600 text-sm">{{ $edu['college'] ?? '' }}</div>
            <div class="ml-3 text-sm">Department of {{ $edu['field'] }}</div>
        </div>
        @endforeach
    </section>

    {{-- Experience --}}
    <section>
        <h2 class="font-semibold text-xl sm:text-2xl mb-2 border-b-2">Professional Experience</h2>
        @foreach ($data['experience'] as $experience)
        <div class="mb-4">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-0.5">
                <div class="font-semibold text-base sm:text-lg">{{ $experience['company'] }}</div>
                <div class="text-sm text-gray-500">
                    {{ $experience['from'] }} – {{ $experience['to'] ?? 'Present' }}
                </div>
            </div>
            <div class="flex flex-col sm:flex-row sm:justify-between text-sm text-gray-600 gap-0.5">
                <div>{{ $experience['role'] }}</div>
                <div>{{ $experience['location'] }}</div>
            </div>
            @if(!empty($experience['highlights']))
            <ul class="mt-1 space-y-0.5 list-disc list-inside text-sm">
                @foreach($experience['highlights'] as $highlight)
                <li>{{ $highlight }}</li>
                @endforeach
            </ul>
            @endif
            @if(!empty($experience['stack']))
            <div class="mt-1 text-xs text-gray-500 italic">
                {{ implode(', ', $experience['stack']) }}
            </div>
            @endif
        </div>
        @endforeach
    </section>

    {{-- Projects --}}
    <section>
        <h2 class="font-semibold text-xl sm:text-2xl mb-2 border-b-2">Projects</h2>
        @foreach ($data['projects'] as $project)
        <div class="mb-3">
            <div class="font-semibold">
                @if(!empty($project['url']))
                <a href="{{ $project['url'] }}" target="_blank" class="hover:underline">
                    {{ $project['name'] }}
                </a>
                @else
                {{ $project['name'] }}
                @endif
            </div>
            <div class="text-sm ml-2">{{ $project['description'] }}</div>
            <div class="text-xs italic text-gray-500 ml-2 mt-0.5">
                <span class="font-semibold not-italic text-gray-700">Technologies: </span>
                {{ implode(', ', $project['stack']) }}
            </div>
        </div>
        @endforeach
    </section>

    {{-- Skills --}}
    <section>
        <h2 class="font-semibold text-xl sm:text-2xl mb-2 border-b-2">Skills</h2>
        <div class="space-y-1">
            @foreach ($data['skills'] as $category => $skills)
            <div class="flex flex-col sm:flex-row sm:flex-wrap gap-x-1 text-sm">
                <span class="font-semibold">{{ $category }}:</span>
                <span class="italic text-gray-600">{{ implode(', ', $skills) }}</span>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Languages --}}
    <section>
        <h2 class="font-semibold text-xl sm:text-2xl mb-2 border-b-2">Languages</h2>
        <div class="space-y-1">
            @foreach ($data['languages'] as $lang)
            <div class="flex justify-between text-sm sm:text-base">
                <span class="font-semibold">{{ $lang['language'] }}</span>
                <span class="italic text-gray-500">{{ $lang['level'] }}</span>
            </div>
            @endforeach
        </div>
    </section>

</main>
@endsection