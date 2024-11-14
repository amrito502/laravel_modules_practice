@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    <a href="{{ url('report/report1/'.$item->id) }}" class="btn btn-sm btn-success">Download PDF</a>
                                    <a href="{{ url('report/report2') }}" class="btn btn-sm btn-primary">Print</a>
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