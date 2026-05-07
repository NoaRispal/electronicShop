<?php include __DIR__ . '/common/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2 class="text-center">Log In</h2>
            <?php if($error) echo "<div class='alert alert-danger'>$error</div>";
            if (isset($_GET['reset']) && $_GET['reset']==="success") echo "<div class='alert alert-success'>Password reset !</div>" ?>
            <form method="POST" action="<?php echo BASE_URL; ?>signin">
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Log In</button>
            </form>
            <p class="mt-3 text-center">No account ? <a href="<?php echo BASE_URL; ?>register">Create one</a></p>
            <p class="mt-3 text-center"><a href="<?php echo BASE_URL; ?>forgot_password">Forgot password</a></p>
        </div>
    </div>
</div>