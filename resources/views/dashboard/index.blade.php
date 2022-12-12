@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bem vindo ao sistema {{Auth::user()->name}}!</h1>
        
        <div class="row">
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush