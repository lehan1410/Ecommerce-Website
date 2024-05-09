

<link rel="stylesheet" href="./mvc/assets/css/style.css">


<section id="page-header">

    <h2>#stayhome</h2>
    <p>Save more with coupons & up to 70% off!</p>

</section>

<body>
    <section id="product1" class="section-p1">
        <div class="filter">
            <div class="range">
                <input type="range" min="0" max="100" value="50$" class="slider" id="priceRange">
                <p>Price: <span id="price"></span></p>
            </div>
            <div>
                <input type="checkbox" id="category1" name="category1" value="Áo thun">
                <label for="category1"> Áo thun</label><br>
                <input type="checkbox" id="category2" name="category2" value="Áo sơ mi">
                <label for="category2"> Áo sơ mi</label><br>
                <input type="checkbox" id="category3" name="category3" value="Quần dài">
                <label for="category3"> Quần dài</label><br>
                <input type="checkbox" id="category4" name="category4" value="Quần short">
                <label for="category4"> Quần short</label><br>
                <input type="checkbox" id="category5" name="category5" value="Giày">
                <label for="category5"> Giày</label><br>
            </div>
        </div>
        <div class="pro-container">
            <?php foreach($data as $index => $product): ?>
            <div class="pro">
                <img src="<?php echo $product['image']; ?>" alt="Product Image">
                <div class="des">
                    <span>adidas</span>
                    <h5><?php echo $product['name']; ?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4><?php echo "$" . $product['price']; ?></h4>
                </div>
                <a href="#" name="cart" data-id="<?php echo $product['product_id']; ?>"><i
                        class="fal fa-shopping-cart cart"></i></a>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"> <i class="fal fa-long-arrow-alt-right"></i></a>

    </section> -->

    <!-- <script src="./js/script.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('a[name="cart"]').click(function(e) {
            e.preventDefault();

            var productId = $(this).data('product_id');

            $.ajax({
                url: 'addtocartModels.php',
                method: 'POST',
                data: {
                    id: productId,
                    action: 'add'
                },
                success: function(response) {
                    alert('Sản phẩm đã được thêm vào giỏ hàng');
                },
                error: function() {
                    alert('Có lỗi xảy ra, vui lòng thử lại');
                }
            });
        });
    });
    </script>
    <script>
    var slider = document.getElementById("priceRange");
    var output = document.getElementById("price");
    output.innerHTML = slider.value;

    slider.oninput = function() {
        output.innerHTML = this.value;
    }
    </script>
</body>