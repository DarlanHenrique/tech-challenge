@extends('layouts.app')

@section('content')
    <div class="container pb-1">
        <h1 class="text-center"><u>Gráfico do repositório <b>{{$commit->project}}</b></u></h1>
    </div>
    <div style="height: 300px">
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
    </div>
    @if ($var != true)
        <h2 class="text-center mt-4">O repositório não possui commits nos últimos 90 dias</h2>
    @endif
    <div class="d-flex justify-content-center mt-5">
        <a href="{{route('projects')}}" class="btn btn-outline-secondary text-center">Voltar a página de repositórios.</a>
    </div>

@endsection

@push('scripts')

<script>

    anychart.onDocumentReady(function () {
  
      // create a data set on our data
      var dataSet = anychart.data.set(getData());
  
      // map data for the first series,
      // take x from the zero column and value from the first column
      var firstSeriesData = dataSet.mapAs({ x: 0, value: 1 });
  
      // create a line chart
      var chart = anychart.line();
  
      // turn on the line chart animation
      chart.animation(true);
  
      // configure the chart title text settings
      /* chart.title('Acceptance of same-sex relationships in the US over the last 2 decades'); */
  
      // set the y axis title
      chart.yAxis().title('Commits');
  
      // turn on the crosshair
      chart.crosshair().enabled(true).yLabel(false).yStroke(null);
  
      // create the first series with the mapped data
      var firstSeries = chart.line(firstSeriesData);
      firstSeries
        .name('commits')
        .stroke('3 #f49595')
        .tooltip()
        .format('Quantidade de commits : {%value}');
  
      // turn the legend on
      chart.legend().enabled(true);
  
      // set the container id for the line chart
      chart.container('lastNinetyDays');
  
      // draw the line chart
      chart.draw();
  
    });
  
    function getData() {
      return [
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
    }
  
  </script>
@endpush