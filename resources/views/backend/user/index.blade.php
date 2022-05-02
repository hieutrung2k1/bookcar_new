@include('backend.inc.header')
<div class="container">
    <h2>Danh sách khách hàng</h2>
    <div style="margin-bottom: 10px; display: flex; flex-direction: row; background-color: white;">
        <select style="text-align: center; margin-right: 10px; height: 34px; width: 150px" name="status" id="status">
            <option value="" selected>-- Trạng thái --</option>
            @foreach ($status as $st)
            @if ($st != null) 
            <option value="">{{ $st->status }}</option>
            @endif
            @endforeach
        </select>
        <button class="btn btn-primary" type="button" id="btn-filter">Tìm kiếm</button>
    </div>
    <script>
        $('#btn-filter').click(function() {
            let statusEle = document.getElementById('status');
            let status = statusEle.options[statusEle.selectedIndex].text;
            let item = {};
            item.status = status;
            $.get("{{ route('backend.user.filter') }}", {
                item: item
            }, (response) => {
                // console.log(response);
                if (response) {
                    location.reload();
                }
            });
        });
    </script>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($_SESSION['filter_data']))
            @foreach ($_SESSION['filter_data'] as $dt)
            <tr>
                <th scope="row">{{ $dt->customerNumber }}</th>
                <td>{{ $dt->customerName }}</td>
                <td>{{ $dt->orderNumber }}</td>
                <td>{{ $dt->status }}</td>
                <td>{{ $dt->phone }}</td>
                <td><a class="btn btn-primary" href="{{ route('backend.user.show', ['id' => $dt->customerNumber]) }}" role="button">Chi tiết</a></td>
            </tr>
            @endforeach
            @php
            $_SESSION['filter_data'] = [];
            @endphp
            @else
            @foreach ($user_detail as $user)
            <tr>
                <th scope="row">{{ $user->customerNumber }}</th>
                <td>{{ $user->customerName }}</td>
                <td>{{ $user->orderNumber }}</td>
                <td>{{ $user->status }}</td>
                <td>{{ $user->phone }}</td>
                <td><a class="btn btn-primary" href="{{ route('backend.user.show', ['id' => $user->customerNumber]) }}" role="button">Chi tiết</a></td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
</body>

</html>