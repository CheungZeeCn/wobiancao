<div class="coupons index">
    <div>
        用户ID:
    <?php var_dump($userId);   ?>
        <br/>

    </div>

    <div>
    <?php  foreach($coupons as $c) { ?>
        <div>
        <?php var_dump($c);   ?>
        </div>
        <br/>
    <?php }?>

    </div>

</div>
