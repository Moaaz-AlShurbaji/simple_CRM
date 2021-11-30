@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My CRM</div>

                <div class="card-body">
                    
                    <p>Welcome User</p>
                    <a class='btn btn-success' href="/guest/companies">View Companies</a>
                    <a class="btn btn-success" href="/guest/employees">View All Employees</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection