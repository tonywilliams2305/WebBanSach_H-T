
<?php
    include 'config/config.php';

    session_start();

    $admin_id=$_SESSION['admin_id'];

    if(!isset($admin_id)){
        header('Location:login.php');
    }

    // if(isset($_POST['update_order'])){
        
    //     $order_update_id=$_POST['order_id'];
    //     $update_payment = $_POST['update_payment'];
    //     mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_update_id'") or die('query failed');
    //     $message[] = 'payment status has been updated!';
    // }

    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
        header('location:admin_users.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <mete http-equiv="X-UA-Compatible" content="IE=edge"></mete>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tai Khoan</title>

    <!-- font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom admin css file link-->
    <link rel="stylesheet" href="css/admin_style.css">
</head>
<body>
    <?php include 'admin_header.php'; ?>

    <section class="users">
        <h1 class="title">Tài khoản người dùng</h1>
        <div class="box-container">
            <?php
                $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die ('query failed');
                while($fetch_users = mysqli_fetch_assoc($select_users)){  
            ?>
            <div class="box">
                <p> Tên tài khoản : <span><?php echo $fetch_users['name'];?></span></p>
                <p> Email : <span><?php echo $fetch_users['email'];?></span></p>
                <p> Loại tài khoản : <span style="color:<?php if($fetch_users['user_type'] == 'admin'){echo 'var(--orange)';} ?>"><?php echo $fetch_users['user_type'];?></span></p>
                <a href="admin_users.php?delete=<?php echo $fetch_users['id'];?>" onclick="return confirm('Xóa tài khoản người dùng này?');" class="delete-btn">Xóa tài khoản</a>
            </div>
            <?php
                };
            ?>
        </div>
    </section>



    <!--custom admin js file link-->
    <script src="js/admin_js.js"></script>
</body>
</html>