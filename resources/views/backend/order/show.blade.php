@include('backend.inc.header')
    <div class="container mt-5">
        <h2>Chi tiết đơn hàng số {{ $id }}</h2>
        <hr />
        <div class="w-100" style="border: 1px green solid; box-sizing: border-box; padding: 10px 15px">
            <p>Mã đơn hàng: {{ $order_detail[$id-1]->orderNumber }}</p>
            <p>Ngày đặt: {{ $order_detail[$id-1]->orderDate }}</p>
            <p>Trạng thái: {{ $order_detail[$id-1]->status }}</p>
            <p>Phản hồi: {{ $order_detail[$id-1]->comment }}</p>
            <p>Số lượng đặt: {{ $order_detail[$id-1]->quantityOrder }}</p>
            <p>Tổng giá: {{ $order_detail[$id-1]->price }}</p>
            <a href="{{ route('backend.user.show', ['id' => $order_detail[$id-1]->customerNumber]) }}">Mã khách hàng: {{ $order_detail[$id-1]->customerNumber }}</a>
        </div>
    </div>
</body>

</html>