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
                    echo '<tr>';
                    echo "</td>";
                    echo "<td>";
                    echo '<a class="remove btn btn-danger" data-cart-id="'.$cart["cart_id"].'"><i class="fas fa-trash-alt"></i></a>';

                    echo '<a class="update btn btn-primary">';
                    echo '<i class="fa-solid fa-check"></i>';
                    echo '</a>';
                    echo "</td>";
                  
                    echo '<td><img src="' . $cart['image'] . '"></td>';
                    echo '<td>' . $cart['name'] . '</td>';
                    echo '<td>' . $cart['price'] . '</td>';
                    echo '<td>' . $cart['quantity'] . '</td>';
                    echo '</tr>';
                }
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
                    <td>
                        <?php
                    $grandTotal = 0;
                    foreach ($data as $index => $cart) {
                        $total = $cart['quantity'] * $cart['price'];
                        $grandTotal += $total;
                    }
                    echo "$ " . number_format($grandTotal, 2);
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>
                        <select id="shippingMethod">
                            <option value="Thường">Thường</option>
                            <option value="Hỏa tốc">Hỏa tốc</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong id="total">
                            <?php
                        echo "$ " . number_format($grandTotal, 2);
                        ?>
                        </strong></td>
                </tr>
            </table>
            <button class="normal">Proceed to checkout</button>
        </div>

    </section>
</body>

</html>
<script>
document.getElementById('shippingMethod').addEventListener('change', function() {
    var grandTotal = <?php echo $grandTotal; ?>;
    var quantity = <?php echo array_sum(array_column($data, 'quantity')); ?>;
    if (this.value == 'Hỏa tốc') {
        grandTotal += quantity;
    }
    document.getElementById('total').textContent = "$ " + grandTotal.toFixed(2);
});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('.remove').click(function(e) {
        var id = $(this).data('cart-id');
        $.ajax({
            url: 'http://localhost:8080/Ecommerce-Website/client/cart/remove/' + id,
            type: 'get',
            success: function(data) {
                // alert(response);
                location.reload();
            }
        });
    });
});
</script>