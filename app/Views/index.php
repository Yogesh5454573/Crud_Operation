<div class="row">
    <div class="col-md-12">
     <div class="demo-html mt-0">
       <div class="button_su">
        <span class="su_button_circle">
            </span>
                <button type="button" class="hrbtns contractbtn addbttn" onclick="showModal('<?= base_url() ?>add','Add Order')"> <span class="button_text_container">
                    <i class="fa fa-plus"></i> ADD USER
            </span>
                </button>
                </div>
            <table class="example display dataTable display responsive nowrap tblalign table borderless" style="width: 100%" id="example" aria-describedby="example_info">
                <thead class="theadrow">
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($users) && !empty($users)) : ?>
                        <?php foreach ($users as $index => $user) : ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['mobile_number'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td>
                                    <a onclick="showModal('<?= base_url('Home/edit/' . $user['id']) ?>', 'Edit User')"><i style='font-size:24px' class='fas'>&#xf044;</i></a>
                                    <a onclick="deleteUser(<?= $user['id'] ?>)"><i class="material-icons">&#xe872;</i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5">No users found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function deleteUser(id) {
        if (confirm('Are you sure you want to delete this user?')) {
            $.ajax({
                type: 'POST',
                url: '<?=base_url()?>Home/delete/' + id,
                success: function (result) {
                    if (result == 1) {
                        alert('Deleted successfully');
                        location.reload();
                    } else {
                        alert('Failed to delete');
                    }
                }
            });
        }
    }
</script>
