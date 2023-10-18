<?php
    include 'config/config.php';

    session_start();

    $user_id=$_SESSION['user_id'];

    if(!isset($user_id)){
        header('Location:login.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Gioi thieu</title>
    <!-- font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link-->
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    
    <?php include 'header.php'; ?>

    <div class="heading">
        <h3>Giới thiệu IMT BOOK</h3>
        <p><a href="home.php">Trang chủ</a> / Giới thiệu</p>
    </div>

    <section class="about">

        <div class="flex">

            <div class="image">
                <img src="image/about-img.jpg" alt="">
            </div>

            <div class="content">
                <h3>Tại sao nên chọn IMT BOOK?</h3>
                <p>Cửa hàng sách trực tuyến của chúng tôi cung cấp đánh giá từ khách hàng trước đó. Bạn có thể xem xét các đánh giá này để có cái nhìn tổng quan về chất lượng sách và dịch vụ của chúng tôi. Điều này giúp bạn đưa ra quyết định thông minh khi mua sách trực tuyến.</p>
                <p>Chúng tôi đảm bảo bảo mật thông tin cá nhân của bạn khi mua sách trực tuyến. Hệ thống thanh toán của chúng tôi được bảo vệ bởi các biện pháp an ninh và mã hóa, đảm bảo rằng các giao dịch của bạn được thực hiện một cách an toàn và bảo mật.</p>
                <a href="contact.php" class="btn">Liên hệ chúng tôi</a>
            </div>
        </div>
    </section>

    <section class="reviews">

        <h1 class="title">Đánh giá của khách hàng</h1>

        <div class="box-container">

            <div class="box">
                <img src="image/avt2.jpeg" alt="">
                <p>Tôi rất thích cửa hàng sách trực tuyến này! Bộ sưu tập sách đa dạng và tôi đã tìm thấy những cuốn sách mà tôi muốn từ lâu. Dịch vụ khách hàng nhanh chóng, thân thiện. Cảm ơn đội ngũ của cửa hàng sách trực tuyến!</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i> 
                </div>
                <h3>Minh Trang</h3>
            </div>

            <div class="box">
                <img src="image/avt1.jpeg" alt="">
                <p>Cửa hàng sách trực tuyến này là nguồn cung cấp sách tuyệt vời. Tôi đã tìm thấy các cuốn sách hiếm mà tôi không thể tìm thấy ở bất kỳ nơi nào khác. Tôi rất hài lòng với trải nghiệm mua sách của mình.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i> 
                </div>
                <h3>Hạnh Phương</h3>
            </div>


            <div class="box">
                <img src="image/avt4.jpg" alt="">
                <p>Tôi là một người đam mê đọc sách và đã sử dụng nhiều cửa hàng sách trực tuyến khác nhau. Nhưng cửa hàng sách trực tuyến này là một trong những tốt nhất mà tôi từng gặp. Tôi đã tìm thấy nơi mua sách lý tưởng của mình!</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i> 
                </div>
                <h3>Như Quỳnh</h3>
            </div>


            <div class="box">
                <img src="image/avt5.jpg" alt="">
                <p>Tôi muốn chia sẻ trải nghiệm tích cực của mình với cửa hàng sách trực tuyến này. Tôi đã mua sách nhiều lần và không bao giờ thất vọng. Cửa hàng có một bộ sưu tập lớn các cuốn sách đáng chú ý và giao hàng luôn đúng hẹn. Tôi khuyên bạn nên thử mua sách từ cửa hàng sách trực tuyến này</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i> 
                </div>
                <h3>Linh Chi</h3>
            </div>


            <div class="box">
                <img src="image/avt7.jpg" alt="">
                <p>Tôi đã mua sách từ cửa hàng trực tuyến và trải nghiệm của tôi rất tuyệt vời. Giao hàng rất chuẩn xác và sách đến trong tình trạng tốt. Tôi cũng thích việc có thể đọc các đánh giá từ khách hàng khác để có cái nhìn tổng quan về sách trước khi mua. Tôi sẽ tiếp tục mua sách từ cửa hàng trực tuyến này trong tương lai.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i> 
                </div>
                <h3>Nam Anh</h3>
            </div>

            <div class="box">
                <img src="image/avt8.jpeg" alt="">
                <p>Cửa hàng sách trực tuyến này thực sự đáng tin cậy. Tôi đã mua sách từ đây nhiều lần và không bao giờ gặp bất kỳ vấn đề nào. Dịch vụ khách hàng rất chuyên nghiệp và hỗ trợ tôi trong quá trình đặt hàng và theo dõi giao hàng. Tôi tự tin khuyên mọi người nên mua sách từ cửa hàng sách trực tuyến này.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i> 
                </div>
                <h3>Mai Vân</h3>
            </div>
        </div>

        
    </section>

    <section class="authors">
        <h1 class="title">Tác giả nổi bật</h1>

        <div class="box-container">

            <div class="box">
                <img src="image/NhaVan_NguyenNhatAnh.jpg" alt="">
                <div class="share">
                    <a href="https://vi.wikipedia.org/wiki/Nguy%E1%BB%85n_Nh%E1%BA%ADt_%C3%81nh" class="fab fa-google"></a>
                    <a href="https://www.youtube.com/watch?v=GNFLdFctqPc" class="fab fa-youtube"></a>
                    <a href="https://www.facebook.com/Page.NguyenNhatAnh/?locale=vi_VN" class="fab fa-facebook-f"></a>
                </div>
                <h3>Nguyễn Nhật Ánh</h3>
            </div>

            <div class="box">
                <img src="image/rosieNguyen.jpeg" alt="">
                <div class="share">
                    <a href="https://tramdoc.vn/tin-tuc/tac-gia-rosie-nguyen-cuoc-doi-toi-thay-doi-la-nho-sach-nQaxW.html" class="fab fa-google"></a>
                    <a href="https://www.youtube.com/watch?v=gQsrvhZesjw" class="fab fa-youtube"></a>
                    <a href="https://www.facebook.com/rosienguyenvn/" class="fab fa-facebook-f"></a>
                </div>
                <h3>Rosie Nguyễn</h3>
            </div>

            <div class="box">
                <img src="image/Tg_NguyenThiPhuongHoa.jpg" alt="">
                <div class="share">
                    <a href="https://vnexpress.net/tag/pgs-ts-nguyen-thi-phuong-hoa-1501381" class="fab fa-google"></a>
                    <a href="" class="fab fa-youtube"></a>
                    <a href="" class="fab fa-facebook-f"></a>
                </div>
                <h3>Nguyễn Thị Phương Hoa</h3>
            </div>
            
            <div class="box">
                <img src="image/Tg_DangHoangGiang.jpeg" alt="">
                <div class="share">
                    <a href="https://vietcetera.com/vn/thong-tin-ca-nhan/ts-dang-hoang-giang" class="fab fa-google"></a>
                    <a href="" class="fab fa-youtube"></a>
                    <a href="" class="fab fa-facebook-f"></a>
                </div>
                <h3>Đặng Hoàng Giang</h3>
            </div>

            <div class="box">
                <img src="image/thomas-harris.jpg" alt="">
                <div class="share">
                    <a href="https://en.wikipedia.org/wiki/Thomas_Harris" class="fab fa-google"></a>
                    <a href="" class="fab fa-youtube"></a>
                    <a href="" class="fab fa-facebook-f"></a>
                </div>
                <h3>Thomas Harris</h3>
            </div>

            <div class="box">
                <img src="image/Tiến sĩ Seth J. Gillihan.jpeg" alt="">
                <div class="share">
                    <a href="https://www.linkedin.com/in/sethgillihanphd" class="fab fa-google"></a>
                    <a href="" class="fab fa-youtube"></a>
                    <a href="" class="fab fa-facebook-f"></a>
                </div>
                <h3>Seth J. Gillihan</h3>
            </div>

        </div>
    </section>

<?php include 'footer.php'; ?>
    <!--custom js file link-->
<script src="js/script.js"></script>

</body>
</html>