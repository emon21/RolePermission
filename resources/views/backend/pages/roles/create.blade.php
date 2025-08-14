@extends('backend.layout.app')
<style>
    .permissions-wrapper {
        border: 1px solid #ddd;
        border-radius: 6px;
        margin-bottom: 15px;
        padding: 10px;
        background: #f9f9f9;
    }

    .permissions-wrapper h6 {
        font-weight: bold;
    }
</style>
@section('content')
    <!-- start-content -->

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Tables</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create Role</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('roles.index') }}" class="btn btn-primary">All Roles</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="mb-4">Create Role</h5>
                    <form action="{{ route('roles.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="col-sm-3 col-form-label">Role Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('name') is-invalid
                                @enderror" id="name" name="name"
                                    value="{{ old('name') }}" placeholder="Enter Your Role Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <h4>Permissions :</h4>
                        <div class="form-check mb-0">
                            <input class="form-check-input" type="checkbox" id="selectAll" />
                            <label class="form-check-label" for="selectAll">All</label>
                        </div>
                        <hr>

                        <!-- Example child checkboxes -->
                        <div class="">
                            @foreach ($permission_group as $group)
                                <div class="permissions-wrapper row px-3 py-2">
                                    <div class="col-sm-3">
                                        <div class="form-check-inline">
                                            <label class="form-check-label d-flex gap-1">
                                                <input type="checkbox"
                                                    class="form-check-input group-checkbox @error('groups.' . $group->group_name) is-invalid
                                                    @enderror"
                                                    name="groups[]" value="{{ $group->group_name }}">
                                                {{ $group->group_name }}
                                            </label>
                                            @error('groups.' . $group->group_name)
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-9">
                                        @php
                                            $permissions = \App\models\User::getpermissionsByGroupName(
                                                $group->group_name,
                                            );
                                        @endphp
                                        @foreach ($permissions as $permission)
                                            <div class="form-check-inline">
                                                <label class="form-check-label d-flex gap-1"
                                                    for="checkPermission{{ $permission->id }}">
                                                    <input type="checkbox" class="form-check-input permission-checkbox @error('permission') is-invalid
                                                    @enderror"
                                                        name="permission[{{ $permission->id }}]"
                                                        value="{{ $permission->id }}"
                                                        id="checkPermission{{ $permission->id }}"> {{ $permission->name }}
                                                </label>
                                                @error('permission')
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-4">Create Role</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end-content -->
@endsection
@push('script')
    {{-- <script>
        // const selectAll = document.getElementById('selectAll');

        // const checkboxes = document.querySelectorAll('.child-checkbox');

        // // When "Select All" is clicked
        // selectAll.addEventListener('change', function() {
        //     checkboxes.forEach(cb => cb.checked = this.checked);
        // });

        // // If all are selected individually, auto-check "Select All"
        // checkboxes.forEach(cb => {
        //     cb.addEventListener('change', function() {
        //         selectAll.checked = [checkboxes].every(cb => cb.checked);
        //     });
        // });


        // Get the select all checkbox
        const selectAll = document.getElementById('selectAll');

        // Get all child checkboxes
        const checkboxes = document.querySelectorAll('.child-checkbox');

        // When selectAll is clicked
        selectAll.addEventListener('change', function() {
            checkboxes.forEach(cb => {
                cb.checked = this.checked;
            });
        });

        // If all child checkboxes are checked manually, auto-check "Select All"
        checkboxes.forEach(cb => {
            cb.addEventListener('change', function() {
                const allChecked = Array.from(checkboxes).every(item => item.checked);
                selectAll.checked = allChecked;
            });
        });
    </script> --}}


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckbox = document.getElementById('selectAll');

            // Select All
            selectAllCheckbox.addEventListener('change', function() {
                document.querySelectorAll('.form-check-input').forEach(cb => {
                    cb.checked = selectAllCheckbox.checked;
                });
            });

            // Group wise select
            document.querySelectorAll('.group-checkbox').forEach(groupCheckbox => {
                groupCheckbox.addEventListener('change', function() {
                    let groupDiv = groupCheckbox.closest('.permissions-wrapper');
                    let permissionCheckboxes = groupDiv.querySelectorAll('.permission-checkbox');
                    permissionCheckboxes.forEach(cb => cb.checked = groupCheckbox.checked);
                    checkSelectAll();
                });
            });

            // Single permission change
            document.querySelectorAll('.permission-checkbox').forEach(permissionCheckbox => {
                permissionCheckbox.addEventListener('change', function() {
                    let groupDiv = permissionCheckbox.closest('.permissions-wrapper');
                    let groupCheckbox = groupDiv.querySelector('.group-checkbox');
                    let permissionCheckboxes = groupDiv.querySelectorAll('.permission-checkbox');
                    groupCheckbox.checked = Array.from(permissionCheckboxes).every(cb => cb
                        .checked);
                    checkSelectAll();
                });
            });

            // Check if all are selected for "Select All"
            function checkSelectAll() {
                const allCheckboxes = document.querySelectorAll('.form-check-input:not(#selectAll)');
                selectAllCheckbox.checked = Array.from(allCheckboxes).every(cb => cb.checked);
            }
        });
    </script>
@endpush
