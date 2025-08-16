@extends('backend.layout.app')
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
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="mb-4">Create Role</h5>
                    <form action="{{ route('roles.update', $role) }}" method="post">
                        @csrf
                        @method('PUT')
                        {{-- <input type="hidden" value="{{ $role->id }}" name="id"> --}}
                        <div class="form-group mb-3">
                            <label for="name" class="col-sm-3 col-form-label">Role Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $role->name) }}" placeholder="Enter Your Role Name">
                            </div>
                        </div>
                        <h4>Permissions :</h4>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="selectAll">
                            <label class="form-check-label" for="selectAll">Select All</label>
                        </div>

                        <div class="">
                            @foreach ($permission_group as $group)
                                <div class="permissions-wrapper row px-3 py-2">
                                    <div class="col-sm-3">
                                        <div class="form-check-inline">
                                            <label class="form-check-label d-flex gap-1">
                                                <input type="checkbox"
                                                    class="form-check-input group-checkbox @error('groups') is-invalid
                                                    @enderror"
                                                    name="groups[]" value="{{ $group->group_name }}"
                                                    {{-- {{ ($group->group_name == $role->name) ? 'checked' : '' }} --}}
                                                    {{ ($group->group_name == $role->name) ? 'checked' : '' }}>
                                                {{ $group->group_name }}
                                            </label>
                                            @error('groups' . $group->group_name)
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
                                                    <input type="checkbox"
                                                        class="form-check-input permission-checkbox @error('permission') is-invalid
                                                    @enderror"
                                                        name="permission[{{ $permission->id }}]"
                                                        value="{{ $permission->id }}"
                                                        id="checkPermission{{ $permission->id }}"
                                                        {{ in_array($permission->id, $rolePermission) ? 'checked' : '' }}>
                                                    {{ $permission->name }}
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
                                    <button type="submit" class="btn btn-primary px-4">Update</button>
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
