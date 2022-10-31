<style>
    <?php 
        require_once "./mvc/views/components/header/header.css"; 
    ?>
</style>

<?php 
    
    $links = array(
        '/qlkhachsan' => array(
            'type' => 'Giới thiệu',
            'path' => '',
        ),
        '/qlkhachsan/new' => array(
            'type' => 'Tin tức',
            'path' => 'new',
        ),
        '/qlkhachsan/listroom' => array(
            'type' => 'Căn hộ cho thuê',
            'path' => 'listroom',
        ),
        '/qlkhachsan/service' => array(
            'type' => 'Dịch vụ',
            'path' => 'service',
        ),
        '/qlkhachsan/contact' => array(
            'type' => 'Liên hệ',
            'path' => 'contact',
        ),
    );

    $dropdownlinks = array(
        '/qlkhachsan/cart' => array(
            'type' => 'Phòng đã đặt',
        ),
        '/qlkhachsan/language' => array(
            'type' => 'Ngôn ngữ',
        ),
        '/qlkhachsan/logout' => array(
            'type' => 'Đăng xuất',
        ),
    );

    
    $path = "";
    if(isset($_GET["url"])){
       $paths = explode("/",filter_var(trim($_GET["url"], "/")));
       if($paths[0])
            $path = $paths[0];
    }
?>

<div class="header__content">
    <div class="header__content__logo">
        <a href="/qlkhachsan">
            <img src="https://printgo.vn/uploads/media/774255/tong-hop-cac-mau-thiet-ke-logo-khach-san-sang-trong-dang-cap-2020_1587108774.jpg" alt="">
        </a>
    </div>
    <div class="header__content__link">
        <ul class="header__content__link__items">
            <?php 
                foreach($links as $link => $type){
                    $active = $path==$type["path"] ? "active" : "";
                    echo "<li class='header__content__link__items__item $active'><a href=".$link.">".$type['type']."</a></li>";
                }
            ?>
        </ul>
    </div>
    <div class="header__content__account">
        <div class="header__content__account__login">
            <a href="#">Đăng Nhập</a>
        </div>
        <div class="header__content__account__register">
            <a href="#">Đăng Ký</a>
        </div>
    </div>
    <div class="header__content__setting">
        <i class='bx bxs-cog header__content__setting__icon'></i>
        <ul class="header__content__setting__dropdown">
            <?php 
                foreach($dropdownlinks as $link => $type){
                    echo "<li><a class=black href=".$link.">".$type['type']."</a></li>";
                }
            ?>
        </ul>
    </div>
</div>
