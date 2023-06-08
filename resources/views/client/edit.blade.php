@extends('layout.app')

@section('title', 'Client Update')

@section('client_active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <a class="btn btn-warning" href="{{ url('client') }}" role="button">Back</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('client/'.$client->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $client->name }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $client->email }}">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $client->phone }}">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" rows="3" name="address">{{ $client->address }}</textarea>
                        </div>
                        <button class="btn btn-warning">Update</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\ClientRequest') !!}
@endsection
