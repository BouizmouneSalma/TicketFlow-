@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <main class="relative overflow-hidden">
        @include('components.hero')
    </main>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white/50 dark:bg-gray-800/50 backdrop-blur-lg">
        @include('components.features')
    </section>
@endsection