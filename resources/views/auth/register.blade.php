@extends('layouts.site')

@section('content')
    <div class="container pt-5 mt-5 pb-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="modal-body">
                {{-- Login with GitHub --}}
                <div class="flex items-center justify-end mt-4">
                    <a class="btn" href="{{ url('auth/github') }}"
                        style="background: #313131; color: #ffffff; padding: 10px; width: 100%; text-align: center; display: block; border-radius:3px;">
                        Login with GitHub
                    </a>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection