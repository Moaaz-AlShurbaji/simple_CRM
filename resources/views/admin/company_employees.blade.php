@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">  
            
            <div class="card">
                <div class="card-header">My CRM</div>

                <div class="card-body">
                    
                    <p>Employees Table</p>
            
                </div>
                
            </div>

            <div class="table-responsive-lg">
                <table class="table">
                        <thead>
                            <tr>
                            
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Company</th>
                            <th scope="col">Email</th>
                            <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->company->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td><a class="btn btn-success" href="{{ route('employee.company.edit', [$employee->id, $employee->company->id]) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('employee.delete', $employee->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection