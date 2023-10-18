<?php
    include 'config/config.php';

    session_start();

    $user_id=$_SESSION['user_id'];

    if(!isset($user_id)){
        header('Location:login.php');
    }

    if(isset($_POST['update_cart'])){

        $cart_id = $_POST['cart_id'];
        $cart_quantity = $_POST['cart_quantity'];
        mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id' ") or die('query failed');
        $message[] = 'Số lượng đã được cập nhật!';
    }

    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
        header('location:cart.php');
    }

    if(isset($_GET['delete_all'])){
        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        header('location:cart.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Gio hang</title>
    <!-- font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link-->
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    
    <?php include 'header.php'; ?>

    <div class="heading">
        <h3>giỏ hàng</h3>
        <p> <a href="home.php">Trang chủ</a> / Giỏ hàng </p>
    </div>

    <section class="shopping-cart">
         <h1 class="title">Sản phẩm đã thêm</h1>

         <div class="box-container">
            <?php
                $grand_total = 0;
                $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                if(mysqli_num_rows($select_cart)>0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){ 
            ?>
            <div class="box">
            <a href="cart.php?delete=<?php echo $fetch_cart['id'];?>" class="fas fa-times" onclick="return confirm ('Xóa khỏi giỏ hàng?');"></a>
                <img src="uploaded_img/<?php echo $fetch_cart['image'];?>" alt="">
                <div class="name"><?php echo $fetch_cart['name'];?></div>
                <div class="price"><?php echo $fetch_cart['price'];?>&nbspđ</div>
                <form action="" method="post">
                    <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id'];?>">
                    <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity'];?>">
                    <input type="submit" name="update_cart" value="Cập nhật" class="option-btn">
                </form>

                <div class="sub-total">Tổng:<span> <?php echo $sub_total = ($fetch_cart['quantity']*$fetch_cart['price']);?>&nbspđ</span></div>
            </div>
            <?php
                $grand_total += $sub_total;   
                    }
                }else{
                    echo '<p class="empty">Giỏ hàng của bạn đang trống</p>';
                }
                        
            ?>
            
         </div>

         <div style="margin-top: 2rem; text-align: center;">
            <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total>1) ? '':'disabled';?>" onclick="return confirm ('Bạn có chắc chắn muốn xóa?');">Xóa tất cả</a>
        </div>

        <div class="cart-total">
            <p>Tổng tiền: <span><?php echo $grand_total;?>&nbspđ</span></p>
            <div class="flex">
                <a href="shop.php" class="option-btn">Tiếp tục mua hàng</a>
                <a href="checkout.php" class="btn <?php echo ($grand_total>1) ? '':'disabled';?>">Kiểm tra đặt hàng</a>
            </div>
        </div>
    </section>

<?php include 'footer.php'; ?>
    <!--custom js file link-->
<script src="js/script.js"></script>

</body>
</html>