
<?php
    echo $this->Html->script("/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput" );
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
                    <div class="" style="width:100%;height:100%">
                        <!-- PORTLET MAIN -->
                        <div class="portlet wbc-profile-sidebar-portlet">
                            <!-- SIDEBAR USERPIC -->
                            <div class="wbc-profile-userpic">
                               <img src="<?php echo $user['User']['users_pic_url']?>" class="img-responsive" alt="">
                            </div>
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR BUTTONS -->
                            <div class="wbc-usermain-username">
                                 <?php echo $user['User']['username']?>
                            </div>
                            <!-- END SIDEBAR BUTTONS -->
                            <!-- SIDEBAR MENU -->
                            <div class="wbc-usermain-container">
                                <div class="usermain-jieshengguanzhu"> 
                                  <ul class="nav">
                                    <li style="display:block;position:relative" class="usermain-list-li">
                                        <a href="<?php echo $this->Html->url("/Users/viewMyCoupons");  ?>">
                                        <div style="display:inline-block" class="usermain-list-item-icon col-md-2 col-sm-2 col-xs-2"> 
                                            <span><i class="fa fa-money" style="font-size:30px"></i></span>
                                        </div> 
                                        <div style="display:inline-block" class="user-coupon-list-shop-name col-md-7 col-sm-7 col-xs-7"> 
                                                    <span class="">节省</span>
                                        </div> 
                                        <div style="display:inline-block" class="user-coupon-list-coupon-desp col-md-2 col-sm-2 col-xs-2"> 
                                                    <span class=""><?php echo $count; ?>次</span>
                                        </div> 
                                        <div style="display:inline-block" class="user-coupon-list-coupon-desp col-md-1 col-sm-1 col-xs-1"> 
                                                    <span class=""> ></span>
                                        </div> 
                                        </a>
                                    </li>
                                    <li style="display:block;position:relative" class="usermain-list-li">
                                        <a href=" <?php echo $this->Html->url("/Users/viewMyShops");  ?> ">
                                        <div style="display:inline-block" class="usermain-list-item-icon col-md-2 col-sm-2 col-xs-2"> 
                                            <span><i class="fa fa-plus-square" style="font-size:30px"></i></span>
                                        </div> 
                                        <div style="display:inline-block" class="user-coupon-list-shop-name col-md-7 col-sm-7 col-xs-7"> 
                                                    <span class="">关注</span>
                                        </div> 
                                        <div style="display:inline-block" class="user-coupon-list-coupon-desp col-md-2 col-sm-2 col-xs-2"> 
                                                    <span class=""></span>
                                        </div> 
                                        <div style="display:inline-block" class="user-coupon-list-coupon-desp col-md-1 col-sm-1 col-xs-1"> 
                                                    <span class=""> ></span>
                                        </div> 
                                        </a>
                                    </li>
                                </ul>  
                                </div>
                                <!-- <div class="usermain-jieshengguanzhu">
                                  <ul class="nav">
                                    <li style="display:block;position:relative" class="usermain-list-li">
                                        <a href="#">
                                        <div style="display:inline-block" class="usermain-list-item-icon col-md-2 col-sm-2 col-xs-2"> 
                                            <span><i class="fa fa-globe" style="font-size:30px"></i></span>
                                        </div> 
                                        <div style="display:inline-block" class="user-coupon-list-shop-name col-md-7 col-sm-7 col-xs-7"> 
                                                    <span class="">分享</span>
                                        </div> 
                                        <div style="display:inline-block" class="user-coupon-list-coupon-desp col-md-2 col-sm-2 col-xs-2"> 
                                                    <span class=""></span>
                                        </div> 
                                        <div style="display:inline-block" class="user-coupon-list-coupon-desp col-md-1 col-sm-1 col-xs-1"> 
                                                    <span class=""> ></span>
                                        </div> 
                                        </a>
                                    </li>
                                  </ul>
                                </div> -->
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
