<?php include __DIR__ . '/common/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2 class="text-center">Inscription</h2>
            <form method="POST" action="<?php echo BASE_URL; ?>register">
                <div class="mb-3">
                    <label>Full name</label>
                    <input type="text" name="full_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" minlength="8" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Create my account</button>
            </form>
            <p class="mt-3 text-center">Have an account ? <a href="<?php echo BASE_URL; ?>signin">Log In</a></p>
        </div>
    </div>
</div>