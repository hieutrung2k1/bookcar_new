@include('backend.inc.header')
    <div class="container mt-5">
        <h2>Chi tiết người dùng số {{ $id }}</h2>
        <hr />
        <div class="w-100" style="border: 1px green solid; box-sizing: border-box; padding: 10px 15px">
            <p>Mã người dùng: {{ $user_detail[$id-1]->customerNumber }}</p>
            <p>Họ tên: {{ $user_detail[$id-1]->customerName }}</p>
            <p>Giới tính: {{ $user_detail[$id-1]->sex }}</p>
            <p>Ngày sinh: {{ $user_detail[$id-1]->dob }}</p>
            <p>Email: {{ $user_detail[$id-1]->email }}</p>
            <p>Số điện thoại: {{ $user_detail[$id-1]->phone }}</p>
            <p>Địa chỉ: {{ $user_detail[$id-1]->address }}</p>
            <p>Ngày đặt vé: {{ $user_detail[$id-1]->orderDate }}</p>
            <p>Trạng thái: {{ $user_detail[$id-1]->status }}</p>
            <p>Phản hồi: {{ $user_detail[$id-1]->comment }}</p>
            <p>Số lượng đặt: {{ $user_detail[$id-1]->quantityOrder }}</p>
            <p>Tổng giá: {{ $user_detail[$id-1]->price }}</p>

            @if (!empty($user_detail[$id-1]->orderNumber))
            <a href="{{ route('backend.order.show', ['id' => $user_detail[$id-1]->orderNumber]) }}">Mã đơn hàng: {{ $user_detail[$id-1]->orderNumber }}</a>
            @else
            <p>Mã đơn hàng: {{ $user_detail[$id-1]->orderNumber }}</p>
            @endif
        </div>
    </div>
</body>

</html>