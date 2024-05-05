<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Quản Lý Người Dùng</h5>
    </div>

    <div class="px-5">

        <div class="d-flex justify-content-between align-items-center mt-5">
            <a href="http://localhost:8080/Ecommerce-Website/admin/user/add" class="btn btn-danger">Thêm Người Dùng Mới
                <i class="fas fa-plus"></i>
            </a>
        </div>

        <table class="table table-striped mt-5">
            <thead>
                <th>STT</th>
                <th>Tên Người Dùng</th>
                <th>Email</th>
                <th>Ngày Tạo</th>
                <th>Khoá</th>
                <th>Uỷ Quyền</th>
                <th>Thao Tác</th>
            </thead>
            <tbody>
                <tr ng-repeat="user in displayedUsers">
                    <td>{{$index + 1}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.createdAt | date : 'dd-MM-yyyy'}}</td>
                    <td>
                        <input type="checkbox" ui-switchery ng-model="user.isBlocked" ng-change="changeStatus(user)" />
                    </td>
                    <td>
                        <span ng-if="user.role === 'admin'">Quản Trị Viên</span>
                        <span ng-if="user.role === 'user'">Khách Hàng</span>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-danger" ng-click="deleteUser(user)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="w-100 d-flex align-items-center justify-content-center mt-3">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-danger">

                    <li ng-repeat="page in pages" class="page-item" ng-class="{active: page === currentPage}">
                        <a href="" class="page-link" ng-click="setCurrentPage(page)">{{ page }}</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>