<div class="content">
    <div class="px-5">

        <form class="mt-5" ng-show="showAddCategoryForm" ng-submit="addCategory()">
            <div class="mb-3 w-25">
                <label for="categoryName" class="form-label">Tên Danh Mục</label>
                <input type="text" class="form-control" id="categoryName" ng-model="categoryName">
            </div>

            <button type="submit" class="btn btn-danger">Thêm Danh Mục</button>
        </form>
    </div>
</div>