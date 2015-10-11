<div class="shopCategories view">
<h2><?php echo __('Shop Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($shopCategory['ShopCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name Cn'); ?></dt>
		<dd>
			<?php echo h($shopCategory['ShopCategory']['name_cn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pic Url'); ?></dt>
		<dd>
			<?php echo h($shopCategory['ShopCategory']['pic_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($shopCategory['ShopCategory']['comment']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Shop Category'), array('action' => 'edit', $shopCategory['ShopCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Shop Category'), array('action' => 'delete', $shopCategory['ShopCategory']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $shopCategory['ShopCategory']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Shop Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
