@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="text-center">Add New Employee</h1>
                <div class="card-header text-danger">You are adding employee for {{ $company->name }}</div>

                <div class="card-body">
                    <form method="POST" action='{{ route("employee.company.create", $company->id) }}'>
                        @csrf
                        <div class="form-group">
                            <label for="name">Employee First Name</label>
                            <input name="first_name" type="text" class="form-control" id="name" aria-describedby="nameHelp">  
                            @error('first_name')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Employee Last Name</label>
                            <input name="last_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
                            @error('last_name')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputwebsite">Employee Email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputwebsite">
                            @error('email')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection