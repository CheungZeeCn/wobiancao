<div class="couponsCategories form">
<?php echo $this->Form->create('CouponsCategory'); ?>
	<fieldset>
		<legend><?php echo __('Edit Coupons Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name_cn');
		echo $this->Form->input('pic_url');
		echo $this->Form->input('comment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CouponsCategory.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('CouponsCategory.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Coupons Categories'), array('action' => 'index')); ?></li>
	</ul>
</div>
