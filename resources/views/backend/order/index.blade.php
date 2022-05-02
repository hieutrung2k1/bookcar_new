@include('backend.inc.header')
<div class="container">
    <h2>Danh sách đơn hàng</h2>
    <div style="margin-bottom: 10px; display: flex; flex-direction: row; background-color: white;">
        <select style="text-align: center; margin-right: 10px; height: 34px; width: 150px" name="status" id="status">
            <option value="" selected>-- Trạng thái --</option>
            @foreach ($status as $st)
            <option value="">{{ $st->status }}</option>
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
            $.get("{{ route('backend.order.filter') }}", {
                item: item
            }, (response) => {
                if (response) {
                    location.reload();
                    // console.log(response);
                }
            });
        });
    </script>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Số lượng đặt</th>
                <th scope="col">Giá tiền</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($_SESSION['filter_data']))
            @foreach ($_SESSION['filter_data'] as $dt)
            <tr>
                <th scope="row">{{ $dt->orderNumber }}</th>
                <td>{{ $dt->orderDate }}</td>
                <td>{{ $dt->status }}</td>
                <td>{{ $dt->quantityOrder }}</td>
                <td>{{ $dt->price }}</td>
                <td><a class="btn btn-primary" href="{{ route('backend.order.show', ['id' => $dt->orderNumber]) }}" role="button">Chi tiết</a></td>
            </tr>
            @endforeach
            @php
            $_SESSION['filter_data'] = [];
            @endphp
            @else
            @foreach ($order_detail as $order)
            <tr>
                <th scope="row">{{ $order->orderNumber }}</th>
                <td>{{ $order->orderDate }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->quantityOrder }}</td>
                <td>{{ $order->price }}</td>
                <td><a class="btn btn-primary" href="{{ route('backend.order.show', ['id' => $order->orderNumber]) }}" role="button">Chi tiết</a></td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
</body>

</html>