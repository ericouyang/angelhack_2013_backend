<h2>Viewing #<?php echo $item->id; ?></h2>

<p>
	<strong>Cost:</strong>
	<?php echo $item->cost; ?></p>
<p>
	<strong>Name:</strong>
	<?php echo $item->name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $item->description; ?></p>
<p>
	<strong>Qty:</strong>
	<?php echo $item->qty; ?></p>
<p>
	<strong>Upc:</strong>
	<?php echo $item->upc; ?></p>

<?php echo Html::anchor('admin/item/edit/'.$item->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/item', 'Back'); ?>