<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thế giới điện thoại</title>
    <link rel="shortcut icon" href="img/favicon.ico" />

    <!-- Load font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

    <!-- Jquery -->
    <script src="lib/Jquery/Jquery.min.js"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <!-- our files -->
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/topnav.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/taikhoan.css">
    <link rel="stylesheet" href="css/chitietsanpham.css">
    <link rel="stylesheet" href="css/footer.css">
    <!-- js -->
    <script src="js/dungchung.js"></script>
    <script src="js/chitietsanpham.js"></script>

    <?php 
        require_once "php/echoHTML.php";
    ?>
</head>

<body>

    <?php addTopNav(); ?>

    <section>
        <?php 
            addHeader(); 
           echo '<div class="chitietSanpham" style="min-height: 85vh">
           <h1>Điện thoại </h1>
           <div class="rowdetail group">
               <div class="picture">
                   <img src="">
               </div>
               <div class="price_sale">
                   <div class="area_price"> </div>
                   <div class="ship" style="display: none;">
                       <i class="fa fa-clock-o"></i>
                       <div>NHẬN HÀNG TRONG 1 GIỜ</div>
                   </div>
                   <div class="area_promo">
                       <strong>khuyến mãi</strong>
                       <div class="promo">
                           <i class="fa fa-check-circle"></i>
                           <div id="detailPromo"> </div>
                       </div>
                   </div>
                   <div class="policy">
                       <div>
                           <i class="fa fa-archive"></i>
                           <p>Trong hộp có: Sạc, Tai nghe, Sách hướng dẫn, Cây lấy sim, Ốp lưng </p>
                       </div>
                       <div>
                           <i class="fa fa-star"></i>
                           <p>Bảo hành chính hãng 12 tháng.</p>
                       </div>
                       <div class="last">
                           <i class="fa fa-retweet"></i>
                           <p>1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.</p>
                       </div>
                   </div>
                   <div class="area_order">
                       <!-- nameProduct là biến toàn cục được khởi tạo giá trị trong phanTich_URL_chiTietSanPham -->
                       <a class="buy_now" onclick="themVaoGioHang(maProduct, nameProduct);">
                           <h3><i class="fa fa-plus"></i> Thêm vào giỏ hàng</h3>
                       </a>
                   </div>
               </div>
               <div class="info_product">
                   <h2>Thông số kỹ thuật</h2>
                   <ul class="info">
   
                   </ul>
               </div>
           </div>
           <hr>
           <div class="comment-area">
               <div class="guiBinhLuan">
                   <div class="stars">
                       <form action="">
                           <input class="star star-5" id="star-5" value="5" type="radio" name="star"/>
                           <label class="star star-5" for="star-5" title="Tuyệt vời"></label>
   
                           <input class="star star-4" id="star-4" value="4" type="radio" name="star"/>
                           <label class="star star-4" for="star-4" title="Tốt"></label>
   
                           <input class="star star-3" id="star-3" value="3" type="radio" name="star"/>
                           <label class="star star-3" for="star-3" title="Tạm"></label>
   
                           <input class="star star-2" id="star-2" value="2" type="radio" name="star"/>
                           <label class="star star-2" for="star-2" title="Khá"></label>
   
                           <input class="star star-1" id="star-1" value="1" type="radio" name="star"/>
                           <label class="star star-1" for="star-1" title="Tệ"></label>
                       </form>
                   </div>
                   <textarea maxlength="250" id="inpBinhLuan" placeholder="Viết suy nghĩ của bạn vào đây..."></textarea>
                   <input id="btnBinhLuan" type="button" onclick="checkGuiBinhLuan()" value="GỬI BÌNH LUẬN">
               </div>
               <!-- <h2>Bình luận</h2> -->
               <div class="container-comment">
                   <div class="rating"></div>
                   <div class="comment-content">
                   </div>
               </div>
           </div>
       </div>';
        ?>
        
    </section>

    <?php addContainTaiKhoan(); ?>

    <div class="footer">
        <?php addFooter(); ?>
    </div>

    <i class="fa fa-arrow-up" id="goto-top-page" onclick="gotoTop()"></i>
    <i class="fa fa-arrow-down" id="goto-bot-page" onclick="gotoBot()"></i>

</body>

</html>