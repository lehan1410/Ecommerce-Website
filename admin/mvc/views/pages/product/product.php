<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Quản Lý Sản Phẩm</h4>
    </div>

    <div class="px-5">
        <div class="d-flex justify-content-between align-items-center mt-5">
            <a href="http://localhost:8080/Ecommerce-Website/admin/product/add" class="btn btn-danger">Thêm Sản Phẩm Mới
                <i class="fas fa-plus"></i>
            </a>
        </div>


        <table class="table table-striped my-5">
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Loại Sản Phẩm</th>
                    <th>Giá Gốc</th>
                    <th>Giảm Giá</th>
                    <th>Flash Sale</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>


            <tbody>
                <?php foreach($data as $index => $product): ?>
                <tr>
                    <td>
                        <img src="<?php echo $product['image']; ?>" class="img-fluid" style="width: 50px;">
                    </td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['category_name']; ?></td>
                    <td><?php echo "$" .  $product['price']; ?></td>
                    <td><?php echo ($product['discount'] ?? 0) . "%"; ?></td>
                    <td>
                        <input type="checkbox">
                    </td>
                    <td>
                        <button class="btn btn-danger" ng-click="deleteProduct(product)">
                            <i class="fas fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProductModal">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                    <!-- <td>
                        <a class="btn btn-primary" href="http://localhost:8080/Ecommerce-Website/admin/category/viewDetail/<?php echo $category['category_id']; ?>">
                            <i class="fas fa-eye"></i>
                        </a>
                        <button class="remove btn btn-danger" data-category-id="<?php echo $category['category_id']; ?>">
                            <i class="fas fa-trash-alt"></i>
                        </button> -->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>