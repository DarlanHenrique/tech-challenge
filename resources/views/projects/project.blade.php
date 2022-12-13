@extends('layouts.app')

@section('content')
    <div class="container pb-1">
        <h1 class="text-center"><u>Gráfico do repositório <b>{{$commit->project}}</b></u></h1>
    </div>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item pb-3">
            <h2 class="accordion-header" id="flush-headingMidiasGeral">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseMidiasGeral" aria-expanded="false" aria-controls="flush-collapseMidiasGeral">
                    Gráfico da série temporal dos commits
                </button>
            </h2>
            <div id="flush-collapseMidiasGeral" class="accordion-collapse collapse" aria-labelledby="flush-headingMidiasGeral" data-bs-parent="#accordionFlushExample">
                <div class="vh-100" id="temporal_serie"></div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingMidiasNinety">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseMidiasNinety" aria-expanded="false" aria-controls="flush-collapseMidiasNinety">
                    Gráfico da série temporal dos commits nos últimos 90 dias
                </button>
                <hr class="dot-line">
            </h2>
            <div id="flush-collapseMidiasNinety" class="accordion-collapse collapse" aria-labelledby="flush-headingMidiasNinety" data-bs-parent="#accordionFlushExample">
                @foreach ($datas as $data)
                    @if ($data->github_datas_id == $commit->id)
                        @if($data->year >= $year)
                            @if ($data->month >= $month)
                                @if ($data->day <= $day)
                                    @php
                                        $var = true;
                                    @endphp
                                    <div class="vh-100" id="lastNinetyDays"></div>
                                @endif
                            @endif
                        @endif
                    @endif
                @endforeach
                @if ($var != true)
                    <h2 class="text-center p-4">O repositório não possui commits nos últimos 90 dias</h2>
                @endif
            </div>
        </div>
    </div>
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
      .stroke('3 #c49595')
      .tooltip()
      .format('Quantidade de commits : {%value}');

    // turn the legend on
    chart.legend().enabled(true);

    // set the container id for the line chart
    chart.container('temporal_serie');

    // draw the line chart
    chart.draw();

  });

  function getData() {
    return [
      @foreach ($datas as $data)
          @if ($data->github_datas_id == $commit->id)
                @php
                    $i += 1
                @endphp
                ["{{date('d/m/Y', strtotime($data->full_date))}}", {{ $i }}],
          @endif
      @endforeach
    ];
  }

</script>
@endpush