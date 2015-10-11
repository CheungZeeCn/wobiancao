<div class="wbcUsers view">
<h2><?php echo __('Wbc User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($wbcUser['WbcUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Open Id'); ?></dt>
		<dd>
			<?php echo h($wbcUser['WbcUser']['open_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remote System'); ?></dt>
		<dd>
			<?php echo h($wbcUser['WbcUser']['remote_system']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Info Remote'); ?></dt>
		<dd>
			<?php echo h($wbcUser['WbcUser']['user_info_remote']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created Datetime'); ?></dt>
		<dd>
			<?php echo h($wbcUser['WbcUser']['created_datetime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Logged In'); ?></dt>
		<dd>
			<?php echo h($wbcUser['WbcUser']['last_logged_in']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Wbc User'), array('action' => 'edit', $wbcUser['WbcUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Wbc User'), array('action' => 'delete', $wbcUser['WbcUser']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $wbcUser['WbcUser']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Wbc Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Wbc User'), array('action' => 'add')); ?> </li>
	</ul>
</div>
