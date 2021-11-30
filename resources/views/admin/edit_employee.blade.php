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
                <h1 class="text-center">Edit Employee</h1>
                <div class="card-header text-danger">You are editing employee for {{ $company->name }}</div>

                <div class="card-body">
                    <form method="POST" action='{{ route("employee.company.edit", [$employee->id,$company->id]) }}'>
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="name">Employee First Name</label>
                            <input name="first_name" type="text" class="form-control" id="name" aria-describedby="nameHelp" value="{{ $employee->first_name }}">  
                            @error('first_name')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Employee Last Name</label>
                            <input name="last_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $employee->last_name }}"> 
                            @error('last_name')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputwebsite">Employee Email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputwebsite" value="{{ $employee->email }}">
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