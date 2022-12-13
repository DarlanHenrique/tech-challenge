@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bem vindo ao sistema {{Auth::user()->name}}!</h1>
        <div class="content">
            <div>
                <h2 class="text-center">Veja aqui a série temporal de todos os seus commits</h2>
                @include('dashboard.commits')
                <div class="d-flex justify-content-center pt-3 pb-3">
                    <a href="{{route('projects')}}" class="btn btn-outline-secondary text-center">Ir para a página de repositórios.</a>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush