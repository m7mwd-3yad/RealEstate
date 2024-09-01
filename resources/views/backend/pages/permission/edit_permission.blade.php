@extends('admin.admin_dashboard')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Edit Permission</h6>

                        <form class="forms-sample" method="POST" action="{{ route('update.permission',$permission->id) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Permission Name</label>
                                <input type="text" value="{{ $permission->name }} " name="permission_name"
                                    class="form-control   @error('permission_name') is-invalid  @enderror "
                                    id="permission_name" placeholder="Type Name">
                                @error('permission_name')
                                    <span>
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Group Name</label>
                                <select name="group_name" class="form-select" id="exampleFormControlSelect1">
                                    <option value="" disabled selected>Select Group</option>
                                    <option value="{{ $permission->group_name }}"  selected>{{ $permission->group_name }}</option>
                                    <option value="Type">Property Type</option>
                                    <option value="Amenities">Amenities</option>
                                </select>
                                @error('group_name')
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
