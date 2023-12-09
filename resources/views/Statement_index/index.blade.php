@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Statement of account</title>
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
                    <h2>Category</h2>
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
                    <th>S.No</th>
                    <th>Datetime</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Transfer as $key=>$categorys)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $categorys->created_at }}</td>
                        <td>{{ $categorys->transfer_amount }}</td>
                        <td>{{ $categorys->type }}</td>
                        <td>{{ $categorys->details }}</td>

                        

                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $Transfer->links() !!}
    </div>
</body>
</html>

@endsection
