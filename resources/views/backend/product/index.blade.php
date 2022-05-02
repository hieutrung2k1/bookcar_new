@include('backend.inc.header')
<div class="container">
    <h2>Danh sách vé</h2>
    <div style="margin-bottom: 10px; display: flex; flex-direction: row; background-color: white;">
        <select style="text-align: center; margin-right: 10px; height: 34px; width: 150px" name="departure" id="departure">
            <option value="" selected>-- Điểm bắt đầu --</option>
            @foreach ($departure as $dep)
            <option value="t">{{ $dep->departure }}</option>
            @endforeach
        </select>
        <select style="text-align: center; margin-right: 10px; height: 34px; width: 150px" name="destination" id="destination">
            <option value="" selected>-- Điểm đến --</option>
            @foreach ($destination as $des)
            <option value="">{{ $des->destination }}</option>
            @endforeach
        </select>
        <input style="width: 200px; margin-right: 10px" type="date" id="dat">
        <button class="btn btn-primary" type="button" id="btn-filter">Tìm kiếm</button>
    </div>
    <script>
        $('#btn-filter').click(function() {
            let departureEle = document.getElementById('departure');
            let dep = departureEle.options[departureEle.selectedIndex].text;
            let destinationEle = document.getElementById('destination');
            let des = destinationEle.options[destinationEle.selectedIndex].text;
            let dateEle = document.getElementById('dat');
            let date = dateEle.value;
            let item = {};
            item.dep = dep;
            item.des = des;
            item.date = date;
            $.get("{{ route('backend.product.filter') }}", {
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
                <th scope="col">Mã chuyến đi</th>
                <th scope="col">Loại xe</th>
                <th scope="col">Ngày đi</th>
                <th scope="col">Chuyến đi</th>
                <th scope="col">Giá tiền/1 vé</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($_SESSION['filter_data']))
            @foreach ($_SESSION['filter_data'] as $dt)
            <tr>
                <th scope="row">{{ $dt->trip_id }}</th>
                <td>{{ $dt->media_type_name }}</td>
                <td>{{ $dt->productDate }}</td>
                <td>{{ $dt->departure }} - {{ $dt->destination }}</td>
                <td>{{ $dt->buyPrice }}</td>
                <td><a class="btn btn-primary" href="{{ route('backend.product.show', ['id' => $dt->trip_id]) }}" role="button">Chi tiết</a></td>
            </tr>
            @endforeach
            @php 
            $_SESSION['filter_data'] = [];
            @endphp
            @else
            @foreach ($ticket_detail as $ticket)
            <tr>
                <th scope="row">{{ $ticket->trip_id }}</th>
                <td>{{ $ticket->media_type_name }}</td>
                <td>{{ $ticket->productDate }}</td>
                <td>{{ $ticket->departure }} - {{ $ticket->destination }}</td>
                <td>{{ $ticket->buyPrice }}</td>
                <td><a class="btn btn-primary" href="{{ route('backend.product.show', ['id' => $ticket->trip_id]) }}" role="button">Chi tiết</a></td>
            </tr>

            @endforeach
            @endif

        </tbody>
    </table>
</div>
</body>

</html>