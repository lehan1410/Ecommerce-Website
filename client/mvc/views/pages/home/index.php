<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech2etc Ecommerce Tutorial</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"> -->
    <base href="http://localhost:8080/Ecommerce-Website/client/mvc/assets">


</head>

<body>
    
    
    <section id="hero">
        <h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>On all products</h1>
        <p>Save more with coupons & up to 70% off!</p>
        <button>Shop Now</button>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="../mvc/assets/img/features/f1.png" alt="img">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="../mvc/assets/img/features/f2.png" alt="img">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="../mvc/assets/img/features/f3.png" alt="img">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="../mvc/assets/img/features/f4.png" alt="img">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="../mvc/assets/img/features/f5.png" alt="img">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="../mvc/assets/img/features/f6.png" alt="img">
            <h6>F24/7 Support</h6>
        </div>
    </section>

    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Morden Design</p>
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
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="banner" class="section-m1">
        <h4>Repair Services</h4>
        <h2>Up to <span>70% Off</span> - All t-Shirts & Accessories</h2>
        <button class="normal">Explore More</button>
    </section>


    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>crazy deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>The best classic dress is on sale at cara</span>
            <button class="white">Learn More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>spring/summer</h4>
            <h2>upcomminh season</h2>
            <span>The best classic dress is on sale at cara</span>
            <button class="white">Collection</button>
        </div>
        
    </section>

    <section id="banner3">
        <div class="banner-box">
            <h2>SEASON SALE</h2>
            <h3>Winter Collection -50% OFF</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>NEW FOOTWEAR COLLECTION</h2>
            <h3>WSpring / Summer 2022</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>T-SHIRTS</h2>
            <h3>New Trendy Prints</h3>
        </div>
    </section>

    

    <script src="./js/script.js"></script>


</body>

</html>