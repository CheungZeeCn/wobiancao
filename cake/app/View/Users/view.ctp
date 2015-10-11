<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Open Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['open_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remote System'); ?></dt>
		<dd>
			<?php echo h($user['User']['remote_system']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Info Remote'); ?></dt>
		<dd>
			<?php echo h($user['User']['user_info_remote']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created Datetime'); ?></dt>
		<dd>
			<?php echo h($user['User']['created_datetime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Logged In'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_logged_in']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
	</ul>
</div>
