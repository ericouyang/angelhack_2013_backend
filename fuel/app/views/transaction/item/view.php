<h2>Viewing <span class='muted'>#<?php echo $transaction_item->id; ?></span></h2>

<p>
	<strong>Transcation id:</strong>
	<?php echo $transaction_item->transcation_id; ?></p>
<p>
	<strong>Item id:</strong>
	<?php echo $transaction_item->item_id; ?></p>

<?php echo Html::anchor('transaction/item/edit/'.$transaction_item->id, 'Edit'); ?> |
<?php echo Html::anchor('transaction/item', 'Back'); ?>