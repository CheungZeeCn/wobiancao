<?php $this->Html->script("/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput" );
    echo $this->Html->css("/assets/admin/pages/css/tasks" );
    echo $this->Html->css("/assets/admin/pages/css/profile");
    echo $this->Html->script("/assets/global/plugins/jquery.sparkline.min" );
    echo $this->Html->script("/assets/global/scripts/metronic" );
    echo $this->Html->script("/assets/admin/layout3/scripts/layout" );
    echo $this->Html->script("/assets/admin/layout3/scripts/demo" );
    echo $this->Html->script("/assets/admin/pages/scripts/profile" );
?>
<div class="page-container">
    <!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="row margin-top-10">
                <div class="">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="" style="width:100%">
                        <!-- PORTLET MAIN -->
                        <div class="portlet">
                            <!-- SIDEBAR USERPIC -->
                            <div class="wbc-user-coupon-head" style="position:relative">
                                <div class="wbc-user-coupon-userpic">
                                    <img src="<?php echo $user['User']['users_pic_url']?>" class="img-responsive" alt="">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="wbc-user-coupon-userdesp" style="">
                                    <div class="wbc-user-coupon-userdesp-name">
                                         <?php echo $user['User']['username']?> 
                                    </div>
                                    <div class="wbc-user-coupon-userdesp-times">
                                        已经节省<?php echo $count ;?>次   
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- END SIDEBAR USERPIC -->


                            <!-- SIDEBAR MENU -->
                            <div class="wbc-user-coupon-list">
                                <ul class="nav">
                                    <?php foreach($user['UserHasCoupon'] as $k => $v) { 
                                        if(!array_key_exists($v['coupon_id'], $coupons)) { continue; }
                                    ?>
                                    <li class="user-coupon-list-item" style="display:block;position:relative">
                                        <div class="my-coupon-list" style="height:100%">
                                        <a href="/Shops/ViewShop/<?php echo $coupons[$v['coupon_id']]['Shop']['id']?>">
                                        <div class="user-coupon-list-shop-logo col-md-2 col-sm-2 col-xs-2"> 
                                                <img src="<?php echo $coupons[$v['coupon_id']]['Shop']['pic_url']; ?>">
                                       </div>
                                       </a>
                                       <a href="/Coupons/addHasCouponRedirect/<?php echo $v['coupon_id']?>">
                                        <div class="user-coupon-list-shop-name col-md-3 col-sm-3 col-xs-3"> 
                                                    <span class=""></span><?php echo $coupons[$v['coupon_id']]['Shop']['name']; ?>
                                        </div> 
                                        <div class="user-coupon-list-coupon-desp coupon-line col-md-6 col-sm-6 col-xs-6"> 
                                                    <span class="coupon-line"><?php echo $coupons[$v['coupon_id']]['Coupon']['name']; ?></span>
                                        </div> 
                                        <div style="display:inline-block" class="user-coupon-list-coupon-desp col-md-1 col-sm-1 col-xs-1"> 
                                                                                            <img class="coupon-icon-arrow" src="/img/right_arrow.png">
                                                                                                                                    </div>
                                        </div>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <div class="wbc-user-coupon-list">
                                <ul class="nav">
                                    <?php foreach($user['UserHasCoupon'] as $k => $v) { 
                                        if(!array_key_exists($v['coupon_id'], $outdatedCoupons)) { continue; }
                                    ?>
                                    <li class="user-coupon-list-item" style="display:block;position:relative">
                                        <div class="my-coupon-list" style="height:100%">
                                        <a href="/Shops/ViewShop/<?php echo $outdatedCoupons[$v['coupon_id']]['Shop']['id']?>">
                                        <div class="user-coupon-list-shop-logo col-md-2 col-sm-2 col-xs-2"> 
                                                <img src="<?php echo $outdatedCoupons[$v['coupon_id']]['Shop']['pic_url']; ?>">
                                       </div>
                                       </a>
                                       <a href="/Coupons/addHasCouponRedirect/<?php echo $v['coupon_id']?>">
                                        <div class="user-coupon-list-shop-name col-md-3 col-sm-3 col-xs-3"> 
                                                    <span class=""></span><?php echo $outdatedCoupons[$v['coupon_id']]['Shop']['name']; ?>
                                        </div> 
                                        <div class="user-coupon-list-coupon-desp coupon-line col-md-6 col-sm-6 col-xs-6"> 
                                            <span class="coupon-line"><?php echo $outdatedCoupons[$v['coupon_id']]['Coupon']['name']; ?></span>
                                        </div> 
                                        <div style="display:inline-block；height:100%;padding-top:18px;" class="user-coupon-list-coupon-desp col-md-1 col-sm-1 col-xs-1"> 
                                            <div style="font-size:9px;width:10px;">过期</div>   
                                        </div>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!-- END MENU -->
                        </div>
                        <!-- END PORTLET MAIN -->
                    </div>
                    <!-- END BEGIN PROFILE SIDEBAR -->
                </div>
            </div>
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>
<script>
jQuery(document).ready(function() {
// initiate layout and plugins
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    Demo.init(); // init demo features\
    Profile.init(); // init page demo
});
</script>
