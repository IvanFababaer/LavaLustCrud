<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e6d2b5; /* Lively light brown background */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            margin: 40px auto;
        }

        h2 {
            color: #7f5539; /* Warm, rich brown */
            font-weight: bold;
            font-size: 2.2em;
            text-align: center;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        label {
            color: #6b4226; /* Deep brown for labels */
            font-weight: bold;
            font-size: 1.1em;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #d1d1d1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #b75e40; /* Light brown for focus */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
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

        .btn-secondary {
            font-size: 1.1rem;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .btn-secondary:hover {
            background-color: #7d7d7d;
            transform: scale(1.05);
        }

        textarea {
            resize: none;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="form-container">
        <h2>Update User</h2>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="/users/update/<?php echo $user['id']; ?>" method="POST" class="row g-3">
            <div class="col-md-6">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $user['idf_last_name']; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user['idf_first_name']; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['idf_email']; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Male" <?php echo $user['idf_gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo $user['idf_gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                </select>
            </div>
            <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required><?php echo $user['idf_address']; ?></textarea>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="/users/display" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
