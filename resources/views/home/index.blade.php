@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('home') }}"> Back to Home</a>
                </div>
                <div class="pull-left">
                    <h2>Home</h2>
                </div>
               
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Welcome to {{$category->name}}</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                <th>Your ID :  {{$category->email}}</th>
            </tr>
            <tr>
                <th>Your Balance: {{isset($deposit->deposit_amount) ? $deposit->deposit_amount: 0.00}} INR</th>
                
            </tr>
            
                   
            </tbody>
        </table>
    </div>
</body>
</html>

@endsection
