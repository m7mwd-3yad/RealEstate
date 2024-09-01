@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Property Type</h6>

                        <form class="forms-sample" method="POST" action="{{ route('store.type') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Type Name</label>
                                <input type="text" name="type_name"
                                    class="form-control   @error('type_name') is-invalid  @enderror " id="type_name"
                                    placeholder="Type Name">
                                @error('type_name')
                                    <span>
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Type Icon</label>
                                <input type="text" name="type_icon"
                                    class="form-control   @error('type_icon') is-invalid  @enderror " id="type_icon"
                                    placeholder="Type Name">
                                @error('type_icon')
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
