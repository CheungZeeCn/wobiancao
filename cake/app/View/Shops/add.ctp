<div class="shops form">
<?php echo $this->Form->create('Shop'); ?>
	<fieldset>
		<legend><?php echo __('Add Shop'); ?></legend>
	<?php
		echo $this->Form->input('shop_category');
		echo $this->Form->input('name');
		echo $this->Form->input('desp');
		echo $this->Form->input('comment');
		echo $this->Form->input('pic_url');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Shops'), array('action' => 'index')); ?></li>
	</ul>
</div>
