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
                    <li class="breadcrumb-item active" aria-current="page">Roles Table</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('roles.create') }}" class="btn btn-primary">Create Role</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Role and Permissions</h6>
    <hr>

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
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach ($role->Permissions as $permission)
                                            <span class="badge bg-primary">{{ $permission->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="d-flex gap-2">
                                        <a href="{{ route('roles.edit', $role->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- end-content -->
@endsection

<script>
    let table = new DataTable('#myTable', {
        "pageLength": 5,
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ]
    });
</script>

<script>
    // document.getElementById('showBtn').addEventListener('click', function () {
    //     document.getElementById('myDiv').style.display = 'block';
    // });

    document.getElementById('toggleBtn').addEventListener('click', function() {
        let div = document.getElementById('details');
        div.style.display = (div.style.display === 'none' || div.style.display === '') ? 'block' : 'none';
    });
</script>
