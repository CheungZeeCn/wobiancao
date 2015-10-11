<div class="couponsCategories view">
<h2><?php echo __('Coupons Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($couponsCategory['CouponsCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name Cn'); ?></dt>
		<dd>
			<?php echo h($couponsCategory['CouponsCategory']['name_cn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pic Url'); ?></dt>
		<dd>
			<?php echo h($couponsCategory['CouponsCategory']['pic_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($couponsCategory['CouponsCategory']['comment']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Coupons Category'), array('action' => 'edit', $couponsCategory['CouponsCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Coupons Category'), array('action' => 'delete', $couponsCategory['CouponsCategory']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $couponsCategory['CouponsCategory']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Coupons Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupons Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
