@extends('layout.app')

@section('title', 'Billing')

@section('billing_active', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <a class="btn btn-success" href="{{ url('billing/create') }}" >Create Billing</a>
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
                                    <th scope="col">Amount</th>
                                    <th scope="col">Due Date</th>
                                    <th scope="col">Client Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($billings as $key=>$item)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->due_date }}</td>
                                        <td>{{ $item->client->name }}</td>
                                        <td>{{ $item->description ?? '-' }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ url('billing/'.$item->id) }}" >View</a>
                                            <a class="btn btn-warning" href="{{ url('billing/'.$item->id.'/edit') }}" >Edit</a>
                                            <form method="post" action="{{ route('billing.destroy', $item->id) }}" style="display: inline;">
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
