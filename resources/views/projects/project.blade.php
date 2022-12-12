@extends('layouts.app')

@section('content')
    <div class="container pb-1">
        <h1 class="text-center"><u>Gráfico do repositório <b>{{$commit->project}}</b></u></h1>
    </div>
    @foreach ($datas as $data)
        @if ($data->github_datas_id == $commit->id)
            @if($data->year >= $year)
                @if ($data->month >= $month)
                    @if ($data->day <= $day)
                        @php
                            $var = true;
                        @endphp
                        <div id="lastNinetyDays"></div>
                    @endif
                @endif
            @endif
        @endif
    @endforeach
    @if ($var != true)
        <h2 class="text-center mt-4">O repositório não possui commits nos últimos 90 dias</h2>
    @endif
    <div class="d-flex justify-content-center mt-5">
        <a href="{{route('projects')}}" class="btn btn-outline-secondary text-center">Voltar a página de repositórios.</a>
    </div>

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
    chart.container("lastNinetyDays");
    chart.xAxis().labels().rotation(-60);
    chart.xScale().mode('continuous');
    chart.xAxis().drawLastLabel(false);
    // initiate drawing the chart
    chart.draw();
</script>
@endpush