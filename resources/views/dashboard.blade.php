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
                <div class="h-[24vh] bg-[#086bb] flex items-center justify-center">
                    <img src="{{ asset('images/banner.jpg') }}" alt="" class="h-full">
                </div>

                <div class="px-2 py-4">
                    <!-- States Grid with Metrics -->
                    <div class="grid grid-cols-6 gap-3">
                        @foreach($states as $state)
                            <div class="state-card bg-white p-3 rounded-lg shadow">
                                <h3 class="text-lg font-bold text-[var(--color-strong-purple)] mb-1">{{ $state->name }}</h3>
                                <div class="flex justify-between mb-1 text-sm">
                                    <span class="text-gray-600">Meta: {{ number_format($state->goal) }}</span>
                                    <span class="text-gray-600">Actual: {{ number_format($state->mobilized) }}</span>
                                </div>
                                <div class="mt-auto">
                                    <div class="flex justify-between mb-1 text-sm">
                                        <span class="font-semibold">Progreso</span>
                                        <span class="font-semibold">{{ $state->percentage }}%</span>
                                    </div>
                                    <div class="progress-bar h-3">
                                        @php
                                            if ($state->percentage <= 20) {
                                                $bar_color = 'bg-red-600';
                                            } elseif ($state->percentage <= 40) {
                                                $bar_color = 'bg-orange-400';
                                            } elseif ($state->percentage <= 60) {
                                                $bar_color = 'bg-yellow-400';
                                            } elseif ($state->percentage <= 80) {
                                                $bar_color = 'bg-purple-500';
                                            } else {
                                                $bar_color = 'bg-purple-950';
                                            }
                                        @endphp
                                        <div class="progress-bar-fill {{ $bar_color }}"
                                            style="width: {{ $state->percentage }}%">-</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- National Percentage Card -->
                        <div class="col-span-2">
                            <div class="metric-card bg-black text-white p-4 rounded-lg h-32 flex flex-col justify-between">
                                <h2 class="text-xl font-bold text-gray-200">Porcentaje Nacional</h2>
                                <div>
                                    <div class="text-6xl font-bold mb-1 text-center">{{ $nationalPercentage }}%</div>
                                    
                                    <div class="text-gray-300 text-xl text-center">Total Movilizado: {{ number_format($totalMobilized) }}</div>
                                </div>
                                <div class="progress-bar h-3 w-full">
                                    @php
                                        if ($nationalPercentage <= 20) {
                                            $bar_color = 'bg-red-600';
                                        } elseif ($nationalPercentage <= 40) {
                                            $bar_color = 'bg-orange-400';
                                        } elseif ($nationalPercentage <= 60) {
                                            $bar_color = 'bg-yellow-400';
                                        } elseif ($nationalPercentage <= 80) {
                                            $bar_color = 'bg-purple-500';
                                        } else {
                                            $bar_color = 'bg-purple-950';
                                        }
                                    @endphp
                                    <div class="progress-bar-fill {{ $bar_color }} border-2 border-purple-600 rounded-full"
                                        style="width: {{ $nationalPercentage }}%">-</div>
                                </div>
                            </div>
                        </div>

                        <!-- National Goal Card -->
                        <div class="col-span-2">
                            <div class="metric-card bg-black text-white p-4 rounded-lg h-32 flex flex-col justify-between">
                                <h2 class="text-xl font-bold text-gray-200">Meta Nacional</h2>
                                <div class="text-6xl font-bold text-center">{{ number_format($totalGoal) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </main>
        </div>
    </body>
</html>
