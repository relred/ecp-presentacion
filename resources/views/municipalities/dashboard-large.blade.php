<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Custom styles for 100-inch display */
        body {
            overflow: hidden;
            cursor: none;
        }
        .large-screen-container {
            height: 100vh;
            padding: 2vh 2vw;
        }
        .municipalities-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 3vh 3vw;
            height: 100%;
        }
        .municipality-card {
            background: white;
            border-radius: 2vh;
            padding: 3vh 3vw;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 0.5vh 1vh rgba(0, 0, 0, 0.1);
        }
        .municipality-name {
            font-size: 4.5vh;
            font-weight: bold;
            color: var(--color-strong-purple);
            margin-bottom: 1vh;
        }
        .state-name {
            font-size: 3vh;
            color: #666;
            margin-bottom: 2vh;
        }
        .numbers {
            font-size: 3vh;
            margin-bottom: 2vh;
        }
        .progress-text {
            font-size: 3vh;
            font-weight: 600;
        }
        .progress-bar {
            height: 1.5vh;
            border-radius: 0.75vh;
            background: #f3f4f6;
            margin-top: 1.5vh;
        }
        .metric-card {
            background: white;
            border-radius: 2vh;
            padding: 4vh;
            margin-bottom: 4vh;
            text-align: center;
        }
        .metric-title {
            font-size: 5vh;
            color: var(--color-strong-purple);
            margin-bottom: 3vh;
        }
        .metric-value {
            font-size: 12vh;
            font-weight: bold;
        }
        .metric-subtitle {
            font-size: 3.5vh;
            color: #666;
            margin-top: 2vh;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="large-screen-container bg-[var(--color-light-purple)]">
        <div class="flex h-full gap-8">
            <!-- Left side - Municipality Cards (2/3) -->
            <div class="w-2/3">
                <div class="municipalities-grid">
                    @foreach($municipalities as $municipality)
                        <div class="municipality-card">
                            <div>
                                <div class="municipality-name">{{ $municipality->name }}</div>
                                <div class="state-name">{{ $municipality->state }}</div>
                                <div class="numbers flex justify-between">
                                    <span>Meta: {{ number_format($municipality->goal) }}</span>
                                    <span>Actual: {{ number_format($municipality->mobilized) }}</span>
                                </div>
                            </div>
                            <div>
                                <div class="progress-text flex justify-between">
                                    <span>Progreso</span>
                                    <span>{{ $municipality->percentage }}%</span>
                                </div>
                                <div class="progress-bar">
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
            <div class="w-1/3 flex flex-col justify-center gap-8">
                <!-- Total Percentage Card -->
                <div class="metric-card">
                    <h2 class="metric-title">Porcentaje Total</h2>
                    <div class="metric-value">{{ $totalPercentage }}%</div>
                    <div class="metric-subtitle">Total Movilizado: {{ number_format($totalMobilized) }}</div>
                </div>

                <!-- Total Goal Card -->
                <div class="metric-card">
                    <h2 class="metric-title">Meta Total</h2>
                    <div class="metric-value">{{ number_format($totalGoal) }}</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-refresh every 5 minutes
        setTimeout(function() {
            window.location.reload();
        }, 5 * 60 * 1000);
    </script>
</body>
</html> 