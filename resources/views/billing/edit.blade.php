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
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('billing/'.$billing->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control" name="amount" value="{{ $billing->amount }}">
                        </div>
                        <div class="form-group">
                            <label>Due Date</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input name="due_date" type="text" class="form-control datetimepicker-input"
                                    data-target="#reservationdate" value="{{ Carbon\Carbon::parse($billing->due_date)->format('Y/m/d') }}" />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Client</label>
                            <select name="client_id" class="form-control">
                                @foreach ($clients as $c)
                                    <option value="{{ $c->id }}"
                                        @if ($c->id == $billing->client_id)
                                            selected
                                        @endif >
                                        {{ $c->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3" name="description">{{ $billing->description }}</textarea>
                        </div>
                        <button class="btn btn-success">Update</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\BillingRequest') !!}
    <script>
        //date picker
        $('#reservationdate').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    </script>
@endsection
