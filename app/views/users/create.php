<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e6d2b5; /* Lively light brown background */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Modern and clean font */
        }
        .form-container {
            background-color: #fff; /* White background for the form */
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Stronger shadow effect */
            max-width: 800px;
            margin: 40px auto;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .form-container:hover {
            transform: scale(1.02); /* Subtle scaling effect */
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.25); /* Increase shadow on hover */
        }
        .form-control:focus {
            border-color: #b75e40; /* Light brown for focus */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        h2 {
            color: #7f5539; /* Warm, rich brown for heading */
            text-align: center;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); /* Slight text shadow for emphasis */
        }
        label {
            color: #6b4226; /* Deep brown for labels */
            font-weight: 600;
            font-size: 1.1rem; /* Slightly larger font size */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); /* Subtle shadow for text highlighting */
        }
        input, button, a {
            border-radius: 6px; /* Softer edges for inputs and buttons */
        }
        input {
            border: 2px solid #a15e3f; /* Rich brown border for inputs */
            padding: 10px;
            font-size: 1.05rem; /* Larger font size inside inputs */
            transition: box-shadow 0.3s ease-in-out;
        }
        input:focus {
            box-shadow: 0 0 8px rgba(161, 94, 63, 0.5); /* Glow effect on focus */
            border-color: #a15e3f;
            outline: none;
        }
        .btn-primary {
            background-color: #b75e40; /* Vibrant burnt orange-brown for primary button */
            border: none;
            font-size: 1.1rem; /* Highlight font size */
            font-weight: bold;
            padding: 10px 20px;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #9c452b; /* Darker brown on hover */
            transform: scale(1.05); /* Slight grow effect on hover */
        }
        .btn-secondary {
            background-color: #e0a96d; /* Vibrant light brown for cancel button */
            border: none;
            color: #5e3b26;
            font-size: 1.1rem;
            padding: 10px 20px;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }
        .btn-secondary:hover {
            background-color: #d18b56; /* Richer tone on hover */
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="form-container">
            <h2>Create New User</h2>
            <form action="<?= site_url('/users/create'); ?>" method="POST" class="row g-3">
                <div class="col-md-6">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
                <div class="col-md-6">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-6">
                    <label for="gender" class="form-label">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender">
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary px-4">Create</button>
                    <a href="<?= site_url('/users/display'); ?>" class="btn btn-secondary px-4 ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
