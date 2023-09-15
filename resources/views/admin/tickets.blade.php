@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h3 class="card-title">Latest Transactions</h3>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="blocks-table txn-table">
                            <table class="table table-padded m-b-0">
                                <thead>
                                    <tr class="header">
                                        <th>
                                            <div>Buyer</div>
                                        </th>
                                        <th class="hidden-xs">
                                            <div class=" hidden-xs">From</div>
                                        </th>
                                        <th class="hidden-xs">
                                            <div class=" hidden-xs">To</div>
                                        </th>
                                        <th class="hidden-xs">
                                            <div class=" hidden-xs">Price</div>
                                        </th>
                                        <th class="hidden-xs">
                                            <div class=" hidden-xs">Currency</div>
                                        </th>
                                        <th class="hidden-xs">
                                            <div class=" hidden-xs">Type</div>
                                        </th>
                                        <th class="hidden-xs">
                                            <div class=" hidden-xs">Passengers</div>
                                        </th>
                                        <th>
                                            <div>Status</div>
                                        </th>
                                        <th>
                                            <div>Details</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tickets as $ticket)
                                    <tr>
                                        <td class=" hidden-xs">
                                            {{ $ticket->name }}
                                        </td>
                                        <td class=" hidden-xs">
                                            {{ $ticket->departure_airport_iata_outbound }}
                                        </td>
                                        <td class=" hidden-xs">
                                            {{ $ticket->arrival_airport_iata_outbound }}
                                        </td>
                                        <td class=" hidden-xs">
                                            {{ $ticket->price }}
                                        </td>
                                        <td class=" hidden-xs">
                                            {{ $ticket->currency }}
                                        </td>
                                        <td class=" hidden-xs">
                                            {{ $ticket->type }}
                                        </td>
                                        <td class=" hidden-xs">
                                            {{ $ticket->passengers()->count() }}
                                        </td>
                                        @if($ticket->status == 1)
                                        <td><i class="text-success fa fa-check"></i></td>
                                        @else
                                        <td><i class="text-danger fa fa-times"></i></td>
                                        @endif
                                        <td>
                                            <a href="{{ route('admin.ticket.show', $ticket->id) }}" class="btn btn-primary">Details</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-center p-t-20 p-b-20">
                        <ul class="list-inline font-12">
                            <li class="text-success"><i class="fa fa-check text-success"></i> Approved</li>
                            <li class="text-danger"><i class="fa fa-times text-danger"></i> Not Approved</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
