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
                            action="{{ route('update.admin', $user->id) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">User Name</label>
                                <input type="text" value="{{ $user->username }}" name="username" class="form-control"
                                    id="name" placeholder="Name">
                                @error('username')
                                    <span>
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" value="{{ $user->name }}" name="name" class="form-control"
                                    id="name" placeholder="Name">
                                @error('name')
                                    <span>
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                    id="email" placeholder="Email">
                                @error('email')
                                    <span>
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" value="{{ $user->phone }}" name="phone" class="form-control"
                                    id="phone" placeholder="Phone">
                                @error('phone')
                                    <span>
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" value="{{ $user->address }}" name="address" class="form-control"
                                    id="address" placeholder="Address">
                                @error('address')
                                    <span>
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" value="{{ $user->password }}" name="password" class="form-control"
                                    id="password" placeholder="Password">
                                @error('password')
                                    <span>
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label"> Select Role </label>
                                <select name="roles" class="form-select" id="exampleFormControlSelect1">

                                    <option value="" selected="" disabled>Select Roles</option>
                                    @foreach ($roles as $item)
                                        <option  value="{{ $item->id }}" {{ $user->hasRole($item->name)
                                            ? 'selected' : '' }}>{{ $item->name }}</option>
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
@endsection
