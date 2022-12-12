@extends('layouts.app')

@section('content')
    <div class="container pb-1">
        <h1 class="text-center"><u>Gráfico do repositório <b>{{$commit->project}}</b></u></h1>
    </div>
    <div id="serieTemporal"></div>

@endsection

@push('scripts')
<script>
    // create data
    var data = [
        @foreach ($datas as $data)
            @if ($data->github_datas_id == $commit->id)
                @if($data->year >= $year)
                    @if ($data->month >= $month)
                        @if ($data->day <= $day)
                            @php
                                $count += 1
                            @endphp
                            ["{{date('d/m/Y', strtotime($data->full_date))}}", {{ $count }}],
                        @endif
                    @endif
                @endif
            @endif
        @endforeach
    ];

    // create a chart
    chart = anychart.area();

    // create an area series and set the data
    var series = chart.area(data);

    series.name("Quantidade de commits");
    // set the container id
    chart.container("serieTemporal");
    chart.xAxis().labels().rotation(-60);
    chart.xScale().mode('continuous');
    chart.xAxis().drawLastLabel(false);
    // initiate drawing the chart
    chart.draw();
</script>
@endpush