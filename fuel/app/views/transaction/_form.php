<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('User id', 'user_id', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('user_id', Input::post('user_id', isset($transaction) ? $transaction->user_id : ''), array('class' => 'span4', 'placeholder'=>'User id')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Paypal id', 'paypal_id', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('paypal_id', Input::post('paypal_id', isset($transaction) ? $transaction->paypal_id : ''), array('class' => 'span4', 'placeholder'=>'Paypal id')); ?>

			</div>
		</div>
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>