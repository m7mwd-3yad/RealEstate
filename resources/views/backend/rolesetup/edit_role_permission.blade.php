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

                        <h6 class="card-title">Updated Roles in Permission</h6>

                        <form class="forms-sample" method="POST" action="{{ route('update.role.permission',$role->id) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Roles Name</label>
                                <h6>{{ $role->name }}</h6>
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

                                        @php
                                            $permissions = App\Models\User::getpermissionByGroupName($item->group_name);
                                        @endphp

                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="checkDefault" {{
                                                App\models\User::RoleHasPermission($role,$permissions) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="checkDefault">
                                                {{ $item->group_name }}
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-9">
                                        @foreach ($permissions as $per)
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" name="permission[]"
                                                    id="checkDefault{{ $per->id }}" value="{{ $per->id }}" {{
                                                    $role->hasPermissionTo($per->name)?'checked' :'' }}>
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
