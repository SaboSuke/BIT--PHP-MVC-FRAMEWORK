<?php
/** User: Sabo */
?>

<h1 class="mt-5 text-center">Create Your Account</h1>

<div class="container mt-5">
    <form action="" method="post">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">First name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="Your First Name..">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Last name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Your Last Name..">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Your Email..">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Your Password..">
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password..">
        </div>
        <button type="submit" class="btn btn-primary mb-5">Submit</button>
    </form>
</div>