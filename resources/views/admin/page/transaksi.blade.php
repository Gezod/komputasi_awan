@extends('admin.layout.index')

@section('content')
    <div class="card rounded-full p-2">
        <div class="d-flex justify-content-between mb-3">
            <input type="text" wire:model="search" class="form-control w-25" placeholder="Search....">
            <div>
                <a href="{{ route('export.transactions.excel') }}" class="btn btn-success">
                    <i class="fa fa-file-excel"></i> Export Excel
                </a>
                <a href="{{ route('export.transactions.pdf') }}" class="btn btn-danger">
                    <i class="fa fa-file-pdf"></i> Export PDF
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>Id Transaksi</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nilai Rp</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $x => $item)
                        <tr class="align-middle">
                            <td>{{ ++$x }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->code_transaksi }}</td>
                            <td>{{ $item->nama_customer }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->total_harga }}</td>
                            <td>
                                <span
                                    class="align-middle {{ $item->status === 'Paid' ? 'badge bg-success text-white' : 'badge bg-danger text-white' }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination d-flex flex-row justify-content-between">
                <div class="showData">
                    Data ditampilkan {{ $data->count() }} dari {{ $data->total() }}
                </div>
                <div>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
