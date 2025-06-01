<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            

            <!-- Page Content -->
            <main>
            <div class="min-h-screen bg-[var(--color-light-purple)]">
                <div class="container mx-auto px-4 py-8">
                    <div class="flex gap-8">
                        <!-- Left side - State Cards (2/3) -->
                        <div class="w-2/3">
                            <div class="large-screen-grid">
                                @foreach($states as $state)
                                    <div class="state-card">
                                        <h3 class="text-xl font-bold text-[var(--color-strong-purple)] mb-2">{{ $state->name }}</h3>
                                        <div class="flex justify-between mb-2">
                                            <span class="text-gray-600">Meta: {{ number_format($state->goal) }}</span>
                                            <span class="text-gray-600">Actual: {{ number_format($state->mobilized) }}</span>
                                        </div>
                                        <div class="mt-auto">
                                            <div class="flex justify-between mb-1">
                                                <span class="font-semibold">Progreso</span>
                                                <span class="font-semibold">{{ $state->percentage }}%</span>
                                            </div>
                                            <div class="progress-bar">
                                                <div class="progress-bar-fill progress-{{ $state->progress_color }}"
                                                    style="width: {{ $state->percentage }}%"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Right side - National Metrics (1/3) -->
                        <div class="w-1/3 space-y-8">
                            <!-- National Percentage Card -->
                            <div class="metric-card bg-white mt-16">
                                <h2 class="text-2xl font-bold text-[var(--color-strong-purple)] mb-4">Porcentaje Nacional</h2>
                                <div class="text-6xl font-bold mb-2">{{ $nationalPercentage }}%</div>
                                <div class="text-gray-600">Total Movilizado: {{ number_format($totalMobilized) }}</div>
                            </div>

                            <!-- National Goal Card -->
                            <div class="metric-card bg-white">
                                <h2 class="text-2xl font-bold text-[var(--color-strong-purple)] mb-4">Meta Nacional</h2>
                                <div class="text-6xl font-bold">{{ number_format($totalGoal) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </main>
        </div>
    </body>
</html>
