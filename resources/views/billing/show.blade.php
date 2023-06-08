@extends('layout.app')

@section('title', 'Billing Create')

@section('billing_active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <a class="btn btn-warning" href="{{ url('billing') }}" role="button">Back</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card" style="width: 100%;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Amount : {{ $billing->amount }}</li>
                    <li class="list-group-item">Due Date : {{ $billing->due_date }}</li>
                    <li class="list-group-item">Client Name : {{ $billing->client->name }}</li>
                    <li class="list-group-item">Description : {{ $billing->description ?? '-' }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
