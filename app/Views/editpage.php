<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2>Edit User</h2>
    <form id="editUserForm">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $edit['name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="mobile_number">Mobile Number</label>
            <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="<?= $edit['mobile_number'] ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $edit['email'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>

<script>
    $(document).ready(function () {
        $('#editUserForm').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '<?= base_url('Home/update/' . $edit['id']) ?>',
                data: $(this).serialize(),
                success: function (result) {
                    if (result == 1) {
                        alert('User updated successfully');
                        window.location.href = '<?= base_url('Home') ?>';
                    } else {
                        alert('Failed to update user');
                    }
                }
            });
        });
    });
</script>
</body>
</html>
