<?php include __DIR__ . '/common/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-warning shadow">
                <div class="card-body">
                    <h3>New Password</h3>
                    <form action="<?php echo BASE_URL; ?>update_password" method="POST">
                        <div class="mb-3">
                            <label>New Password</label>
                            <input type="password" name="new_password" class="form-control" required minlength="8">
                        </div>
                        <button type="submit" class="btn btn-warning w-100">Update Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>