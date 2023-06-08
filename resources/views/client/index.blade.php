@extends('layout.app')

@section('title', 'Client')

@section('client_active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <a class="btn btn-success" href="{{ url('client/create') }}" >Create Client</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $key=>$item)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email ?? '-' }}</td>
                                        <td>{{ $item->phone ?? '-' }}</td>
                                        <td>{{ $item->address ?? '-' }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ url('client/'.$item->id) }}" >View</a>
                                            <a class="btn btn-warning" href="{{ url('client/'.$item->id.'/edit') }}" >Edit</a>
                                            <form method="post" action="{{ route('client.destroy', $item->id) }}" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Confirm delete?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
