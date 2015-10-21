
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
        <div class="container" style="background:white;margin-top:10px;">
                <div class="row text-center" style="background:white;margin-top:10px;border-bottom:1px solid #e8e8e8;margin-bottom:0px">
                <?php foreach($categories as $k => $v) { ?>
                    <div class="col-xs-4 text-center" style="padding-top:8px">
                        <a href="/Coupons/indexByCategory2/<?php echo ($k+1) ;?>">
                            <img style="width:30px;height:30px" src="<?php echo $v['CouponsCategory']['pic_url'] ?>" >
                             <div class="caption">
                                <p style="color:black"><?php echo $v['CouponsCategory']['name_cn'] ?></p>
                             </div>
                        </a>
                    </div>
                <?php } ?>
                <!-- /.row -->
                </div>
                <?php if($cId != NULL && $tags != NULL) {?>
                <div class="row text-center">
                    <div class="btn-group btn-group-justified">
                        <?php foreach($tags as $k => $v) { ?>
                            <?php if($tag == '') { ?>
                                <a href='<?php echo "/Coupons/indexByCategory2/$cId/$k"; ?>' class="btn btn-default" style="padding-bottom:0px;background:#e8e8e8;border:1px solid white;border-radius:0;">
                                <div style="border-bottom:2px solid #e8e8e8"> <?php echo $k; ?> </div> </a>
                            <?php } else { ?>
                                <?php if($k == $tag) {?>
                                    <a href='<?php echo "/Coupons/indexByCategory2/$cId/$k"; ?>' class="btn btn-default" style="padding-bottom:0px;background:#e8e8e8;border:1px solid white;border-radius:0;">
                                    <div style="border-bottom:2px solid #F08840"><?php echo $k; ?></div> </a>

                                <?php } else { ?>
                                    <a href='<?php echo "/Coupons/indexByCategory2/$cId/$k"; ?>' class="btn btn-default" style="padding-bottom:0px;background:#e8e8e8;border:1px solid white;border-radius:0;">
                                    <div style="border-bottom:2px solid #e8e8e8"> <?php echo $k; ?> </div> </a>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </div>     

                </div>
                <?php } ?>

        </div>
                            <!-- END SIDEBAR BUTTONS -->
                            <!-- SIDEBAR MENU -->
                            <div class="wbc-profile-usermenu">
                                <ul class="nav">
                                  <?php foreach($coupons as $k => $v) { ?>
                                    <li class="" style="display:block;position:relative">
                                        <div class="coupon-main">
                                                 <div class="col-xs-1 text-center coupon-main-rank">
                                                    <?php echo ($k + 1); ?>
                                                </div>
                                                <div class="col-xs-2 coupon-shop-logo">
                                                     <a href="/Shops/ViewShop/<?php echo $v['Shop']['id']?>">
                                                    <img class="coupon-logo-img" src="<?php echo $v['Shop']['pic_url'] ?>" >
                                                    </a>
                                                    <div class="coupon-geted-heart">
                                                        <div id="coupon_id_like_<?php echo $v['Coupon']['id'];?>" style="width:100%;text-align:center;"><span style="font-size:9px;color:#797979">已领</span><span style="font-size:11px;color:#e84b3c"><?php echo $v['Coupon']['has_count'] ?></span></div>    
                                                    </div>
                                                </div>
                                                <div class="col-xs-7 coupon-desp">
                                                    <p class="coupon-desp-description coupon-line"><?php echo $v['Coupon']['name'] ?></p>
                                                    <p class="coupon-desp-discount coupon-line"><?php echo $v['Coupon']['slogan'] ?></p>
                                                </div>
                                                <!-- <?php 
                                                    if($v['Coupon']['iLiked']) { ?>
                                                        <div id="coupon_id_<?php echo $v['Coupon']['id'];?>" class="col-xs-1 coupon-heart coupon-liked" onclick="pressLikeInViewCoupon(<?php echo $v['Coupon']['id']?>)">
                                                           <a> <i class="fa fa-heart coupon-heart-i" style="font-size:17px"></i> </a>
                                                        </div>
                                                <?php } else { ?>
                                                        <div id="coupon_id_<?php echo $v['Coupon']['id'];?>" class="col-xs-1 coupon-heart coupon-unliked" onclick="pressLikeInViewCoupon(<?php echo $v['Coupon']['id']?>)">
                                                           <a> <i class="fa fa-heart coupon-heart-i" style="font-size:17px"></i> </a>
                                                        </div>
                                                <?php } ?>
                                                -->
                                        </div>
                                        <div class="coupon-right">
                                            <div class="coupon-right wbc-profile-userbuttons">
                                               <a href="/Coupons/addHasCouponRedirect/<?php echo $v['Coupon']['id'] ?>" <button type="button" class="btn btn-default btn-circle wbc-btn-item">去领券</button></a>
                                        </div>
                                    </div>
                                <div class="clearfix">
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
    </div>
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

