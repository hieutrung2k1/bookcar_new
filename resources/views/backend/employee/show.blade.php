@include('backend.inc.header')
    <div class="container mt-5">
        <h2>Chi tiết nhân viên số {{ $id }}</h2>
        <hr />
        <div class="w-100" style="border: 1px green solid; box-sizing: border-box; padding: 10px 15px">
            <p>Mã nhân viên: {{ $employee_detail[$id-1]->employeeNumber }}</p>
            <p>Họ tên: {{ $employee_detail[$id-1]->employeeName }}</p>
            <p>Mã gara: {{ $employee_detail[$id-1]->gara_id }}</p>
            <p>Số điện thoại nhà xe: {{ $employee_detail[$id-1]->phone }}</p>
            <p>Mô tả về nhà garage: {{ $employee_detail[$id-1]->garageDescription }}</p>
            <p>Số điện thoại nhân viên: {{ $employee_detail[$id-1]->phoneNumber }}</p>
        </div>
    </div>
</body>

</html>