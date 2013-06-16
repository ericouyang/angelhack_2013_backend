<h2>Viewing #<?php echo $transaction_item->id; ?></h2>

<p>
	<strong>Transaction id:</strong>
	<?php echo $transaction_item->transaction_id; ?></p>
<p>
	<strong>Item id:</strong>
	<?php echo $transaction_item->item_id; ?></p>

<?php echo Html::anchor('admin/transaction/item/edit/'.$transaction_item->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/transaction/item', 'Back'); ?>