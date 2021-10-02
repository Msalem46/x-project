<?php
include $_SERVER['DOCUMENT_ROOT']."/layouts/header.php";
$errors = (isset($_SESSION['signup-errors']))? $_SESSION['signup-errors'] : [];
$post = (isset($_SESSION['post-register']))? $_SESSION['post-register'] : [];
?>
<div class="row">
    <div class="col-md-12">
        <form role="form" method="post" action="<?= "/bin/controllers/UserController.php"; ?>">
            <div class="form-group col-md-4">
                <label for="inputEmail" class="col-sm-12 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail"  value="<?= $post['email'] ?? "" ?>" name="email" placeholder="Email">
                    <?php if(!empty($errors) && isset($errors['email'])): ?>
                        <label for="email" class="label text-danger"><?= $errors['email'] ?></label>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="inputUser" class="col-sm-12 col-form-label">User Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputUser" value="<?= $post['name'] ?? "" ?>" name="user" placeholder="Username">
                    <?php if(!empty($errors) && isset($errors['user'])): ?>
                        <label for="lastName" class="label text-danger"><?= $errors['user'] ?></label>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="inputPhone" class="col-sm-12 col-form-label">Mobile</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPhone" value="<?= $post['phone'] ?? "" ?>" name="phone" placeholder="Mobile">
                    <?php if(!empty($errors) && isset($errors['phone'])): ?>
                        <label for="phone" class="label text-danger"><?= $errors['phone'] ?></label>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword" class="col-sm-12 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                    <?php if(!empty($errors) && isset($errors['password'])): ?>
                        <label for="password" class="label text-danger"><?= $errors['password'] ?></label>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group col-md-4">
                <div class="col-sm-12">
                    <input type="submit" value="Sign in" name="submit" class="btn btn-primary"/>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include "../../layouts/footer.php"; ?>



