<link rel="stylesheet" href="../mvc/assets/css/style_temp.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />


<body>
    <div class="container">
        <div class="left-content avatar">
            <h4>Thông tin cá nhân</h4>
            <img src="../mvc/assets/img/about/avatar.jpg" alt="">
            <form action="../mvc/controllers/upload.php" method="post" enctype="multipart/form-data">
                <label for="file"> Pick a file : </label>
                <input type="file" name="avatar">
                <input type="submit" name="submit" value="Upload">
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
<script>
document.getElementById('imageUpload').addEventListener('change', function(e) {
    var file = e.target.files[0];
    var reader = new FileReader();

    reader.onloadend = function() {
        document.getElementById('preview').style.backgroundImage = 'url(' + reader.result + ')';

        var formData = new FormData();
        formData.append('image', file);

        fetch('upload.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                location.reload();
            })
            .catch(error => {
                console.error(error);
            });
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.style.backgroundImage = "";
    }
});
</script>

</html>