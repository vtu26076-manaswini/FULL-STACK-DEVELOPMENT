<?php
include "header.php";
?>

<div class="text-center mb-5">

<h1 class="fw-bold text-primary">
TrackWise Dashboard
</h1>

<p class="lead">
Manage & Analyze Your Expenses Easily
</p>

</div>

<!-- Navigation Cards -->

<div class="row g-4 justify-content-center">

<!-- Users -->
<div class="col-md-4">

<a href="users.php" class="text-decoration-none">

<div class="card card-hover shadow h-100">

<div class="card-body text-center">

<h3>👤 Users</h3>

<p>Manage users</p>

<button class="btn btn-primary">
Open
</button>

</div>

</div>

</a>

</div>

<!-- Expenses -->
<div class="col-md-4">

<a href="expenses.php" class="text-decoration-none">

<div class="card card-hover shadow h-100">

<div class="card-body text-center">

<h3>💸 Expenses</h3>

<p>Add / Edit / Delete Expenses</p>

<button class="btn btn-success">
Open
</button>

</div>

</div>

</a>

</div>

<!-- Analytics -->
<div class="col-md-4">

<a href="analytics.php" class="text-decoration-none">

<div class="card card-hover shadow h-100">

<div class="card-body text-center">

<h3>📊 Analytics</h3>

<p>View Reports</p>

<button class="btn btn-warning">
Open
</button>

</div>

</div>

</a>

</div>

</div>

<?php include "footer.php"; ?>
