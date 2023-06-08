@extends('layout.app')

@section('title', 'Client Create')

@section('client_active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <a class="btn btn-warning" href="{{ url('client') }}" role="button">Back</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card" style="width: 100%;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Name : {{ $client->name }}</li>
                    <li class="list-group-item">Email : {{ $client->email ?? '-' }}</li>
                    <li class="list-group-item">Phone : {{ $client->phone ?? '-' }}</li>
                    <li class="list-group-item">Address : {{ $client->address ?? '-' }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
