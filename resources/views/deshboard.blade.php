<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
    </script>
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
                <table class="table" id="users-table">
                    <thead class="thead-dark">
                        <button id="delete-selected">Delete Selected</button>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">country</th>
                            <th scope="col">city</th>
                            <th scope="col">state</th>
                            <th scope="col">gender</th>
                            <th scope="col">action</th>

                            {{-- <th scope="col">language</th>
                            <th scope="col">image</th> --}}

                        </tr>
                    </thead>

                </table>


            </main>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
</script>

<script>
    $(document).ready(function() {
        var usersTable = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('deshboard') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'country', name: 'country' },
                { data: 'state', name: 'state' },
                { data: 'gender', name: 'gender' },
                { data: 'checkbox', orderable: false, searchable: false }

            ]
        });

        $('#select-all').click(function() {
            $('.user-checkbox').prop('checked', this.checked);
        });

        $('#delete-selected').click(function() {
            var selectedUserIds = [];
            $('.user-checkbox:checked').each(function() {
                selectedUserIds.push($(this).data('user-id'));
            });

            if (selectedUserIds.length === 0) {
                alert('Please select at least one user to delete.');
                return;
            }

            $.ajax({
                type: 'POST',
                url: '{{ route('delete-selected') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    user_ids: selectedUserIds
                },
                success: function(response) {
                    alert('Selected users deleted successfully.');
                    usersTable.ajax.reload(); // Refresh the DataTable
                },
                error: function(error) {
                    console.log(error);
                    alert('An error occurred while deleting users.');
                }
            });
        });
    });
</script>
