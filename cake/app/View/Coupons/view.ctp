<div class="coupons view">
<h2><?php echo __('Coupon'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shop Id'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['shop_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Desp'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['desp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Like'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['like']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coupon Category'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['coupon_category']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datetime Begin'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['datetime_begin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datetime End'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['datetime_end']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Coupon'), array('action' => 'edit', $coupon['Coupon']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Coupon'), array('action' => 'delete', $coupon['Coupon']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $coupon['Coupon']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Coupons'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon'), array('action' => 'add')); ?> </li>
	</ul>
</div>
