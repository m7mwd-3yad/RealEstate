@extends('admin.admin_dashboard')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Roles</h6>

                        <form class="forms-sample" method="POST" action="{{ route('store.role') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Roles Name</label>
                                <input type="text" name="role_name"
                                    class="form-control   @error('role_name') is-invalid  @enderror "
                                    id="role_name" placeholder="Type Name">
                                @error('role_name')
                                    <span>
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>



                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
