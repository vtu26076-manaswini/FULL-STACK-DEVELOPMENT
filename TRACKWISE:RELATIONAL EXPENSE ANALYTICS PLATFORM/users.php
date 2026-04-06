<?php
include "db.php";
include "header.php";

/* Add */
if(isset($_POST['add'])){
    $stmt=$conn->prepare("INSERT INTO users(name,email) VALUES(?,?)");
    $stmt->bind_param("ss",$_POST['name'],$_POST['email']);
    $stmt->execute();
}

/* Delete */
if(isset($_GET['del'])){
    $stmt=$conn->prepare("DELETE FROM users WHERE id=?");
    $stmt->bind_param("i",$_GET['del']);
    $stmt->execute();
}

$users=$conn->query("SELECT * FROM users");
?>

<h3 class="mb-4">Users Management</h3>

<div class="card p-3 mb-4 shadow">

<form method="post" class="row g-3">

<div class="col-md-4">
<input type="text" name="name"
class="form-control"
placeholder="Name" required>
</div>

<div class="col-md-4">
<input type="email" name="email"
class="form-control"
placeholder="Email" required>
</div>

<div class="col-md-4">
<button name="add" class="btn btn-primary w-100">
Add User
</button>
</div>

</form>

</div>

<table class="table table-bordered table-hover shadow">

<tr class="table-primary">
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Action</th>
</tr>

<?php while($u=$users->fetch_assoc()){ ?>

<tr>
<td><?= $u['id'] ?></td>
<td><?= $u['name'] ?></td>
<td><?= $u['email'] ?></td>

<td>
<a href="?del=<?= $u['id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete?')">
Delete
</a>
</td>
</tr>

<?php } ?>

</table>

<?php include "footer.php"; ?>
