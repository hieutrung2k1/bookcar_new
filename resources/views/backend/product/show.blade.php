@include('backend.inc.header')
    <div class="container mt-5">
        <h2>Chi tiết chuyến đi số {{ $id }}</h2>
        <hr />
        <div class="w-100" style="border: 1px green solid; box-sizing: border-box; padding: 10px 15px">
            <p>Mã chuyến đi: {{ $id }}</p>
            <p>Ngày đi: {{ date("d-m-Y", strtotime($ticket_detail[$id-1]->productDate)) }}</p>
            <p>Chuyến đi: {{ $ticket_detail[$id-1]->departure }} - {{ $ticket_detail[$id-1]->destination }}</p>
            <p>Điểm đón: {{ $ticket_detail[$id-1]->address_pick }}</p>
            <p>Điểm trả: {{ $ticket_detail[$id-1]->address_pay }}</p>
            <p>Loại xe: {{ $ticket_detail[$id-1]->media_type_name }}</p>
            <p>Giá vé: {{ $ticket_detail[$id-1]->buyPrice }} VND/vé</p> 
        </div>
    </div>
</body>

</html>