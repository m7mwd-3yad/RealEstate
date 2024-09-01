@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">


        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Admin</h6>
                        <form class="forms-sample" method="POST" enctype="multipart/form-data"
                            action="{{ route('storee.admin') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">User Name</label>
                                <input type="text" name="username" class="form-control" id="name"
                                    placeholder="Name">
                                @error('username')
                                    <span>
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                                @error('name')
                                    <span>
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Email">
                                @error('email')
                                    <span>
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone"
                                    placeholder="Phone">
                                @error('phone')
                                    <span>
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" id="address"
                                    placeholder="Address">
                                @error('address')
                                    <span>
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password">
                                @error('password')
                                    <span>
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label"> Select Role </label>
                                <select name="roles" class="form-select" id="exampleFormControlSelect1">
                                    <option value="" disabled selected>Select Roles</option>
                                    @foreach ($roles as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endsection
