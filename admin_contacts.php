<?php
    include 'config/config.php';

    session_start();

    $admin_id=$_SESSION['admin_id'];

    if(!isset($admin_id)){
        header('Location:login.php');
    }

    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('query failed');
        header('location:admin_contacts.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <mete http-equiv="X-UA-Compatible" content="IE=edge"></mete>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loi Nhan</title>

    <!-- font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom admin css file link-->
    <link rel="stylesheet" href="css/admin_style.css">
</head>
<body>
    <?php include 'admin_header.php'; ?>

    <section class="messages">

    <h1 class="title">lời nhắn</h1>

    <div class="box-container">

        <?php
            $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
            if(mysqli_num_rows($select_message)>0){
                while($fetch_message  = mysqli_fetch_assoc($select_message)){  
        ?>
        <div class="box">
            <p> Tên tài khoản : <span><?php echo $fetch_message['name'];?></span>></p>
            <p> Số điện thoại : <span><?php echo $fetch_message['number'];?></span>></p>
            <p> Email : <span><?php echo $fetch_message['email'];?></span>></p>
            <p> Lời nhắn : <span><?php echo $fetch_message['message'];?></span>></p>
            <a href="admin_contacts.php?delete=<?php echo $fetch_message['id'];?>" onclick="return confirm('Xóa lời nhắn này?');" class="delete-btn">Xóa lời nhắn</a>
        </div>

        <?php

                };
            }else{
                echo '<p class="empty">Chưa có tin nhắn nào ở đây cả!</p>';
            }
        ?>

    </div>

    </section>








    <!--custom admin js file link-->
    <script src="js/admin_js.js"></script>
</body>
</html>