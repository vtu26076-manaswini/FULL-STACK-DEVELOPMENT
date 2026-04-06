<?php
include "db.php";
include "header.php";

$total=$conn->query(
"SELECT SUM(amount) t FROM expenses"
)->fetch_assoc();

$cat=$conn->query(
"SELECT category,SUM(amount) s
FROM expenses GROUP BY category"
);
?>

<h3 class="mb-4">Expense Analytics</h3>

<div class="card text-center shadow mb-4">

<div class="card-body">

<h4>Total Expense</h4>

<h2 class="text-success">
₹ <?= $total['t'] ?? 0 ?>
</h2>

</div>

</div>

<div class="card shadow">

<div class="card-header bg-warning">
Category Report
</div>

<div class="card-body">

<table class="table table-bordered">

<tr>
<th>Category</th>
<th>Total</th>
</tr>

<?php while($r=$cat->fetch_assoc()){ ?>

<tr>
<td><?= $r['category'] ?></td>
<td>₹<?= $r['s'] ?></td>
</tr>

<?php } ?>

</table>

</div>
</div>

<?php include "footer.php"; ?>
