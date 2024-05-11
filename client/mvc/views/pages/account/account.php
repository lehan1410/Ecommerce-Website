<link rel="stylesheet" href="../mvc/assets/css/style_temp.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />


<body>
    <div class="container">
        <div class="left-content avatar">
            <h4>Thông tin cá nhân</h4>
            <img src="../mvc/assets/img/about/avatar.jpg" alt="">
            <form action="../mvc/controllers/upload.php" method="post" enctype="multipart/form-data">
                <label for="file"> Pick a file: </label>
                <input type="file" name="avatar">
                <input type="submit" name="submit" value="Upload">
            </form>
        </div>
        <div class="right-content form">
            <div>
                <label for="username">Username</label>
                <div class="icon-container">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" id="username" name="username" required>
                </div>
            </div>

            <div>
                <label for="email">Email</label>
                <div class="icon-container">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="text" id="email" name="email" required>
                </div>
            </div>

            <div>
                <label for="tel">Telephone</label>
                <div class="icon-container">
                    <i class="fa-solid fa-phone"></i>
                    <input type="text" id="tel" name="tel" required>
                </div>
            </div>

            <div>
                <label for="location">Location</label>
                <div class="icon-container">
                    <i class="fa-solid fa-location-dot"></i>
                    <input type="text" id="location" name="location" required>
                </div>
            </div>

            <div>
                <label for="link">Link</label>
                <div class="icon-container">
                    <i class="fa-solid fa-link"></i>
                    <input type="text" id="link" name="link" required>
                </div>
            </div>

            <div>
                <label for="bio">Bio</label>
                <div class="icon-container">
                    <i class="fa-solid fa-info"></i>
                    <input type="text" id="bio" name="bio" required>
                </div>
            </div>

            <button class="normal save">Save change</button>
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