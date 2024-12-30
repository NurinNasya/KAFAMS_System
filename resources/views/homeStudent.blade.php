@extends('layouts.main-layout')

@section('content')

<div class="container">
    <h1>Student Dashboard</h1>
    <h3>Your Results</h3>

    <!-- Display Student's Chart -->
    <canvas id="studentResultsChart" width="400" height="200"></canvas>

    <script>
        var ctx = document.getElementById('studentResultsChart').getContext('2d');
        var studentResultsChart = new Chart(ctx, {
            type: 'bar', // or 'line', 'pie', etc.
            data: {
                labels: @json($assessmentLabels), // Labels (assessments)
                datasets: [{
                    label: 'Your Marks',
                    data: @json($assessmentData), // Data (marks)
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
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

@endsection
