<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="styles.css" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <header class="header bg-dark text-white p-3">
        <h1 class="h3"></h1>
        <p class="category">
            <a class="btn btn-primary" href="" >Login</a>
            <a class="btn btn-warning" href="{{route('register')}}" >Register</a>
        </p>
    </header>

    <!-- Sidebar -->
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Settings</a>
                        </li>
                        <!-- Add more sidebar links as needed -->
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"></h1>
                </div>
                <!-- Add your main content here -->
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center">Registration Form</h3>
                                </div>
                                <div class="card-body">
                                    <form id="form" method="POST" action="{{route('updateData')}}">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" value="{{$user->name}}" id="name" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" value="{{$user->email}}" id="email" name="email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="country" class="form-label">Country</label>
                                            <select class="form-control" id="country" name="country">
                                                <option value="">Select Country</option>
                                                <option value="USA" @if($user->country === 'USA') selected @endif>USA</option>
                                                <option value="Canada" @if($user->country === 'Canada') selected @endif>Canada</option>
                                                <option value="UK" @if($user->country === 'UK') selected @endif>UK</option>
                                                <!-- Add more country options as needed -->
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="city" class="form-label">City</label>
                                            <select class="form-control" id="city" name="city">
                                                <option value="">Select City</option>

                                                <option value="New York" @if($user->city === 'New York') selected @endif>New York</option>
                                                <option value="Los Angeles" @if($user->city === 'Los Angeles') selected @endif>Los Angeles</option>
                                                <option value="London" @if($user->city === 'London') selected @endif>London</option>

                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="state" class="form-label">State</label>
                                            <select class="form-control" id="state" name="state">
                                                <option value="">Select State</option>

                                                <option value="New York" @if($user->state === 'New York') selected @endif>New York</option>
                                                <option value="California" @if($user->state === 'California') selected @endif>California</option>
                                                <option value="Texas" @if($user->state === 'Texas') selected @endif>Texas</option>


                                                <!-- Add more state options as needed -->
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="languages" class="form-label">Languages</label>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="english" name="languages[]" value="English">
                                                <label class="form-check-label" for="english">English</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="spanish" name="languages[]" value="Spanish">
                                                <label class="form-check-label" for="spanish">Spanish</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="french" name="languages[]" value="French">
                                                <label class="form-check-label" for="french">French</label>
                                            </div>
                                        </div>
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
      $('#form').validate({
        rules: {
          name: {
            required: true,
            minlength: 3
          },
          email: {
            required: true,
            email: true
          },
          country: {
            required: true,

          },
          city: {
            required: true,
          },
          state: {
            required: true,
          },

          gender: {
            required: true,
          },

          language: {
            required: true,
          },

        },
        messages: {
          name: {
            required: "Please enter your name",
            minlength: "Name must be at least 3 characters long"
          },
          email: {
            required: "Please enter your email",
            email: "Please enter a valid email address"
          },
          country: {
            required: "Please select country"
          },
          city: {
            required: "Please select city"
          },

          state: {
            required: "Please select state"
          },

          gender: {
            required: "Please select gender"
          },

          language: {
            required: "Please select language"

          },

        },
        submitHandler: function(form) {
          // Handle the form submission
          form.submit();
        }
      });
    });
  </script>
