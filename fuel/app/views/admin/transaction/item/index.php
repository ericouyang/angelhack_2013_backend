<h2>Listing Transaction_items</h2>
<br>
<?php if ($transaction_items): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Transcation id</th>
			<th>Item id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($transaction_items as $transaction_item): ?>		<tr>

			<td><?php echo $transaction_item->transcation_id; ?></td>
			<td><?php echo $transaction_item->item_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/transaction/item/view/'.$transaction_item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/transaction/item/edit/'.$transaction_item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/transaction/item/delete/'.$transaction_item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Transaction_items.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/transaction/item/create', 'Add new Transaction item', array('class' => 'btn btn-success')); ?>

</p>
