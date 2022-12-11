@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Olá Mundo</h1>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush