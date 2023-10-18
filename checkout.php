<?php
    include 'config/config.php';

    session_start();

    $user_id=$_SESSION['user_id'];

    if(!isset($user_id)){
        header('Location:login.php');
    }

    if(isset($_POST['order_btn'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $number = $_POST['number'];
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $method = mysqli_real_escape_string($conn, $_POST['method']);
        $address = mysqli_real_escape_string($conn, $_POST['flat'].', '. $_POST['village'].', '. $_POST['ward'].', '. $_POST['district'].', '. $_POST['city']);
        $placed_on = date('d-M-Y');

        $cart_total = 0;
        $cart_products[] ='';

        $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query failed');
        if(mysqli_num_rows($cart_query)>0){
            while($cart_item = mysqli_fetch_assoc($cart_query)){
                $cart_products[] = $cart_item['name']. '('.$cart_item['quantity']. ')';
                $sub_total = ($cart_item['price'] * $cart_item['quantity']);
                $cart_total += $sub_total;
            }
        }

        $total_products = implode(', ', $cart_products);

        $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email ='$email' AND method ='$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

        if($cart_total ==0){
            $message[] = 'Giỏ hàng của bạn đang trống';
        }else{
            if(mysqli_num_rows($order_query)>0){
                $message[] = 'order already palced';
            }else{
                mysqli_query($conn, "INSERT INTO `orders` (user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES ('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
                $message[] = 'Đơn hàng đã được ghi nhận!';
                mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            }
        }

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
        <h3>Kiểm tra đặt hàng</h3>
        <p><a href="home.php">Trang chủ</a> / Đặt hàng</p>
    </div>

    <section class="display-order">
        <?php
            $grand_total = 0;
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id= '$user_id'" ) or die('query failed');
            if(mysqli_num_rows($select_cart)>0){
                while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                    $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                    $grand_total += $total_price;
                
        ?>
        <p> <?php echo $fetch_cart['name'];?><span>(<?php echo $fetch_cart['price'] .'đ' .' x '. $fetch_cart['quantity'] ;?>)</span></p>
        <?php
                }
            }else{
                echo '<p class=empty">Giỏ hàng của bạn đang trống</p>';
            }
        ?>

        <div class="grand-total">Tổng tiền: <?php echo $grand_total;?>&nbspđ</div>
    </section>
    
    <section class="checkout">
        <form action="" method="post">
            <h3>Thông tin đặt hàng</h3>
            <div class="flex">
                <div class="inputBox">
                    <span>Họ và tên: </span>
                    <input type="text" name="name" require placeholder="">
                </div>
                <div class="inputBox">
                    <span>Số điện thoại: </span>
                    <input type="number" name="number" require placeholder="">
                </div>
                <div class="inputBox">
                    <span>Email: </span>
                    <input type="email" name="email" require placeholder="">
                </div>
                <div class="inputBox">
                    <span>Số nhà:</span>
                    <input type="text" name="flat" require placeholder="">
                </div>
                <div class="inputBox">
                    <span>Tỉnh/Thành phố: </span>
                    <input type="text" name="city" require placeholder="">
                </div>
                <div class="inputBox">
                    <span>Quận/Huyện: </span>
                    <input type="text" name="district" require placeholder="">
                </div>
                <div class="inputBox">
                    <span>Phường/Xã: </span>
                    <input type="text" name="ward" require placeholder="">
                </div>
                <div class="inputBox">
                    <span>Đường/Thôn: </span>
                    <input type="text" name="village" require placeholder="">
                </div>
                <div class="inputBox">
                    <span>Phương thức thanh toán: </span>
                    <select name="method">
                        <option value="Chuyển khoản ngân hàng">Chuyển khoản ngân hàng</option>
                        <option value="Thanh toán khi nhận hàng"> Thanh toán khi nhận hàng</option>
                        <option value="Thẻ tín dụng">Thẻ tín dụng</option>
                        <option value="ZaloPay">ZaloPay</option>
                    </select>
                </div>
            </div>
            <input type="submit" value="Hoàn tất đơn hàng" class="btn" name="order_btn">
        </form>
    </section>

<?php include 'footer.php'; ?>
    <!--custom js file link-->
<script src="js/script.js"></script>

</body>
</html>