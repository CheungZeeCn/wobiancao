<div class="wbcUsers form">
<?php echo $this->Form->create('WbcUser'); ?>
	<fieldset>
		<legend><?php echo __('Add Wbc User'); ?></legend>
	<?php
		echo $this->Form->input('open_id');
		echo $this->Form->input('remote_system');
		echo $this->Form->input('user_info_remote');
		echo $this->Form->input('created_datetime');
		echo $this->Form->input('last_logged_in');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Wbc Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
