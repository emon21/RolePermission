@extends('backend.layout.app')
<style>
    .collapse-box {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.5s ease, opacity 0.5s ease;
        /* transition: all ease-in-out 0.5s; */
        opacity: 0;
    }

    .collapse-box.show {
        max-height: 300px;
        /* adjust depending on content */
        opacity: 1;
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
                    <li class="breadcrumb-item active" aria-current="page">Roles Table</li>
                </ol>
            </nav>
        </div>
        @can('role-create')
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('roles.create') }}" class="btn btn-primary">Create Role</a>
                </div>
            </div>
        @endcan
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Role and Permissions</h6>

    <hr>
    @can('role-menu')
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                        <table id="myTable" class="display table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Permissions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-capitalize">{{ $role->name }}</td>
                                        <td>

                                            <!-- Icon -->
                                            {{-- <p class="text-success text-capitalize">See Permission</p> --}}
                                            <button type="button"
                                                class="toggleBtn bg-primary text-white border-0 rounded py-1 px-2"
                                                data-target="data-{{ $role->id }}">
                                                <i class="fas fa-eye show-icon"></i>
                                                <i class="fas fa-eye-slash hide-icon" style="display:none;"></i>
                                            </button>

                                            <!-- Hidden Data with animation -->
                                            <div id="data-{{ $role->id }}" class="toggleData collapse-box">
                                                @foreach ($role->Permissions as $permission)
                                                    <span
                                                        class="badge bg-primary text-capitalize my-1 mb-1">{{ $permission->name }}</span>
                                                @endforeach
                                            </div>

                                        </td>
                                        <td class="d-flex gap-2">
                                            @can('role-edit')
                                                <a href="{{ route('roles.edit', $role->id) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            @endcan

                                            @can('role-delete')
                                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endcan
    <!-- end-content -->
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll(".toggleBtn");

        buttons.forEach(button => {
            button.addEventListener("click", function() {
                const targetId = this.getAttribute("data-target");
                const target = document.getElementById(targetId);

                const showIcon = this.querySelector(".show-icon");
                const hideIcon = this.querySelector(".hide-icon");

                if (target.classList.contains("show")) {
                    target.classList.remove("show");

                    // icon change
                    showIcon.style.display = "inline";
                    hideIcon.style.display = "none";

                    // button color reset
                    this.classList.remove("bg-danger");
                    this.classList.add("bg-primary");
                } else {
                    target.classList.add("show");

                    // icon change
                    showIcon.style.display = "none";
                    hideIcon.style.display = "inline";

                    // button color change
                    this.classList.remove("bg-primary");
                    this.classList.add("bg-danger");
                }
            });
        });
    });

    // DataTable
    let table = new DataTable('#myTable', {
        "pageLength": 5,
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ]
    });
</script>
