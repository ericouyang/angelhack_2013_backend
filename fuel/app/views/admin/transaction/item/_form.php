<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('Transaction id', 'transaction_id', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('transaction_id', Input::post('transaction_id', isset($transaction_item) ? $transaction_item->transaction_id : ''), array('class' => 'span4', 'placeholder'=>'Transaction id')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Item id', 'item_id', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('item_id', Input::post('item_id', isset($transaction_item) ? $transaction_item->item_id : ''), array('class' => 'span4', 'placeholder'=>'Item id')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Qty', 'qty', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('qty', Input::post('qty', isset($transaction_item) ? $transaction_item->qty : ''), array('class' => 'span4', 'placeholder'=>'Qty')); ?>

			</div>
		</div>
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>