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
                <h1 class="text-center">Edit Company</h1>
                <div class="card-header">Edit Company Details</div>

                <div class="card-body">
                    <form method="POST" action='{{ route("company.edit","$company->id") }}'>
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="name">Company Name</label>
                            <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" value="{{ $company->name }}">  
                            @error('name')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Company Email Address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $company->email }}"> 
                            @error('email')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputwebsite">Company Website</label>
                            <input name="website" type="text" class="form-control" id="exampleInputwebsite" value="{{ $company->website }}">
                            @error('website')
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