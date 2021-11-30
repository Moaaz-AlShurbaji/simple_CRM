@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif  
            
            <div class="card">
                <div class="card-header">My CRM</div>

                <div class="card-body">
                    
                    <p>Welcome {{ Auth::user()->name }}</p>
                    
                </div>
                
            </div>

            <div class="table-responsive-lg">
                <table class="table">
                        <thead>
                            <tr>
                            
                            <th scope="col">Company Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Website</th>
                            
                            
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->website }}</td>
                                  
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection