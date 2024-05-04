<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Quản Lý Đơn Hàng</h4>
    </div>

    <div class="px-5">
        <table class="table table-striped my-5">
            <thead>
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Người Đặt</th>
                    <th>Ngày Đặt</th>
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="order in orders">
                    <td>{{ order._id }}</td>
                    <td>{{ order.name }}</td>
                    <td>{{ order.createdAt | date: "HH:mm:ss dd-MM-yyyy" }}</td>
                    <td>
                        <span class="badge text-bg-secondary" ng-if="order.status === 'Chờ Xác Nhận'">Chờ Xác
                            Nhận</span>
                        <span class="badge text-bg-primary" ng-if="order.status === 'Đã Xác Nhận'">Đã Xác
                            Nhận</span>
                        <span class="badge text-bg-info" ng-if="order.status === 'Đang Vận Chuyển'">Đang Vận
                            CHuyển</span>
                        <span class="badge text-bg-success" ng-if="order.status === 'Đã Giao Hàng'">Đã Giao
                            Hàng</span>
                        <span class="badge text-bg-danger" ng-if="order.status === 'Đã Hủy'">Đã Hủy</span>
                    </td>
                    <td>
                        <a href="http://localhost:8080/Ecommerce-Website/admin/order/detail" class="btn btn-sm btn-danger">Xem</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>