<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        {{--codigo da fonte principal e secundaria--}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;900&family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">

        <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
        <script src="https://cdn.anychart.com/releases/v8/js/anychart-tag-cloud.min.js"></script>
        <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
        <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
        <script src="https://cdn.anychart.com/releases/v8/js/anychart-wordtree.min.js"></script>
        <script src="https://cdn.anychart.com/releases/v8/js/anychart-data-adapter.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.3.15/proj4.js"></script>
        <script src="https://cdn.anychart.com/releases/v8/js/anychart-map.min.js"></script>
        <script src="https://cdn.anychart.com/geodata/2.2.0/countries/brazil/brazil.js"></script>

        <script src="https://kit.fontawesome.com/fe02716ff2.js" crossorigin="anonymous"></script>
        {{--titulo e icone da aba no navegador--}}
        <title>Observatório do Consumidor</title>
        <link rel="icon" type="imagem/png" href="{{ asset('img/sidebar-logo-fechada.png') }}" />
        @stack('styles')

    </head>

    <body class="hold-transition sidebar-mini layout-fixed body-font" style="min-width:500px" id="body-site">
        <div class="wrapper">
            {{--os arquivos incluidos de navbar, sidebar e footer--}}
            @include('includes.sidebar')
            @include('includes.success')
            <div class="content-wrapper">
{{--                 @include('includes.floatingbar')
                    <div class="content-header">--}}
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-12 text-center">
                                <h1>
                                    {{--titulo da pagina é chamado atraves de um @/section no blade da propria pagina--}}
                                    @yield('title')
                                </h1>
                            </div>
                        </div>
                    </div>
                {{--</div>--}}
        <div class="content">
            <div id="app" class="container-fluid">
                {{--o conteudo da pagina é incluido atraves de um @/section na pagina--}}
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('includes.footer')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            var errors = {!! $errors !!}
            $(document).ready(function(){
                $(function () {
                    $('[data-toggle="popover"]').popover({
                        trigger: 'click',
                    });
                });
                $('[data-toggle="tooltip"]').tooltip()
            });
        </script>
        <script src="{{ asset('js/components/error.js')  }}"></script>
        <script src="{{ asset('js/components/responsiveSidebar.js')  }}"></script>
        {{-- <script src="{{ asset('js/components/ajaxWatch.js')  }}"></script
        <script>
            $(document).ajaxWatch('.ajaxWatch', true, function(){
                $(".ajaxWatch").closest('.deletable').slice(0).remove();
            });
        </script> --}}
        @stack('scripts')
    </body>

</html>
