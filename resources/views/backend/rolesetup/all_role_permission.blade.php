@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a class="btn btn-info" href="{{ route('add.role.permission') }}">All Roles Permission</a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Data Roles Permission</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Roles Name</th>
                                        <th>Permission</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($role as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @foreach ($item->permissions as $permission)
                                                    <span class="badge bg-danger">{{ $permission->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a class="btn btn-inverse-warning"
                                                    href="{{ route('edit.role.permission', $item->id) }}">Edit</a>
                                                <a class="btn btn-inverse-danger" id="delete"
                                                    href="{{ route('delete.role.permission', $item->id) }}">Delete</a>
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
