@extends('layouts.mainAdmin-layout')

@section('content')

<div class="container">
    <h1>Admin Dashboard</h1>
    <h3>Results Overview</h3>

    <!-- Display Chart -->
    <div>
        <canvas id="resultsChart" width="400" height="200"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('resultsChart').getContext('2d');
        var resultsChart = new Chart(ctx, {
            type: 'bar', // or 'line', 'pie', etc.
            data: {
                labels: @json($labels), // Labels (subjects)
                datasets: [{
                    label: 'Total Marks',
                    data: @json($data), // Data (marks)
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            });
    </script>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection
