<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Quản Lý Mã Giảm Giá</h4>
    </div>

    <div class="px-5">
        <div class="d-flex justify-content-between mt-5">
            <div class="d-flex">
                <a class="btn btn-danger" href="http://localhost:8080/Ecommerce-Website/admin/coupon/add">Thêm Mã
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>

        </div>

        <table class="mt-5 table table-striped">
            <thead>
                <th>STT</th>
                <th>Mã Giảm Giá</th>
                <th>Giảm Giá</th>
                <th>Ngày Bắt Đầu</th>
                <th>Ngày Kết Thúc</th>
                <th>Thao Tác</th>
            </thead>

            <tbody>
            <?php foreach($data as $index => $category): ?>
                <td><?php echo $category['product_id']; ?></td>
            <?php endforeach; ?>
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ coupon.name }}</td>
                    <td>{{ coupon.discount }}%</td>
                    <td>{{ coupon.createdAt | date: "dd-MM-yyyy" }}</td>
                    <td>{{ coupon.expiry | date: "dd-MM-yyyy"}}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="#!/coupon/edit/{{ coupon._id }}">
                            <i class="fa-solid fa-edit"></i>
                        </a>
                        <button class="btn btn-sm btn-danger" ng-click="deleteCoupon(coupon._id)">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>