@extends('admin.admin_dashboard')

@section('admin')
    <style type="text/css">
        .form-check-label {
            text-transform: capitalize;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Roles in Permission</h6>

                        <form class="forms-sample" method="POST" action="{{ route('role.pemission.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Roles Name</label>
                                <select name="role_id" class="form-select" id="exampleFormControlSelect1">
                                    <option value="" disabled selected>Select Roles</option>
                                    @foreach ($role as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="checkDefaultmain">
                                <label class="form-check-label" for="checkDefaultmain">
                                    Permission All
                                </label>
                            </div>
                            <hr>
                            @foreach ($permission_group as $item)
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="checkDefault">
                                            <label class="form-check-label" for="checkDefault">
                                                {{ $item->group_name }}
                                            </label>
                                        </div>
                                    </div>

                                    @php
                                        $permissions = App\Models\User::getpermissionByGroupName($item->group_name);
                                    @endphp


                                    <div class="col-9">
                                        @foreach ($permissions as $per)
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" name="permission[]"
                                                    id="checkDefault{{ $per->id }}" value="{{ $per->id }}">
                                                <label class="form-check-label" for="checkDefault{{ $per->id }}">
                                                    {{ $per->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                        <br>
                                    </div>

                                </div>
                            @endforeach


                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('#checkDefaultmain').click(function() {
            if ($(this).is(':checked')) {
                $('input[type=checkbox]').prop('checked', true);
            } else {
                $('input[type=checkbox]').prop('checked', false);
            }

        });
    </script>
@endsection
