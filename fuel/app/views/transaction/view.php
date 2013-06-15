<h2>Viewing <span class='muted'>#<?php echo $transaction->id; ?></span></h2>

<p>
	<strong>User id:</strong>
	<?php echo $transaction->user_id; ?></p>
<p>
	<strong>Paypal id:</strong>
	<?php echo $transaction->paypal_id; ?></p>

<?php echo Html::anchor('transaction/edit/'.$transaction->id, 'Edit'); ?> |
<?php echo Html::anchor('transaction', 'Back'); ?>