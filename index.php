<?php
include "layouts/header.php";
$customer = $_SESSION['CUSTOMER'] ?? null;

?>
<h1>Hello <?= $customer->name ?> To X Project</h1>

<a href="/views/auth/register.php" class="btn btn-success">Register</a>
<?php include "layouts/footer.php";?>

