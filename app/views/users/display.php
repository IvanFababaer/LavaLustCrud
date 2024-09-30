<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Read</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e6d2b5; /* Lively light brown background */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }

        .table-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 100%;
            margin: 40px auto;
        }

        .search-create-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        h4 {
            color: #7f5539; /* Warm, rich brown */
            font-weight: bold;
            font-size: 2.2em;
            text-align: center;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        table th {
            background-color: #6b4226; /* Deep brown for header */
            color: #fff;
            font-weight: bold;
            text-align: center;
            font-size: 1.1em;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); /* Subtle shadow for font */
        }

        table tbody tr:nth-child(odd) {
            background-color: #f5f5f5;
        }

        table tbody tr:hover {
            background-color: #e9ecef;
        }

        table td {
            text-align: center;
            font-size: 1rem;
            font-weight: 500;
        }

        .btn-primary {
            background-color: #b75e40; /* Vibrant burnt orange-brown for primary button */
            border: none;
            font-size: 1.1rem;
            font-weight: bold;
            padding: 10px 20px;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #9c452b;
            transform: scale(1.05);
        }

        .btn-warning {
            background-color: #f0ad4e;
            border: none;
            font-size: 1.1rem;
            font-weight: bold;
        }

        .btn-warning:hover {
            background-color: #ec971f;
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: #d9534f;
            border: none;
            font-size: 1.1rem;
            font-weight: bold;
        }

        .btn-danger:hover {
            background-color: #c9302c;
            transform: scale(1.05);
        }

        /* Hover effect for buttons */
        a.btn {
            margin: 0 5px;
        }

        /* Table container hover effect */
        .table-container:hover {
            transform: scale(1.02);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.25);
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="table-container">
            <h4><?= $name; ?></h4>

            <div class="search-create-row">
                <a href="/users/create" class="btn btn-primary">Create New Data</a>
            </div>

            <table id="myTable" class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($prod)): ?>
                        <tr>
                            <td colspan="7" class="text-center">No users found.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($prod as $p): ?>
                            <tr>
                                <td><?= $p['id']; ?></td>
                                <td><?= $p['idf_last_name']; ?></td>
                                <td><?= $p['idf_first_name']; ?></td>
                                <td><?= $p['idf_email']; ?></td>
                                <td><?= $p['idf_gender']; ?></td>
                                <td><?= $p['idf_address']; ?></td>
                                <td>
                                    <a href="/users/update/<?= $p['id']; ?>" class="btn btn-warning btn-sm">Update</a>
                                    <a href="/users/delete/<?= $p['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#myTable').DataTable({
                "pageLength": 5, 
                "lengthMenu": [5, 10, 25, 50],
                "order": [[0, 'asc']], /* Orders by ID by default */
            });
        });
    </script>
</body>

</html>
