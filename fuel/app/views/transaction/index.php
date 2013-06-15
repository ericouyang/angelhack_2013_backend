<h2>Listing <span class='muted'>Transactions</span></h2>
<br>
<?php if ($transactions): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>User id</th>
			<th>Paypal id</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($transactions as $transaction): ?>		<tr>

			<td><?php echo $transaction->user_id; ?></td>
			<td><?php echo $transaction->paypal_id; ?></td>
			<td>
				<?php echo Html::anchor('transaction/view/'.$transaction->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('transaction/edit/'.$transaction->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('transaction/delete/'.$transaction->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Transactions.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('transaction/create', 'Add new Transaction', array('class' => 'btn btn-success')); ?>

</p>
