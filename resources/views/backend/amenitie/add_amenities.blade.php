@extends('admin.admin_dashboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Amenities</h6>

                        <form class="forms-sample" method="POST" action="{{ route('store.amenities') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Amenities Name</label>
                                <input type="text" name="amenities_name"
                                    class="form-control   @error('amenities_name') is-invalid  @enderror " id="amenities_name"
                                    placeholder="Type Name">
                                @error('amenities_name')
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
