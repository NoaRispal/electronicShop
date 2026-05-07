<?php include __DIR__ . '/common/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title text-center">Reset Password</h3>
                    <p class="text-muted text-center">Enter your email to reset your account password.</p>
                    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>";?>
                    
                    <form action="<?php echo BASE_URL; ?>reset_request" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" required placeholder="example@email.com">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Verify Email</button>
                    </form>
                    
                    <div class="mt-3 text-center">
                        <a href="<?php echo BASE_URL; ?>signin">Back to Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>