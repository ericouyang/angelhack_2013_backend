<h2>Listing <span class='muted'>Items</span></h2>
<br>
<?php if ($items): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Cost</th>
			<th>Name</th>
			<th>Description</th>
			<th>Qty</th>
			<th>Upc</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($items as $item): ?>		<tr>

			<td><?php echo $item->cost; ?></td>
			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->description; ?></td>
			<td><?php echo $item->qty; ?></td>
			<td><?php echo $item->upc; ?></td>
			<td>
				<?php echo Html::anchor('item/view/'.$item->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('item/edit/'.$item->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('item/delete/'.$item->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Items.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('item/create', 'Add new Item', array('class' => 'btn btn-success')); ?>

</p>
