<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .form-container {
            margin-top: 50px;
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 40px auto;
            text-align: center;
        }
        .btn-danger {
            background-color: #d9534f;
            border: none;
            transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
        }
        .btn-danger:hover {
            background-color: #c9302c;
            transform: scale(1.05);
        }
        .btn-secondary {
            transition: transform 0.2s ease-in-out;
        }
        .btn-secondary:hover {
            transform: scale(1.05);
        }
        .modal-header {
            border-bottom: none;
        }
        .modal-footer {
            border-top: none;
        }
        .alert {
            display: none;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="form-container">
        <h2 class="mb-4 text-danger">Delete User</h2>

        <?php if (isset($user) && !empty($user)): ?>
            <div id="warningMessage" class="alert alert-warning">
                <strong>Warning!</strong> Are you sure you want to delete the user 
                <strong><?php echo htmlspecialchars($user['idf_first_name'] . ' ' . $user['idf_last_name']); ?></strong>?
            </div>

            <button type="button" class="btn btn-danger" id="deleteBtn">
                Delete
            </button>
            <a href="/users/display" class="btn btn-secondary">Cancel</a>
        <?php else: ?>
            <div id="errorMessage" class="alert alert-danger">
                <strong>Error!</strong> User not found.
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Confirm Delete Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" autofocus></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the user 
                <strong><?php echo isset($user) ? htmlspecialchars($user['idf_first_name'] . ' ' . $user['idf_last_name']) : 'the selected user'; ?></strong>?
                This action cannot be undone.
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        // Show the warning message with a fade-in effect
        $('#warningMessage').fadeIn(500);

        // Handle the delete button click
        $('#deleteBtn').click(function () {
            $('#confirmDeleteModal').modal('show');
        });

        // Confirm deletion using AJAX
        $('#confirmDeleteBtn').click(function () {
            var userId = "<?php echo isset($user) ? $user['id'] : ''; ?>"; // Get user ID from PHP
            if (userId) {
                $.ajax({
                    url: '/users/delete/' + userId, // Update this URL to match your server's delete route
                    type: 'POST',
                    success: function (response) {
                        if (response.success) {
                            // Show success message and fade out form
                            $('body').append('<div class="alert alert-success" id="successMessage">User deleted successfully.</div>');
                            $('#successMessage').fadeIn(500).delay(2000).fadeOut(500, function() {
                                window.location.href = "/users/display"; // Redirect after success
                            });
                        } else {
                            // Show failure message if delete fails
                            $('body').append('<div class="alert alert-danger" id="failureMessage">Failed to delete user. Please try again.</div>');
                            $('#failureMessage').fadeIn(500).delay(2000).fadeOut(500);
                        }
                    },
                    error: function () {
                        // Handle error if AJAX fails
                        $('body').append('<div class="alert alert-danger" id="errorMessage">An error occurred. Please try again later.</div>');
                        $('#errorMessage').fadeIn(500).delay(2000).fadeOut(500);
                    }
                });
            }
        });
    });
</script>
</body>
</html>
