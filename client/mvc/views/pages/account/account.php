<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="../mvc/assets/css/style_temp.css">
</head>

<body>
    <div class="container">
        <div class="left-content avatar">
            <h4>Thông tin cá nhân</h4>
            <img src="../mvc/assets/img/about/avatar.jpg" alt="">
            <form action="./upload.php" method="post" enctype="multipart/form-data">
                Chọn file để upload:
                <input type="file" name="fileupload" id="fileupload">
                <input type="submit" value="Đăng ảnh" name="submit">
            </form>
        </div>
        <div class="right-content form">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="tel">Số điện thoại</label>
            <input type="tel" id="tel" name="tel" required>

            <label for="city">Tỉnh/Thành phố</label>
            <input type="city" id="city" name="city" required>

            <label for="dis">Quận/Huyện</label>
            <input type="dis" id="dis" name="dis" required>

            <label for="war">Phường/Xã</label>
            <input type="war" id="war" name="war" required>

            <button class="normal save">Lưu thay đổi</button>
        </div>
    </div>

</body>

</html>