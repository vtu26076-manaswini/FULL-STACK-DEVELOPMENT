<?php
include "db.php";
include "header.php";

/* Add */
if(isset($_POST['add'])){
$stmt=$conn->prepare(
"INSERT INTO expenses(user_id,amount,category,description,expense_date)
VALUES(?,?,?,?,?)"
);

$stmt->bind_param("idsss",
$_POST['user'],
$_POST['amount'],
$_POST['category'],
$_POST['desc'],
$_POST['date']
);

$stmt->execute();
}

/* Delete */
if(isset($_GET['del'])){
$stmt=$conn->prepare("DELETE FROM expenses WHERE id=?");
$stmt->bind_param("i",$_GET['del']);
$stmt->execute();
}

/* Edit */
$edit=null;

if(isset($_GET['edit'])){
$r=$conn->prepare("SELECT * FROM expenses WHERE id=?");
$r->bind_param("i",$_GET['edit']);
$r->execute();
$edit=$r->get_result()->fetch_assoc();
}

/* Update */
if(isset($_POST['update'])){

$stmt=$conn->prepare(
"UPDATE expenses SET
user_id=?,amount=?,category=?,description=?,expense_date=?
WHERE id=?"
);

$stmt->bind_param("idsssi",
$_POST['user'],
$_POST['amount'],
$_POST['category'],
$_POST['desc'],
$_POST['date'],
$_POST['id']
);

$stmt->execute();

header("Location: expenses.php");
}

$users=$conn->query("SELECT * FROM users");

$expenses=$conn->query("
SELECT expenses.*,users.name
FROM expenses
JOIN users ON expenses.user_id=users.id
");
?>

<h3 class="mb-4">Expenses Management</h3>

<div class="card p-3 shadow mb-4">

<form method="post" class="row g-3">

<input type="hidden" name="id"
value="<?= $edit['id'] ?? '' ?>">

<div class="col-md-3">

<select name="user" class="form-select" required>

<option value="">Select User</option>

<?php while($u=$users->fetch_assoc()){ ?>

<option value="<?= $u['id'] ?>"
<?= isset($edit)&&$edit['user_id']==$u['id']?"selected":"" ?>>

<?= $u['name'] ?>

</option>

<?php } ?>

</select>
</div>

<div class="col-md-2">
<input type="number" step="0.01"
name="amount"
class="form-control"
placeholder="Amount"
value="<?= $edit['amount'] ?? '' ?>" required>
</div>

<div class="col-md-2">
<input type="text" name="category"
class="form-control"
placeholder="Category"
value="<?= $edit['category'] ?? '' ?>" required>
</div>

<div class="col-md-2">
<input type="date" name="date"
class="form-control"
value="<?= $edit['expense_date'] ?? '' ?>" required>
</div>

<div class="col-md-3">
<input type="text" name="desc"
class="form-control"
placeholder="Description"
value="<?= $edit['description'] ?? '' ?>">
</div>

<div class="col-md-12">

<?php if($edit){ ?>

<button name="update" class="btn btn-warning w-100">
Update Expense
</button>

<?php } else { ?>

<button name="add" class="btn btn-success w-100">
Add Expense
</button>

<?php } ?>

</div>

</form>

</div>

<table class="table table-bordered shadow">

<tr class="table-success">
<th>ID</th>
<th>User</th>
<th>Amount</th>
<th>Category</th>
<th>Date</th>
<th>Action</th>
</tr>

<?php while($e=$expenses->fetch_assoc()){ ?>

<tr>
<td><?= $e['id'] ?></td>
<td><?= $e['name'] ?></td>
<td>₹<?= $e['amount'] ?></td>
<td><?= $e['category'] ?></td>
<td><?= $e['expense_date'] ?></td>

<td>

<a href="?edit=<?= $e['id'] ?>"
class="btn btn-info btn-sm">Edit</a>

<a href="?del=<?= $e['id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete?')">
Delete
</a>

</td>
</tr>

<?php } ?>

</table>

<?php include "footer.php"; ?>
