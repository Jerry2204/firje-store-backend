@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Transaksi Masuk</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Nomor</th>
                                        <th>Total Transaksi</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone_number }}</td>
                                        <td>{{ $item->transaction_total }}</td>
                                        <td>
                                            @if ($item->transaction_status == 'PENDING')
                                                <span class="badge badge-info">
                                            @elseif ($item->transaction_status == 'SUCCESS')
                                                <span class="badge badge-success">
                                            @elseif ($item->transaction_status == 'FAILED')
                                                <span class="badge badge-danger">
                                            @endif
                                                {{ $item->transaction_status }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($item->transaction_status == 'PENDING')
                                                <a href="{{ route('transaction.status', $item->id) }}?status=SUCCESS" class="btn btn-sm btn-success">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                <a href="{{ route('transaction.status', $item->id) }}?status=FAILED" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            @endif
                                            <a href="#myModal" data-remote="{{ route('transaction.show', $item->id) }}" data-toggle="modal" data-target="#myModal" data-title="Detail Transaksi {{ $item->uuid }}" class="btn btn-sm btn-info">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('transaction.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{ route('transaction.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center p-5">Transaction Not Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
