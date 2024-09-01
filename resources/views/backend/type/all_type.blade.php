@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a class="btn btn-info" href="{{ route('add.type') }}">Add New Property</a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Data Table</h6>
                        <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official
                                DataTables Documentation </a>for a full list of instructions and other options.</p>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Type Name</th>
                                        <th>Type Icon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($types as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->type_name }}</td>
                                            <td>{{ $item->type_icon }}</td>
                                            <td>
                                                <a class="btn btn-inverse-warning"
                                                    href="{{ route('edit.type', $item->id) }}">Edit</a>
                                                &nbsp;
                                                <a class="btn btn-inverse-danger" id="delete"
                                                    href="{{ route('delete.type', $item->id) }}">Delete</a>
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

    </div>
@endsection
