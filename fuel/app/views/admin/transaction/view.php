<h2>Viewing #<?php echo $transaction->id; ?></h2>

<p>
	<strong>User id:</strong>
	<?php echo $transaction->user_id; ?></p>
<p>
	<strong>Paypal id:</strong>
	<?php echo $transaction->paypal_id; ?></p>

<?php echo Html::anchor('admin/transaction/edit/'.$transaction->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/transaction', 'Back'); ?>