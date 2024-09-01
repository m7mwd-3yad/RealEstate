@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Edit Amenities</h6>

                        <form class="forms-sample" method="POST" action="{{ route('update.amenities',$allAmenities->id) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Amenities Name</label>
                                <input type="text" value="{{ $allAmenities->amenitis_name }}" name="amenities_name"
                                    class="form-control    @error('amenities_name') is-invalid  @enderror " id="amenities_name"
                                    placeholder="Amenities Name">
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
