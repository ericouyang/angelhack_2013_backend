<h2>Listing <span class='muted'>Transaction_items</span></h2>
<br>
<?php if ($transaction_items): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Transcation id</th>
			<th>Item id</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($transaction_items as $transaction_item): ?>		<tr>

			<td><?php echo $transaction_item->transcation_id; ?></td>
			<td><?php echo $transaction_item->item_id; ?></td>
			<td>
				<?php echo Html::anchor('transaction/item/view/'.$transaction_item->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('transaction/item/edit/'.$transaction_item->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('transaction/item/delete/'.$transaction_item->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Transaction_items.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('transaction/item/create', 'Add new Transaction item', array('class' => 'btn btn-success')); ?>

</p>
