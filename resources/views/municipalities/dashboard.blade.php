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
                    <!-- Top Banner -->
                    <div class="h-[24vh] flex items-center justify-center">
                        <img src="{{ asset('images/banner.jpg') }}" alt="" class="h-full">
                    </div>

                    <div class="px-2 py-4">
                        <div class="container mx-auto">
                            <!-- Top Section - Total Metrics -->
                            <div class="flex gap-4 mb-4">
                                <!-- Total Percentage Card -->
                                <div class="w-1/2">
                                    <div class="bg-black text-white p-4 rounded-lg h-32 flex flex-col justify-between">
                                        <h2 class="text-xl font-bold text-gray-200">Porcentaje Total</h2>
                                        <div>
                                            <div class="text-4xl font-bold mb-1">{{ $totalPercentage }}%</div>
                                            <div class="text-gray-300 text-sm">Total Movilizado: {{ number_format($totalMobilized) }}</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Total Goal Card -->
                                <div class="w-1/2">
                                    <div class="bg-black text-white p-4 rounded-lg h-32 flex flex-col justify-between">
                                        <h2 class="text-xl font-bold text-gray-200">Meta Total</h2>
                                        <div class="text-4xl font-bold">{{ number_format($totalGoal) }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bottom Section - Municipality Cards -->
                            <div class="grid grid-cols-3 gap-6">
                                @foreach($municipalities as $municipality)
                                    <div class="bg-white p-6 rounded-lg shadow">
                                        <h3 class="text-xl font-bold text-[var(--color-strong-purple)] mb-2">{{ $municipality->name }}</h3>
                                        <div class="text-gray-600 mb-3">{{ $municipality->state }}</div>
                                        <div class="flex justify-between mb-3">
                                            <span class="text-gray-600">Meta: {{ number_format($municipality->goal) }}</span>
                                            <span class="text-gray-600">Actual: {{ number_format($municipality->mobilized) }}</span>
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
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>