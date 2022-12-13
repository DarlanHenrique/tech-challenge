<div class="vh-100" id="allcommits"></div>

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

    chart.title('Série Temporal dos Commits');


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
    chart.container('allcommits');

    // draw the line chart
    chart.draw();

    });

    function getData() {
    return [
        @foreach ($datas as $data)
            @php
                $i += 1
            @endphp
            ["{{date('d/m/Y', strtotime($data->full_date))}}", {{ $i }}],
        @endforeach
    ];
    }
</script>
@endpush