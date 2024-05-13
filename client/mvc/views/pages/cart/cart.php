<link rel="stylesheet" href="../mvc/assets/css/style.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

<body>
    <section id="page-header" class="about-header">
        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE, We love to hear from you !</p>
    </section>

    <section id="cart" class="section-p1">
        <table>
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($data as $index => $cart) {
                    // echo '<tr>
                    // <td><a href="remove_from_cart.php?id=' . $cart['product_id'] . '">Remove</a></td>
                    // <td><img src="' . $cart['image'] . '" alt="' . $cart['name'] . '"></td>
                    // <td>' . $cart['name'] . '</td>
                    // <td>' . $cart['price'] . '</td>
                    // <td>' . $cart['quantity'] . '</td>
                    // </tr>';
                    echo '<tr>
                    <td><a href="remove_from_cart.php?id=' . $cart['order_id'] . '">Remove</a></td>
                    <td><img src="' . $cart['order_id'] . '" alt="' . $cart['order_id'] . '"></td>
                    <td>' . $cart['order_id'] . '</td>
                    <td>' . $cart['order_id'] . '</td>
                    <td>' . $cart['order_id'] . '</td>
                    </tr>';
                }
            ?>
                
                <?php
                ?>
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
</body>

</html>