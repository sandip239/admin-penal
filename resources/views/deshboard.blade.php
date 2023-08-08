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
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <header class="header bg-dark text-white p-3">
        <h1 class="h3"></h1>
        <p class="category">
            <a class="btn btn-primary" href="">Login</a>
            <a class="btn btn-warning" href="{{ route('register') }}">Register</a>
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
                            <a class="nav-link" href="{{ route('userregister') }}">Users</a>
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
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"></h1>
                </div>
                <!-- Add your main content here -->
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">country</th>
                            <th scope="col">city</th>
                            <th scope="col">state</th>
                            <th scope="col">gender</th>
                            <th scope="col">language</th>
                            <th scope="col">image</th>

                        </tr>
                    </thead>
                    @foreach ($user as $users )


                    <tbody>
                        <tr>
                            <th scope="row">{{$users->id}}</th>
                            <td>{{$users->name}}</td>
                            <td>{{$users->email}}</td>
                            <td>{{$users->country}}</td>
                            <td>{{$users->city}}</td>
                            <td>{{$users->state}}</td>
                            <td>{{$users->gender}}</td>
                            <td>{{$users->language}}</td>
                            <td>{{$users->image}}</td>
                            <td><a href="edit/{{$users->id}}">edit <a></td>
                        </tr>

                    </tbody>

                    @endforeach
                </table>


            </main>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
