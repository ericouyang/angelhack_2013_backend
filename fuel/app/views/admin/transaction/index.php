<h2>Listing Transactions</h2>
<br>
<?php if ($transactions): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>User id</th>
			<th>Paypal id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($transactions as $transaction): ?>		<tr>

			<td><?php echo $transaction->user_id; ?></td>
			<td><?php echo $transaction->paypal_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/transaction/view/'.$transaction->id, 'View'); ?> |
				<?php echo Html::anchor('admin/transaction/edit/'.$transaction->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/transaction/delete/'.$transaction->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Transactions.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/transaction/create', 'Add new Transaction', array('class' => 'btn btn-success')); ?>

</p>
