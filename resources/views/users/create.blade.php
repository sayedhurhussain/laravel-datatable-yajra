<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<div class="row">
    <div class="col-xl-12">
        <!-- Add users -->
        <div class="card card-default">
            <div class="card-header">
                <h2>Add User</h2>
            </div>
            <div class="card-body">
                {{-- 1st Method to save data --}}
                <form method="POST" action="{{ url('users') }}" enctype="multipart/form-data">

                {{-- 2nd Method to save data --}}
                {{-- <form method="POST" action=/users> --}}

                {{-- 3rd Method to save data and also change the route in web --}}
                {{-- <form method="POST" action="{{ route('users') }}"> --}}
                @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Name" value="{{old('name')}}">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Email"  value="{{old('email')}}">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div><br>
                    <div class="form-footer mt-6">
                        <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                        <button type="submit" class="btn btn-light btn-pill">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>