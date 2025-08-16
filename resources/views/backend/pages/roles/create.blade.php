@extends('backend.layout.app')
<style>
    /* .permissions-wrapper {
        border: 1px solid #ddd;
        border-radius: 6px;
        margin-bottom: 15px;
        padding: 10px;
        background: #f9f9f9;
    } */

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
                                <input type="text"
                                    class="form-control @error('name') is-invalid
                                @enderror"
                                    id="name" name="name" value="{{ old('name') }}"
                                    placeholder="Enter Your Role Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-check mb-0">
                            <input class="form-check-input" type="checkbox" id="selectAll" />
                            <label class="form-check-label" for="selectAll">Permission All</label>
                        </div>

                        <!-- Example child checkboxes -->
                        <hr>
                        @foreach ($permission_group as $group)
                            <h4 class="text-capitalize">{{ $group->group_name }}</h4>
                            <div class="permissions-wrapper row px-3 py-2">
                                <div class="col-sm-3">
                                    <div class="form-check-inline">
                                        <label class="form-check-label d-flex gap-1 text-capitalize">
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
                                        $permissions = \App\models\User::getpermissionsByGroupName($group->group_name);
                                    @endphp
                                    @foreach ($permissions as $permission)
                                        <div class="form-check-inline">
                                            <label class="form-check-label d-flex gap-1 text-capitalize"
                                                for="checkPermission{{ $permission->id }}">
                                                <input type="checkbox"
                                                    class="form-check-input permission-checkbox @error('permission') is-invalid
                                                    @enderror"
                                                    name="permission[{{ $permission->id }}]" value="{{ $permission->id }}"
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const selectAll = document.getElementById("selectAll");
            const groupCheckboxes = document.querySelectorAll(".group-checkbox");
            const permissionCheckboxes = document.querySelectorAll(".permission-checkbox");

            // 1. Permission All select/deselect
            selectAll.addEventListener("change", function() {
                const checked = this.checked;
                groupCheckboxes.forEach(g => g.checked = checked);
                permissionCheckboxes.forEach(p => p.checked = checked);
            });

            // 2. Group wise checkbox
            groupCheckboxes.forEach(group => {
                group.addEventListener("change", function() {
                    const wrapper = this.closest(".permissions-wrapper");
                    const permissions = wrapper.querySelectorAll(".permission-checkbox");
                    permissions.forEach(p => p.checked = this.checked);
                    checkSelectAll();
                });
            });

            // 3. Single permission checkbox
            permissionCheckboxes.forEach(permission => {
                permission.addEventListener("change", function() {
                    const wrapper = this.closest(".permissions-wrapper");
                    const group = wrapper.querySelector(".group-checkbox");
                    const permissions = wrapper.querySelectorAll(".permission-checkbox");

                    // যদি ওই গ্রুপের সব permission চেক থাকে তাহলে group চেক হবে
                    group.checked = [...permissions].every(p => p.checked);
                    checkSelectAll();
                });
            });

            // helper function → Permission All check করবে
            function checkSelectAll() {
                const allGroupsChecked = [...groupCheckboxes].every(g => g.checked);
                const allPermissionsChecked = [...permissionCheckboxes].every(p => p.checked);
                selectAll.checked = allGroupsChecked && allPermissionsChecked;
            }
        });
    </script>
@endpush
