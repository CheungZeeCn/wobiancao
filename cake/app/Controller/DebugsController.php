<?php
App::uses('AppController', 'Controller');
App::uses('TestLib', 'MyLib');
/**
 * Coupons Controller
 *
 * @property Coupon $Coupon
 * @property PaginatorComponent $Paginator
 */
class DebugsController extends AppController {
    public function debug() {
        $tl = new TestLib();
        $str = $tl->hello();
        echo $str;
        exit(0);
    }

    public function phpinfo() {
        phpinfo();
    }


}
