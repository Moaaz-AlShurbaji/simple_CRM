@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Welcome {{ Auth::user()->name }}</p>
                    {{ __('You are logged in!') }}
                    @if(Auth::user()->is_admin == 1)
                        <br>
                        <a class="btn btn-primary" href="/admin/index">Go to Main Page</a>
                    @else
                        <br>
                        <a class="btn btn-primary" href="/guest/index">Main Page</a>    
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
