@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

    

            <div class="card">
                <div class="card-header">My CRM</div>

                <div class="card-body">
                    
                    <p>Welcome Admin</p>
                    <a class='btn btn-success' href="/admin/company/create">Add New Company</a>
                    <a class='btn btn-success' href="/admin/companies">View Companies</a>
                    <a class="btn btn-success" href="/admin/employees">View All Employees</a>
                    
                    
                </div>
            </div>

            
        </div>
    </div>
</div>
@endsection