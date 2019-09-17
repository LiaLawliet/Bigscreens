@extends('layouts.back')

@section('content')
    <div id="chartArea" class="row"></div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="{{asset('charts.js')}}"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {

        let pie_data = [@json($pieQ6), @json($pieQ7), @json($pieQ8)];
        pieCharts(pie_data);

        let radar_data = @json($radar_data);
        radarCharts(radar_data);

    });
</script>
@endsection
