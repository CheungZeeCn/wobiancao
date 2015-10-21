<?php
App::uses('AppModel', 'Model');
/**
 * Shop Model
 *
 */

//$g_hack_timenow = date("Y-m-d H:i:s");

class Shop extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'shop';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

    public $hasMany = array(
        'Coupon' => array(
            'className' => 'Coupon',
            'order' => 'Coupon.has_count DESC', 
            'foreignKey' => 'shop_id', 
            'conditions' => array(
            ),
        ),
    );

    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
        $this->hasMany['Coupon']['conditions']['Coupon.datetime_end >'] = date("Y-m-d H:i:s");
    }

}
