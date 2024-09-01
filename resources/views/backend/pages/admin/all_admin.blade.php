{{-- resources/views/backend/pages/admin/all_admin.blade.php --}}
@extends('admin.admin_dashboard')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a class="btn btn-info" href="{{ route('add.admin') }}">Add Admin</a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Data Permission</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alladmin as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img class="wd-30 ht-30 rounded-circle"
                                                    src="{{ !empty($item->photo) ? url('upload/admin_images/' . $item->photo) : url('upload/no_image.jpg') }}"
                                                    alt="admin">
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>
                                                @foreach ($item->roles as $role)
                                                    <span class="badge badge-pill bg-danger">{{ $role->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a class="btn btn-inverse-warning" href="{{ route('edit.admin',$item->id) }}">Edit</a>
                                                <a class="btn btn-inverse-danger" id="delete" href="{{ route('delete.admin',$item->id) }}">Delete</a>
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
