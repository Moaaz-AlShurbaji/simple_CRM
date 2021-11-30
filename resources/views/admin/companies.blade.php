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
                    
                    <p>Welcome Admin</p>
                    <a class='btn btn-success' href="/admin/company/create">Add New Company</a>
                    <hr>
                    <form class="form-inline my-2 my-lg-0">
                        <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search for Company" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
                
            </div>

            <div class="table-responsive-lg">
                <table class="table">
                        <thead>
                            <tr>
                            
                            <th scope="col">Company Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Website</th>
                            <th scope="col">Operations</th>
                            <th scope="col">Add Employees</th>
                            <th scope="col">View Employees</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->website }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('company.edit', $company->id) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('company.delete', $company->id) }}">Delete</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('employee.company.create', $company->id) }}">Add</a>
                                    </td>
                                    <td> <a class="btn btn-primary" href="{{ route('company.employees', $company->id ) }}">View</a> </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection