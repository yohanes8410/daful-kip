@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Silahkan kembali ke halaman login.') }}
                        <a href="/dashboard" target="_blank" style="color: #0F0529">Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
