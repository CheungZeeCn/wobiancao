<div class="shopCategories form">
<?php echo $this->Form->create('ShopCategory'); ?>
	<fieldset>
		<legend><?php echo __('Edit Shop Category'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ShopCategory.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('ShopCategory.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Shop Categories'), array('action' => 'index')); ?></li>
	</ul>
</div>
