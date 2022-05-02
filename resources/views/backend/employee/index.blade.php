@include('backend.inc.header')
    <div class="container">
        <h2>Danh sách nhân viên</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Mã nhân viên</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Mã gara</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $emp)
                <tr>
                    <th scope="row">{{ $emp->employeeNumber }}</th>
                    <td>{{ $emp->employeeName }}</td>
                    <td>{{ $emp->sex }}</td>
                    <td>{{ $emp->phoneNumber }}</td>
                    <td>{{ $emp->gara_id }}</td>
                    <td><a class="btn btn-primary" href="{{ route('backend.employee.show', ['id' => $emp->employeeNumber]) }}" role="button">Chi tiết</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>