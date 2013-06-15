<h2>Editing Transaction</h2>
<br>

<?php echo render('admin\transaction/_form'); ?>
<p>
	<?php echo Html::anchor('admin/transaction/view/'.$transaction->id, 'View'); ?> |
	<?php echo Html::anchor('admin/transaction', 'Back'); ?></p>
