<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e6d2b5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .form-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            margin: 40px auto;
            display: none; /* Initially hidden, will be shown with a fade effect */
        }
        h2 {
            color: #7f5539;
            text-align: center;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
        label {
            color: #6b4226;
            font-weight: 600;
            font-size: 1.1rem;
        }
        input, button, a {
            border-radius: 6px;
        }
        .btn-primary {
            background-color: #b75e40;
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
        .btn-secondary {
            background-color: #e0a96d;
            border: none;
            color: #5e3b26;
            font-size: 1.1rem;
            padding: 10px 20px;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }
        .btn-secondary:hover {
            background-color: #d18b56;
            transform: scale(1.05);
        }
        .message {
            display: none; /* Initially hidden */
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="form-container">
            <h2>Create New User</h2>
            <form id="createUserForm" class="row g-3">
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
        <div class="message text-success" id="successMessage">User created successfully!</div>
        <div class="message text-danger" id="errorMessage">An error occurred. Please try again.</div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            // Fade in the form on page load
            $('.form-container').fadeIn(1000);

            $('#createUserForm').on('submit', function (e) {
                e.preventDefault(); // Prevent the default form submission
                
                // Perform a fade-out and animate effects for user feedback
                const formData = $(this).serialize();
                $.ajax({
                    url: "<?= site_url('/users/create'); ?>", // Replace with your actual endpoint
                    type: "POST",
                    data: formData,
                    beforeSend: function () {
                        $('.form-container').fadeTo(500, 0.5); // Dim the form while submitting
                    },
                    success: function (response) {
                        $('#successMessage').hide().fadeIn(1000).delay(2000).fadeOut(1000); // Show success message
                        $('.form-container').slideUp(1000, function () {
                            window.location.href = "<?= site_url('/users/display'); ?>"; // Redirect after animation
                        });
                    },
                    error: function (xhr, status, error) {
                        $('.form-container').fadeTo(500, 1); // Restore form visibility
                        $('#errorMessage').hide().fadeIn(1000).delay(2000).fadeOut(1000); // Show error message
                    }
                });
            });
        });
    </script>
</body>
</html>
