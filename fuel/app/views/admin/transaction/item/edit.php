<h2>Editing Transaction_item</h2>
<br>

<?php echo render('admin\transaction\item/_form'); ?>
<p>
	<?php echo Html::anchor('admin/transaction/item/view/'.$transaction_item->id, 'View'); ?> |
	<?php echo Html::anchor('admin/transaction/item', 'Back'); ?></p>
