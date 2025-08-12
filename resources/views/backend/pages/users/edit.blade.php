@extends('backend.layout.app')
@section('content')
    <!-- start-content -->
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Tables</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('users.index') }}" class="btn btn-primary">All Users</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="mb-4">Create User</h5>
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}" placeholder="Enter Your Name">
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control " id="email" name="email"
                                    value="{{ $user->email }}" placeholder="Enter your email">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="role" class="col-sm-3 col-form-label">Select Role</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="roles[]" multiple>
                                    <option ="" disabled>Select Roles</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                            {{ in_array($role->name, $userRole) ? 'selected' : '' }}>{{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-4">Update User</button>
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
