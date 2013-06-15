<h2>Editing <span class='muted'>Transaction_item</span></h2>
<br>

<?php echo render('transaction\item/_form'); ?>
<p>
	<?php echo Html::anchor('transaction/item/view/'.$transaction_item->id, 'View'); ?> |
	<?php echo Html::anchor('transaction/item', 'Back'); ?></p>
