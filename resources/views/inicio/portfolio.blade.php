<!-- Portfolio Grid-->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Exemplo</h2>
            <h3 class="section-subheading text-muted">Exemplo do Gráfico que pode ser encontrado no sistema</h3>
        </div>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-8 col-sm-12 mb-4">
                <!-- Portfolio item 1-->
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{asset('storage/img/portfolio/1.jpg')}}" alt="..." />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Gráfico</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Modals-->
<!-- Portfolio item 1 modal popup-->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="{{asset('storage/img/close-icon.svg')}}" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">Série Temporal</h2>
                            <p class="item-intro text-muted">Commits nos últimos 90 dias</p>
                            <div class="vh-100" id="example"></div>
                            <p>Esse é um exemplo de grráfco que pode ser encontrado em nosso site. Nele vemos as quantidade de commits que foram dado!</p>
                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                <i class="fas fa-xmark me-1"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>

    anychart.onDocumentReady(function () {
      // create data set on our data,also we can pud data directly to series
      var dataSet = anychart.data.set([
        ['Jan', 75],
        ['Fev', 56],
        ['Mar', 67],
        ['Abr', 42],
        ['Mai', 17],
        ['Jun', 12],
        ['Jul', 9],
        ['Ago', 23],
        ['Set', 47],
        ['Out', 58],
        ['Nov', 69],
        ['Dez', 71]
      ]);

      // map data for the first series,take value from first column of data set
      var firstSeriesData = dataSet.mapAs({ x: 0, value: 1 });

      // create line chart
      var chart = anychart.line();

      // turn on chart animation
      chart.animation(true);

      // turn on the crosshair and tune it
      chart
        .crosshair()
        .enabled(true)
        .yLabel(false)
        .xLabel(false)
        .yStroke(null);

      // set chart padding
      chart.padding([10, 20, 5, 20]);

      // set chart title text settings
      chart.title('Commits durante o ano');

      // set yAxis title
      chart.yAxis().title('Commits' );

      // temp variable to store series instance
      var series;

      // setup first series
      series = chart.line(firstSeriesData);
      series.name('Commits durante o ano').stroke('#000000').size(4);
      series.hovered().markers(true);

      // interactivity and tooltip settings
      chart.interactivity().hoverMode('by-x');

      chart
        .tooltip()
        .displayMode('separated')
        .positionMode('point')
        .separator(false)
        .position('right')
        .anchor('left-bottom')
        .offsetX(2)
        .offsetY(5)
        .title(false)
        .format('{%Value} commits');

      // turn the legend on
      chart.legend(true);

      // set container id for the chart
      chart.container('example');
      // initiate chart drawing
      chart.draw();
    });
  
</script>
@endpush