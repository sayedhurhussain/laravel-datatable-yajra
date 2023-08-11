<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
                    <table class="table table-bordered table-hover" style="width:100%">
                        <thead class="bg-light">
                            <tr>
                                <th>No:</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{ dd($users) }} --}}
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>