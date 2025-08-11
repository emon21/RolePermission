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
                    <form action="{{ route('roles.update',$role) }}" method="post">
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
                        <div class="form-group mb-3">
                            <label class="col-sm-3 col-form-label">Permissions</label>
                            <div class="col-sm-9 form-check">

                                @foreach ($permissions as $permission)
                                    {{-- <label class="form-check-label mt-1 d-flex gap-1">
                                    <input type="checkbox" name="permission[{{$permission->id}}]" value="{{$permission->id}}" class="form-check-input" {{ ($role->id == $permission->id) ? 'checked' : '' }}>
                                    {{ $permission->name }}
                                     {{  ($role->id == $permission->id) ? 'checked' : '' }}
                                </label> --}}

                                    {{-- {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} --}}


                                    <div class="form-check">
                                        <label class="form-check-label">{{ $permission->name }}
                                            <input class="form-check-input" type="checkbox" id="check1"
                                                name="permission[{{ $permission->id }}]" value="{{ $permission->id }}"
                                                {{ in_array($permission->id, $rolePermission) ? 'checked' : '' }}>
                                        </label>
                                    </div>
                                @endforeach


                            </div>
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
