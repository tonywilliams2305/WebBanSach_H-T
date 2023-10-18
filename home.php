<?php
    include 'config/config.php';

    session_start();

    $user_id=$_SESSION['user_id'];

    if(!isset($user_id)){
        header('Location:login.php');
    }

    if(isset($_POST['add_to_cart'])){

        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];
     
        $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
     
        if(mysqli_num_rows($check_cart_numbers) > 0){
           $message[] = 'Đã được thêm vào giỏ hàng!';
        }else{
           mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
           $message[] = 'Sản phẩm được thêm vào giỏ hàng!';
        }
     
     }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Trang chu</title>
    <!-- font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link-->
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body> 

    <?php include 'header.php'; ?>

    <section class="home">
        <div class="content">
            <h3>Sách là nguồn cảm hứng vô tận!</h3>
            <p>Đọc sách không chỉ là một hoạt động giải trí, mà còn mang đến nhiều lợi ích về tâm hồn và sự phát triển cá nhân.</p>
            <a href="about.php" class="white-btn">Tìm hiểu thêm</a>
        </div>
    </section>

    <section class="products">

        <h1 class="title">Sản phẩm mới nhất</h1>
        <div class="box-container">
            <?php  
            $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){
            ?>
            <form action="" method="post" class="box">
            <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
            <div class="name"><?php echo $fetch_products['name']; ?></div>
            <div class="price"><?php echo $fetch_products['price']; ?>&nbspđ</div>
            <input type="number" min="1" name="product_quantity" value="1" class="qty">
            <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
            <input type="submit" value="Thêm vào giỏ hàng" name="add_to_cart" class="btn">
            </form>
            <?php
                }
            }else{
                echo '<p class="empty">no products added yet!</p>';
            }
            ?>
        </div>

        <div class="load-more" style="margin-top: 2rem; text-align:center">
            <a href="shop.php" class="option-btn">Xem thêm</a>
        </div>
    </section>


    <section class="about">

        <div class="flex">

            <div class="image">
                <img src="image/about-img.jpg" alt="">
            </div>

            <div class="content">
                <h3>Về chúng tôi</h3>
                <p>IMT BOOK không chỉ là nơi để bạn mua sách, mà còn là một nguồn cảm hứng và kiến thức. Chúng tôi cung cấp các đánh giá sách, cam kết đảm bảo chất lượng và độ tin cậy của mỗi cuốn sách.</p>
                <a href="about.php" class="white-btn">Xem thêm</a>
            </div>
        </div>
    </section>

    <section class="home-contact">
            <div class="content">
                <h3>Cảm ơn bạn đã ghé thăm trang web của chúng tôi!</h3>
                <p>Nếu bạn có bất kỳ câu hỏi, ý kiến hoặc đề xuất, xin vui lòng liên hệ với chúng tôi.</p>
                <a href="contact.php" class="white-btn">Tại đây!</a>
            </div>
    </section>

    <?php include 'footer.php'; ?>
    <!--custom js file link-->
    <script src="js/script.js"></script>
</body>
</html>