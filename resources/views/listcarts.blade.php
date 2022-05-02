<?php

use Illuminate\Support\Facades\DB;
?>

@include('frontend_inc.header')
        <div class="container">
            <div style="margin-bottom: 30px; margin-top: 10px; position: -webkit-sticky; position: sticky;">
                <button id="save-order" class="btn btn-primary" type="button">Đặt vé</button>
                <button id="destroy-ticket" class="btn btn-danger" type="button">Xoá tất cả</button>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Mã chuyến đi</th>
                        <th scope="col">Chuyến </th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá tiền</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $order)
                    @if ($order != null)
                    <tr>
                        <th scope="row">{{ $order['id'] }}</th>
                        <td>
                            @php
                            $tripname_id_arr = DB::table('trip')->where('trip_id', '=', $order['id'])->get();
                            $tripname_id = (int)$tripname_id_arr['0']->tripName_id;
                            $departure = DB::table('tripdetail')->where('tripName_id', '=', $tripname_id)->get();
                            echo $departure['0']->departure .' - ' .$departure['0']->destination;
                            @endphp
                        </td>
                        <td>{{ $order['quantity'] }}</td>
                        <td>{{ $order['price'] }}</td>
                        <td>
                         
                        </td>
                    </tr>
                    @endif
                    @endforeach
                <tfoot>
                    <tr>
                        <td style="text-align: center; font-weight: bold;" colspan="3">Tổng giá tiền</td>
                        <td id="user-payment" style="font-weight: bold;" colspan="2">
                            @php
                            $payment = 0;
                            foreach ($_SESSION['carts'] as $ct) {
                            if ($ct != null) {
                            $payment += (float)$ct['price'];
                            }
                            }
                            echo $payment;
                            @endphp
                        </td>
                    </tr>
                </tfoot>
                </tbody>
            </table>
        </div>
    </div>
    <script src="/js/header.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#destroy-ticket').click(function() {
            let orderEles = document.querySelectorAll('tbody tr');
            for (let i = 0; i < orderEles.length; ++i) {
                orderEles[i].style.display = 'none';
            }
            document.querySelectorAll('tfoot tr td')[1].innerHTML = '';

            $.ajax({
                type: 'GET',
                url: '{{ route("frontend.main.destroysession") }}',
                data: {
                    method: 'delete'
                },
                success: function(data) {
                    if (data) {
                        alert('Xoá thành công');
                    }
                }
            });
        });

        // let delEles = document.querySelectorAll('tbody tr button');
        // for (let i =  0; i < delEles.length; ++i) {
        //     delEles[i].addEventListener('click', (event) => {
        // $.ajax({
        //     type: 'GET', 
        //     url: '{{ route("frontend.main.deleteticket") }}',
        //     data:  {_method: 'delete', _id: delEles[i].id},
        //     success: function(data) {
        //         if (data) {
        //             delEles[i].parentElement.parentElement.style.visibility = 'hidden';
        //         } else {
        //             alert('Lỗi không xoá được!');
        //         }
        //     }
        // });
        //     });
        // }
        // $('tbody tr button').each(function(index) {
        //     $(this).click(function() {
        //         let userpaymentEle = document.querySelector('#user-payment');
        //         userpaymentEle.textContent = (parseInt(userpaymentEle.innerHTML) - parseInt($(this).parent().parent().children('tr:nth-child(3)').innerHTML)).toString();
        //         $.ajax({
        //             type: 'GET',
        //             url: '{{ route("frontend.main.deleteticket") }}',
        //             data: {
        //                 _method: 'delete',
        //                 _id: $(this).attr('id')
        //             },
        //             success: function(data) {
        //                 if (data) {
        //                     $(this).parent().parent().remove();
        //                 } else {
        //                     alert('Lỗi không xoá được!');
        //                 }
        //                 console.log(data);
        //             }
        //         });
        //     });
        // });
        // continue //
        document.getElementById('save-order').addEventListener('click', function() {
            $.post('{{ route("frontend.main.bookticket") }}', {_method: 'post'}, (response) => {
                alert('Đặt thành công!');
                console.log(response);
            }); 
        });
    });
</script>

</html>