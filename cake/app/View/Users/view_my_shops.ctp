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
            <div class="row margin-top-10">
                <div class="">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="" style="width:100%;height:100%">
                        <!-- PORTLET MAIN -->
                        <div class="portlet wbc-profile-sidebar-portlet">
                            <!-- SIDEBAR USERPIC -->
                            <div class="wbc-profile-userpic">
                                <img src="<?php echo $user['User']['users_pic_url']?>" class="img-responsive">
                            </div>
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR BUTTONS -->
                            <div class="wbc-user-follow-shop-username">
                                <?php echo $user['User']['username']?>
                            </div>
                            <!-- END SIDEBAR BUTTONS -->
                            <!-- SIDEBAR MENU -->
                            <div class="wbc-shop-item-cube-container">
                                <?php if(count($user['UserFollowShop']) == 0) { ?>
                                        <hr> </hr>
                                        <div class="porlet" > 
                                            暂时没有收藏的店铺，去看看什么火？ 
                                            <a href="/Coupons/indexByCategory"> 走起 >> </a>
                                        </div>
                                <?php }?>
                               

                                <?php foreach($user['UserFollowShop'] as $v) { ?>
                                    <a href="/Shops/ViewShop/<?php echo $v['Shop']['id']?>">
                                        <div class="square bg" style="background-image:url( <?php echo $v['Shop']['pic_url']?> )">
                                        </div> 
                                    </a>
                                <?php }?>
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
 </script>
