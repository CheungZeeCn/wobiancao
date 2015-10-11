<div class="shops view">
<h2><?php echo __('Shop'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($shop['Shop']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shop Category'); ?></dt>
		<dd>
			<?php echo h($shop['Shop']['shop_category']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($shop['Shop']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Desp'); ?></dt>
		<dd>
			<?php echo h($shop['Shop']['desp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($shop['Shop']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pic Url'); ?></dt>
		<dd>
			<?php echo h($shop['Shop']['pic_url']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Shop'), array('action' => 'edit', $shop['Shop']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Shop'), array('action' => 'delete', $shop['Shop']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $shop['Shop']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Shops'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop'), array('action' => 'add')); ?> </li>
	</ul>
</div>
