<div class="coupons form">
<?php echo $this->Form->create('Coupon'); ?>
	<fieldset>
		<legend><?php echo __('Add Coupon'); ?></legend>
	<?php
		echo $this->Form->input('shop_id');
		echo $this->Form->input('name');
		echo $this->Form->input('desp');
		echo $this->Form->input('like');
		echo $this->Form->input('coupon_category');
		echo $this->Form->input('datetime_begin');
		echo $this->Form->input('datetime_end');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Coupons'), array('action' => 'index')); ?></li>
	</ul>
</div>
