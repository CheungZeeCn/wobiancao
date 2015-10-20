<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

//$cakeDescription = __d('cake_dev', '窝边草');
//$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>
        窝边草
	</title>
	<?php
		//echo $this->Html->meta('icon');

        echo $this->Html->css('components-rounded'); 
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('/fonts/font-awesome/css/font-awesome.min.css'); 
        echo $this->Html->css('default');
        echo $this->Html->css('custom');
        echo $this->Html->css('layout');
        echo $this->Html->css('profile_wobiancao');
        echo $this->Html->css('wbc');
        echo $this->Html->script('jquery.min');
        echo $this->Html->script('bootstrap.min');
        echo $this->Html->script('wbc');

		//echo $this->fetch('meta');
		//echo $this->fetch('css');
		//echo $this->fetch('script');
	?>
</head>
<body>
			<?php echo $this->fetch('content'); ?>
</body>
</html>
