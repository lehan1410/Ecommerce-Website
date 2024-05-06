<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech2etc Ecommerce Tutorial</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"> -->
    <link rel="stylesheet" href="../mvc/assets/css/style.css">
</head>

<body>
    <section id="page-header" class="about-header">

        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE, We love to hear from you !</p>

    </section>

    <section id="cart" class="section-p1">
        <table width="100%">
        <thead>
        <tr>
            <td>Remove</td>
            <td>Image</td>
            <td>Product</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Subtotal</td>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="#"><i class="far fa-times-circle"></i></a></td>
                <td><img src="./mvc/assets/imgproducts/f1.jpg" alt=""></td>
                <td>Cartoon Astronaut T-Shirts</td>
                <td><input type="number" value="1"></td>
                <td>$118.19</td>

            </tr>
            <tr>
                <td><a href="#"><i class="far fa-times-circle"></i></a></td>
                <td><img src="./mvc/assets/imgproducts/f2.jpg" alt=""></td>
                <td>Cartoon Astronaut T-Shirts</td>
                <td><input type="number" value="1"></td>
                <td>$118.19</td>

            </tr>
            <tr>
                <td><a href="#"><i class="far fa-times-circle"></i></a></td>
                <td><img src="./mvc/assets/imgproducts/f3.jpg" alt=""></td>
                <td>Cartoon Astronaut T-Shirts</td>
                <td><input type="number" value="1"></td>
                <td>$118.19</td>

            </tr>
        </tbody>
        </table>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="coupon">
        <h3>Apply Coupon</h3>
            <div>
                <input type="text" placeholder="Enter Your Coupon">
                <button class="normal">Apply</button>
            </div>
        </div>

        <div id="subtotal">
            <h3>Cart Totals</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td>$ 335</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>$ 335</strong></td>

                </tr>
            </table>
            <button class="normal">Proceed to checkout</button>
        </div>
        
    </section>

    <script src="./js/script.js"></script>
</body>

</html>