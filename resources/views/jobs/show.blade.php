<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2><strong>{{ $job->title }}</strong></h2>

    <p>This job pays {{ $job->salary}} per year.</p>

    <p class="mt-6">
        <x-button href="/jobs/{{ $job->id }}/edit">Edit Job </x-button>
    </p>

</x-layout>