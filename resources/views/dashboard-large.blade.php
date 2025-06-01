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
            overflow: hidden; /* Prevent scrolling */
            cursor: none; /* Hide cursor */
        }
        .large-screen-container {
            height: 100vh;
            padding: 2vh 2vw;
        }
        .states-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2vh 2vw;
            height: 100%;
        }
        .state-card {
            background: white;
            border-radius: 1.5vh;
            padding: 2vh 2vw;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 0.5vh 1vh rgba(0, 0, 0, 0.1);
        }
        .state-name {
            font-size: 3.5vh;
            font-weight: bold;
            color: var(--color-strong-purple);
            margin-bottom: 1vh;
        }
        .numbers {
            font-size: 2.5vh;
            margin-bottom: 1vh;
        }
        .progress-text {
            font-size: 2.5vh;
            font-weight: 600;
        }
        .progress-bar {
            height: 1vh;
            border-radius: 0.5vh;
            background: #f3f4f6;
            margin-top: 1vh;
        }
        .metric-card {
            background: white;
            border-radius: 2vh;
            padding: 3vh;
            margin-bottom: 3vh;
            text-align: center;
        }
        .metric-title {
            font-size: 4vh;
            color: var(--color-strong-purple);
            margin-bottom: 2vh;
        }
        .metric-value {
            font-size: 10vh;
            font-weight: bold;
        }
        .metric-subtitle {
            font-size: 3vh;
            color: #666;
            margin-top: 1vh;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="large-screen-container bg-[var(--color-light-purple)]">
        <div class="flex h-full gap-8">
            <!-- Left side - State Cards (2/3) -->
            <div class="w-2/3">
                <div class="states-grid">
                    @foreach($states as $state)
                        <div class="state-card">
                            <div>
                                <div class="state-name">{{ $state->name }}</div>
                                <div class="numbers flex justify-between">
                                    <span>Meta: {{ number_format($state->goal) }}</span>
                                    <span>Actual: {{ number_format($state->mobilized) }}</span>
                                </div>
                            </div>
                            <div>
                                <div class="progress-text flex justify-between">
                                    <span>Progreso</span>
                                    <span>{{ $state->percentage }}%</span>
                                </div>
                                <div class="progress-bar">
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
                                    <div class="{{ $bar_color }} h-full rounded-full transition-all duration-500"
                                         style="width: {{ $state->percentage }}%">-</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Right side - National Metrics (1/3) -->
            <div class="w-1/3 flex flex-col justify-center gap-8">
                <!-- National Percentage Card -->
                <div class="metric-card">
                    <h2 class="metric-title">Porcentaje Nacional</h2>
                    <div class="metric-value">{{ $nationalPercentage }}%</div>
                    <div class="metric-subtitle">Total Movilizado: {{ number_format($totalMobilized) }}</div>
                </div>

                <!-- National Goal Card -->
                <div class="metric-card">
                    <h2 class="metric-title">Meta Nacional</h2>
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