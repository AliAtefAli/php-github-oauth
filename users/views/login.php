<div class="card my-5">
    <div class="card-header">
        <h3 class="text-center">Login</h3>
    </div>
    <div class="card-body">
        <form action="users/auth/login.php" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="username"
                       value="<?php echo $_SESSION['username']; ?>" autofocus
                       placeholder="UserName">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <input type="submit" name="submit" class="btn btn-primary" value="Login">
    </div>
</div>