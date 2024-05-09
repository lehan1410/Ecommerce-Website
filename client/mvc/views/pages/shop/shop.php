<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech2etc Ecommerce Tutorial</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="./mvc/assets/css/style.css">
    <!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
</head>

<section id="page-header">

    <h2>#stayhome</h2>
    <p>Save more with coupons & up to 70% off!</p>

</section>

<body>
    <div class="shop">
        <div class="filter">
            <div class="box">
                <!-- <h3>Price <span>Range</span></h3> -->
                <div class="values">
                    <div>$<span id="first"></span></div> - <div>$<span id="second"></span></div>
                </div>
                <small>
                    Current Range:
                    <div>$<span id="third"></span></div>
                </small>

                <div class="slider" data-value-0="#first" data-value-1="#second" data-range="#third"></div>
            </div>
            <div class="category">
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
        <section id="product1" class="section-p1">
            <div class="pro-container">
                <?php foreach($data as $index => $product): ?>
                <div class="pro">
                    <img src=" <?php echo $product['image']; ?>" alt="Product Image">
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
                    <a href="#" name="cart" data-product_id="<?php echo $product['product_id']; ?>"><i
                            class="fal fa-shopping-cart cart"></i></a>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>

    <!-- <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"> <i class="fal fa-long-arrow-alt-right"></i></a>

    </section> -->

    <!-- <script src="../js/script.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
    $(document).ready(function() {
        $('a[name="cart"]').click(function(e) {
            e.preventDefault();

            var productId = $(this).data('product_id');

            $.ajax({
                url: 'addtocart.php',
                method: 'POST',
                data: {
                    product_id: productId,
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
    $(function() {
        $("#slider").slider({
            range: true,
            min: 0,
            max: 500,
            values: [75, 300],
            slide: function(event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            },
            stop: function(event, ui) {
                loadProducts(ui.values[0], ui.values[1], $('#category').val());
            }
        });

        $("#amount").val("$" + $("#slider-range").slider("values", 0) +
            " - $" + $("#slider-range").slider("values", 1));

        $('#category').change(function() {
            loadProducts($("#slider-range").slider("values", 0), $("#slider-range").slider("values", 1),
                $(this).val());
        });
    });

    function loadProducts(minPrice, maxPrice, category) {
        $.ajax({
            url: './mvc/controllers/getProducts.php',
            method: 'POST',
            data: {
                min_price: minPrice,
                max_price: maxPrice,
                category: category
            },
            success: function(data) {
                $('#products').html(data);
            }
        });
    }
    </script>
    <script>
    $('.slider').each(function(e) {

        var slider = $(this),
            width = slider.width(),
            handle,
            handleObj;

        let svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
        svg.setAttribute('viewBox', '0 0 ' + width + ' 83');

        slider.html(svg);
        slider.append($('<div>').addClass('active').html(svg.cloneNode(true)));

        slider.slider({
            range: true,
            values: [10, 200],
            min: 10,
            step: 5,
            minRange: 50,
            max: 200,
            create(event, ui) {

                slider.find('.ui-slider-handle').append($('<div />'));

                $(slider.data('value-0')).html(slider.slider('values', 0).toString().replace(
                    /\B(?=(\d{3})+(?!\d))/g, '&thinsp;'));
                $(slider.data('value-1')).html(slider.slider('values', 1).toString().replace(
                    /\B(?=(\d{3})+(?!\d))/g, '&thinsp;'));
                $(slider.data('range')).html((slider.slider('values', 1) - slider.slider('values', 0))
                    .toString().replace(/\B(?=(\d{3})+(?!\d))/g, '&thinsp;'));

                setCSSVars(slider);

            },
            start(event, ui) {

                $('body').addClass('ui-slider-active');

                handle = $(ui.handle).data('index', ui.handleIndex);
                handleObj = slider.find('.ui-slider-handle');

            },
            change(event, ui) {
                setCSSVars(slider);
            },
            slide(event, ui) {

                let min = slider.slider('option', 'min'),
                    minRange = slider.slider('option', 'minRange'),
                    max = slider.slider('option', 'max');

                if (ui.handleIndex == 0) {
                    if ((ui.values[0] + minRange) >= ui.values[1]) {
                        slider.slider('values', 1, ui.values[0] + minRange);
                    }
                    if (ui.values[0] > max - minRange) {
                        return false;
                    }
                } else if (ui.handleIndex == 1) {
                    if ((ui.values[1] - minRange) <= ui.values[0]) {
                        slider.slider('values', 0, ui.values[1] - minRange);
                    }
                    if (ui.values[1] < min + minRange) {
                        return false;
                    }
                }

                $(slider.data('value-0')).html(ui.values[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                    '&thinsp;'));
                $(slider.data('value-1')).html(ui.values[1].toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                    '&thinsp;'));
                $(slider.data('range')).html((slider.slider('values', 1) - slider.slider('values', 0))
                    .toString().replace(/\B(?=(\d{3})+(?!\d))/g, '&thinsp;'));

                setCSSVars(slider);

            },
            stop(event, ui) {

                // $('body').removeClass('ui-slider-active');

                // let duration = .6,
                //     ease = Elastic.easeOut.config(1.08, .44);

                // TweenMax.to(handle, duration, {
                //     '--y': 0,
                //     ease: ease
                // });

                // TweenMax.to(svgPath, duration, {
                //     y: 42,
                //     ease: ease
                // });

                handle = null;

            }
        });

        var svgPath = new Proxy({
            x: null,
            y: null,
            b: null,
            a: null
        }, {
            set(target, key, value) {
                target[key] = value;
                if (target.x !== null && target.y !== null && target.b !== null && target.a !==
                    null) {
                    slider.find('svg').html(getPath([target.x, target.y], target.b, target.a,
                        width));
                }
                return true;
            },
            get(target, key) {
                return target[key];
            }
        });

        svgPath.x = width / 2;
        svgPath.y = 42;
        svgPath.b = 0;
        svgPath.a = width;

        // $(document).on('mousemove touchmove', e => {
        //     if (handle) {

        //         let laziness = 4,
        //             max = 24,
        //             edge = 52,
        //             other = handleObj.eq(handle.data('index') == 0 ? 1 : 0),
        //             currentLeft = handle.position().left,
        //             otherLeft = other.position().left,
        //             handleWidth = handle.outerWidth(),
        //             handleHalf = handleWidth / 2,
        //             y = e.pageY - handle.offset().top - handle.outerHeight() / 2,
        //             moveY = (y - laziness >= 0) ? y - laziness : (y + laziness <= 0) ? y + laziness : 0,
        //             modify = 1;

        //         moveY = (moveY > max) ? max : (moveY < -max) ? -max : moveY;
        //         modify = handle.data('index') == 0 ? ((currentLeft + handleHalf <= edge ? (currentLeft +
        //             handleHalf) / edge : 1) * (otherLeft - currentLeft - handleWidth <= edge ? (
        //             otherLeft - currentLeft - handleWidth) / edge : 1)) : ((currentLeft - (
        //             otherLeft + handleHalf * 2) <= edge ? (currentLeft - (otherLeft +
        //             handleWidth)) / edge : 1) * (slider.outerWidth() - (currentLeft +
        //             handleHalf) <= edge ? (slider.outerWidth() - (currentLeft +
        //             handleHalf)) / edge : 1));
        //         modify = modify > 1 ? 1 : modify < 0 ? 0 : modify;

        //         if (handle.data('index') == 0) {
        //             svgPath.b = currentLeft / 2 * modify;
        //             svgPath.a = otherLeft;
        //         } else {
        //             svgPath.b = otherLeft + handleHalf;
        //             svgPath.a = (slider.outerWidth() - currentLeft) / 2 + currentLeft + handleHalf + ((
        //                 slider.outerWidth() - currentLeft) / 2) * (1 - modify);
        //         }

        //         svgPath.x = currentLeft + handleHalf;
        //         svgPath.y = moveY * modify + 42;

        //         handle.css('--y', moveY * modify);

        //     }
        // });

    });

    function getPoint(point, i, a, smoothing) {
        let cp = (current, previous, next, reverse) => {
                let p = previous || current,
                    n = next || current,
                    o = {
                        length: Math.sqrt(Math.pow(n[0] - p[0], 2) + Math.pow(n[1] - p[1], 2)),
                        angle: Math.atan2(n[1] - p[1], n[0] - p[0])
                    },
                    angle = o.angle + (reverse ? Math.PI : 0),
                    length = o.length * smoothing;
                return [current[0] + Math.cos(angle) * length, current[1] + Math.sin(angle) * length];
            },
            cps = cp(a[i - 1], a[i - 2], point, false),
            cpe = cp(point, a[i - 1], a[i + 1], true);
        return `C ${cps[0]},${cps[1]} ${cpe[0]},${cpe[1]} ${point[0]},${point[1]}`;
    }

    function getPath(update, before, after, width) {
        let smoothing = .16,
            points = [
                [0, 42],
                [before <= 0 ? 0 : before, 42],
                update,
                [after >= width ? width : after, 42],
                [width, 42]
            ],
            d = points.reduce((acc, point, i, a) => i === 0 ? `M ${point[0]},${point[1]}` :
                `${acc} ${getPoint(point, i, a, smoothing)}`, '');
        return `<path d="${d}" />`;
    }

    function setCSSVars(slider) {
        let handle = slider.find('.ui-slider-handle');
        slider.css({
            '--l': handle.eq(0).position().left + handle.eq(0).outerWidth() / 2,
            '--r': slider.outerWidth() - (handle.eq(1).position().left + handle.eq(1).outerWidth() / 2)
        });
    }
    </script>
</body>