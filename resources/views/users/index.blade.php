<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
{{-- datatables css link --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">


<div class="row">
    <div class="col-12">
            @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            @endif
        <div class="card card-default">
            <div class="card-header">
                <h2>Users</h2>
                <a class="btn btn-primary btn-rounded btn-md" href="{{ url('/users/create') }}">
                    <i class="mdi mdi-plus mr-1"></i> Add User
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-hover" style="width:100%">
                        <thead class="bg-light">
                            <tr>
                                <th>No:</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Intro</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            Paginate:   true,
            lengthMenu: [[10, 25, 50, 100, 500, 20000], [10, 25, 50, 100, 500, "All"]],
            autoWidth:  true,
            responsive: true,
            searching:  true,
            ajax: "{{ route('users.get') }}",

            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'intro', name: 'intro'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ]
        });
    });
</script>

