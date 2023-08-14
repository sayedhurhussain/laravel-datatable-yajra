<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<div class="row">
    <div class="col-xl-12">
        <!-- Add users -->
        <div class="card card-default">
            <div class="card-header">
                <h2>Add User</h2>
            </div>
            <div class="card-body">
                <form id="create-user-form">
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
                    <div class="row">
                        <div class="col-md-6">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter Password" value="{{old('password')}}">
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div><br>
                    <div class="form-footer mt-6">
                        <button type="submit" class="btn btn-primary btn-pill" id="submit-btn">Submit</button>
                        <button type="button" class="btn btn-light btn-pill">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#submit-btn').click(function (event) {
            event.preventDefault();

            var formData = $('#create-user-form').serialize();

            $.ajax({
                type: 'POST',
                url: '{{ route("users.store") }}',
                data: formData,
                success: function (response) {
                    $('#message').text(response.message);
                    $('#create-user-form')[0].reset();

                    window.location.href = '{{ route("users.index") }}';
                },
                error: function (error) {
                    $('#message').text('Error creating user.');
                }
            });
        });
    });
</script>
