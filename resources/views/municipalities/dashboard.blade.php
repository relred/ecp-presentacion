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
                            <!-- Left side - Municipality Cards (2/3) -->
                            <div class="w-2/3">
                                <div class="grid grid-cols-2 gap-6">
                                    @foreach($municipalities as $municipality)
                                        <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col">
                                            <div>
                                                <h3 class="text-2xl font-bold text-[var(--color-strong-purple)] mb-1">{{ $municipality->name }}</h3>
                                                <div class="text-gray-600 mb-4">{{ $municipality->state }}</div>
                                                <div class="flex justify-between mb-4">
                                                    <span class="text-gray-600">Meta: {{ number_format($municipality->goal) }}</span>
                                                    <span class="text-gray-600">Actual: {{ number_format($municipality->mobilized) }}</span>
                                                </div>
                                            </div>
                                            <div class="mt-auto">
                                                <div class="flex justify-between mb-2">
                                                    <span class="font-semibold">Progreso</span>
                                                    <span class="font-semibold">{{ $municipality->percentage }}%</span>
                                                </div>
                                                <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                                    @php
                                                        if ($municipality->percentage <= 20) {
                                                            $bar_color = 'bg-red-600';
                                                        } elseif ($municipality->percentage <= 40) {
                                                            $bar_color = 'bg-orange-400';
                                                        } elseif ($municipality->percentage <= 60) {
                                                            $bar_color = 'bg-yellow-400';
                                                        } elseif ($municipality->percentage <= 80) {
                                                            $bar_color = 'bg-purple-500';
                                                        } else {
                                                            $bar_color = 'bg-purple-950';
                                                        }
                                                    @endphp
                                                    <div class="{{ $bar_color }} h-full rounded-full transition-all duration-500"
                                                        style="width: {{ $municipality->percentage }}%">-</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Right side - Total Metrics (1/3) -->
                            <div class="w-1/3 space-y-8">
                                <!-- Total Percentage Card -->
                                <div class="bg-white rounded-lg shadow-lg p-8 text-center">
                                    <h2 class="text-2xl font-bold text-[var(--color-strong-purple)] mb-4">Porcentaje Total</h2>
                                    <div class="text-6xl font-bold mb-2">{{ $totalPercentage }}%</div>
                                    <div class="text-gray-600">Total Movilizado: {{ number_format($totalMobilized) }}</div>
                                </div>

                                <!-- Total Goal Card -->
                                <div class="bg-white rounded-lg shadow-lg p-8 text-center">
                                    <h2 class="text-2xl font-bold text-[var(--color-strong-purple)] mb-4">Meta Total</h2>
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