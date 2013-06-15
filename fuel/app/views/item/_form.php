<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('Cost', 'cost', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('cost', Input::post('cost', isset($item) ? $item->cost : ''), array('class' => 'span4', 'placeholder'=>'Cost')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('name', Input::post('name', isset($item) ? $item->name : ''), array('class' => 'span4', 'placeholder'=>'Name')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::textarea('description', Input::post('description', isset($item) ? $item->description : ''), array('class' => 'span8', 'rows' => 8, 'placeholder'=>'Description')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Qty', 'qty', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('qty', Input::post('qty', isset($item) ? $item->qty : ''), array('class' => 'span4', 'placeholder'=>'Qty')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Upc', 'upc', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('upc', Input::post('upc', isset($item) ? $item->upc : ''), array('class' => 'span4', 'placeholder'=>'Upc')); ?>

			</div>
		</div>
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>