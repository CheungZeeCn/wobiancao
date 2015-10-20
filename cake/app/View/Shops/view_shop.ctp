 <?php
       echo $this->Html->script("/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput" );
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
            <div class="row margin-top-10">
                <div class="">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="profile-sidebar" style="width: 250px;">
                        <!-- PORTLET MAIN -->
                        <div class="portlet wbc-profile-sidebar-portlet">
                            <!-- SIDEBAR USERPIC -->
                            <div class="wbc-profile-userpic">
                                
                                <img src="<?php echo $shop['Shop']['pic_url']?>" class="img-responsive" alt="">
                            </div>
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR BUTTONS -->
                            <div class="wbc-profile-userbuttons">
                                <?php if($isFollowed){?>
                                    <button  type="button" class="btn btn-circle green-follow wbc-btn-sm" onclick="changeFollow(<?php echo $shop['Shop']['id']?>)">已关注</button>
                                <?php }else{?>
                                    <button  type="button" class="btn btn-circle green-follow wbc-btn-sm" onclick="changeFollow(<?php echo $shop['Shop']['id']?>)">+ 关注</button>
                                <?php }?>
                            </div>
                            <!-- END SIDEBAR BUTTONS -->
                            <!-- SIDEBAR MENU -->
                            <div class="wbc-profile-usermenu">
                                <ul class="nav">
                                  <?php foreach($shop['Coupon'] as $k => $v) { ?>
                                    <li class="" style="display:block;position:relative">
                                        <div class="coupon-main">
                                                 <div class="col-xs-1 text-center coupon-main-rank">
                                                    <?php echo ($k + 1); ?>
                                                </div>
                                                <div class="col-xs-2 coupon-shop-logo">
                                                    <img class="coupon-logo-img" src="<?php echo $shop['Shop']['pic_url'] ?>" >
                                                    <div class="coupon-geted-heart text-center">
                                                        <i class="fa fa-heart" id="coupon_id_like_<?php echo $v['id'];?>" style
                                                            ="font-size:11px;width:100%;color:#e84b3c"><?php echo $v['like'] ?></i>    
                                                    </div>
                                                </div>
                                                <div class="col-xs-7 coupon-desp">
                                                    <p class="coupon-desp-description coupon-line"><?php echo $v['name'] ?></p>
                                                    <p class="coupon-desp-discount coupon-line"><?php echo $v['slogan'] ?></p>
                                                </div>
                                                <?php 
                                                    if($v['iLiked']) { ?>
                                                        <div id="coupon_id_<?php echo $v['id'];?>" class="col-xs-1 coupon-heart coupon-liked" onclick="pressLikeInViewCoupon(<?php echo $v['id']?>)">
                                                           <a> <i class="fa fa-heart coupon-heart-i" style="font-size:17px;"></i> </a>
                                                        </div>
                                                <?php } else { ?>
                                                        <div id="coupon_id_<?php echo $v['id'];?>" class="col-xs-1 coupon-heart coupon-unliked" onclick="pressLikeInViewCoupon(<?php echo $v['id']?>)">
                                                           <a> <i class="fa fa-heart coupon-heart-i" style="font-size:17px;"></i> </a>
                                                        </div>
                                                <?php } ?>
                                        </div>
                                        <div class="coupon-right">
                                            <div class="coupon-right wbc-profile-userbuttons">
                                               <a href="/Coupons/addHasCouponRedirect/<?php echo $v['id'] ?>" <button type="button" class="btn btn-default btn-circle wbc-btn-item">去领券</button></a>
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

function changeFollow(id) {
        var addUrl = "/Shops/ajax_addFollowShop/"+ id + ".json";
        var cancleUrl = "/Shops/ajax_deleteFollowShop/"+ id + ".json";
        var url;
        if($(".wbc-profile-userbuttons button").html() == "+ 关注"){
            $(".wbc-profile-userbuttons button").html("已关注");
            url = addUrl;
        }else if($(".wbc-profile-userbuttons button").html() == "已关注"){
            $(".wbc-profile-userbuttons button").html("+ 关注");
            url = cancleUrl;
        }
        
        $.ajax({
            type:'GET',
            url: url,
        }).done(function(data){
            if(data.status == 'OK'){
                //refresh
                console.log("post OK");
                $('#post-div textarea').val('');
            } else if (data.msg != undefined) {
                ;
            } else {
                console.log("post ERROR");
            }
        }).fail(function(data){
                console.log("post ERROR");
        });
}
</script>
