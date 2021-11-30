@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="text-center">Create New Company</h1>
                <div class="card-header">Enter Company Details</div>

                <div class="card-body">
                    <form method="POST" action='/admin/companies'>
                        @csrf
                        <div class="form-group">
                            <label for="name">Company Name</label>
                            <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp">  
                            @error('name')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Company Email Address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
                            @error('email')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputwebsite">Company Website</label>
                            <input name="website" type="text" class="form-control" id="exampleInputwebsite">
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