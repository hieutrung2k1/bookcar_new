@include('frontend_inc.header')
        <form action="{{route('ticket')}}" method="GET">
            <div class="search">
                <div class="search-bar">
                    <div class="search-bar-item">
                        <span><i class="fas fa-map-marker-alt search-bar-item-icon"></i></span>
                        <input type="text" class="search-bar-item-input border-right" placeholder="Nhập tỉnh, thành phố đi." value="{{request()->query('dep')}}" name="dep">
                    </div>
                    <div class="search-bar-item">
                        <span><i class="fas fa-map-marker-alt search-bar-item-icon"></i></span>
                        <input type="text" class="search-bar-item-input border-right" placeholder="Nhập tỉnh thành phố đến." value="{{request()->query('des')}}" name="des">
                    </div>
                    <div class="search-bar-item">
                        <span><i class="fas fa-calendar-alt search-bar-item-icon "></i></span>
                        <input type="date" id="" class="search-bar-item-input" value="{{request()->query('date')}}" name="date">
                    </div>
                </div>
                <button class="search-bar-btn">Tìm kiếm</button>
            </div>
        </form>
    </div>
    <div class="ticket-row">
        <h4 class="trip-name">Vé xe khách đi từ {{$arrInput[0]}} đến {{$arrInput[1]}}</h4>
        <div class="ticket-content">
            <div class="filter-search">
                <a id="delete-filter" href="http://127.0.0.1:8000/ticket?dep={{$arrInput[0]}}&des={{$arrInput[1]}}&date={{$arrInput[2]}}">Xóa lọc</a>
                <h4 class="filter-name">Thời Gian</h4>
                <form action="" method="GET">
                    <div class="filter-time">
                        <a class="filter-time-item {{Request::get('t') == "1"?'active' : ''}}" href="{{request()->fullUrlWithQuery(['t'=>'1'])}}">Buổi sớm<br>0:00-6:00</a>
                        <a class="filter-time-item {{Request::get('t') == "2"?'active' : ''}}" href="{{request()->fullUrlWithQuery(['t'=>'2'])}}">Buổi sáng<br>6:00-12:00</a>
                        <a class="filter-time-item {{Request::get('t') == "3"?'active' : ''}}" href="{{request()->fullUrlWithQuery(['t'=>'3'])}}">Buổi chiều<br>12:00-18:00</a>
                        <a class="filter-time-item {{Request::get('t') == "4"?'active' : ''}}" href="{{request()->fullUrlWithQuery(['t'=>'4'])}}">Buổi tối<br>18:00-24:00</a>
                    </div>
                </form>
                <div class="space-line"></div>
                <h4 class="filter-name">Khoảng giá</h4>
                <form action="{{url()->full()}}" method="get">
                    <div class="filter-price">
                        <div class="filter-price-input">
                            <input type="number" class="filter-price-item" placeholder="$Từ" name="từ">
                            <span></span>
                            <input type="number" class="filter-price-item" placeholder="$Đến" name="đến">
                        </div>
                        <div class="filter-price-btn">
                            <button type="submit" value="aaa">Áp Dụng</button>
                        </div>
                    </div>
                </form>

                <div class="space-line"></div>
                <h4 class="filter-name">Nhà xe</h4>
                <div class="filter-type-checkbox">
                    <form action="" method="GET">
                        <div class="filter-garaName-input">
                            <input type="text" id="garaName-input" name="garage" value="">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>

                    <div id="garaName-checkbox" class="filter-checkbox">
                        @foreach ($garageData as $garaItem)
                        <div class="filter-garaname">
                            <input type="checkbox" name="" {{Request::get('g') == $garaItem->gara_id?"checked='checked'" : ''}} id="" value="">
                            <a class="filter-checkbox-after" href="{{request()->fullUrlWithQuery(['g'=>$garaItem->gara_id])}}">Nhà xe {{$garaItem->name}}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="space-line"></div>
                <h4 class="filter-name">Loại xe</h4>
                <div class="filter-type-checkbox">
                    <div id="" class="filter-checkbox">
                        @foreach ($media as $mediaItem)
                        <div class="filter-garaname">
                            <input type="checkbox" name="" id="" {{Request::get('m') == $garaItem->gara_id?"checked='checked'" : ''}}>
                            <span class="filter-checkbox-after">{{$mediaItem->media_type_name}}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="space-line"></div>
                <h4 class="filter-name">Đánh giá</h4>
                <div class="filter-rate filter-type-checkbox">
                    <div id="btn-rate">
                        <button class="btn-rate-item" id="five-stars" onclick="clickStars('five-stars')">
                            @for ($i = 0; $i < 5; $i++) <i class="fas fa-star star-color"></i>
                                @endfor
                        </button>
                        <button class="btn-rate-item" id="four-stars" onclick="clickStars('four-stars')">
                            @for ($i = 0; $i < 4; $i++) <i class="fas fa-star star-color"></i>
                                @endfor
                                <i class="far fa-star star-color"></i>
                                <span class="star-color"> trở lên</span>
                        </button>
                        <button class="btn-rate-item" id="three-stars" onclick="clickStars('three-stars')">
                            <i class="fas fa-star star-color"></i>
                            <i class="fas fa-star star-color"></i>
                            <i class="fas fa-star star-color"></i>
                            <i class="far fa-star star-color"></i>
                            <i class="far fa-star star-color"></i>
                            <span class="star-color"> trở lên</span>
                        </button>
                        <button class="btn-rate-item" id="two-stars" onclick="clickStars('two-stars')">
                            <i class="fas fa-star star-color"></i>
                            <i class="fas fa-star star-color"></i>
                            <i class="far fa-star star-color"></i>
                            <i class="far fa-star star-color"></i>
                            <i class="far fa-star star-color"></i>
                            <span class="star-color"> trở lên</span>
                        </button>
                        <button class="btn-rate-item" id="one-stars" onclick="clickStars('one-stars')">
                            <i class="fas fa-star star-color"></i>
                            <i class="far fa-star star-color"></i>
                            <i class="far fa-star star-color"></i>
                            <i class="far fa-star star-color"></i>
                            <i class="far fa-star star-color"></i>
                            <span class="star-color"> trở lên</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="filter-ticket">
                <div class="total-trip">
                    <span>Đặt mua vé xe từ {{$arrInput[0]}} đi {{$arrInput[1]}} chất lượng cao giá vé ưu đãi.Tổng số chuyến: {{$countTicket}} chuyến</span>
                </div>
                <div class="sort">
                    <span>Sắp xếp theo:</span>
                    <a id="sort-btn1" class="sort-item {{Request::get('sort') == 1?'show-color-btn':''}}" href="{{request()->fullUrlWithQuery(['sort'=>'1'])}}">Giờ sớm nhất</a>
                    <a id="sort-btn2" class="sort-item {{Request::get('sort') == 2?'show-color-btn':''}}" href="{{request()->fullUrlWithQuery(['sort'=>'2'])}}">Giờ muộn nhất</a>
                    <a id="sort-btn3" class="sort-item {{Request::get('sort') == 3?'show-color-btn':''}}" href="{{request()->fullUrlWithQuery(['sort'=>'3'])}}">Giá thấp nhất</a>
                    <a id="sort-btn4" class="sort-item {{Request::get('sort') == 4?'show-color-btn':''}}" href="{{request()->fullUrlWithQuery(['sort'=>'4'])}}">Giá cao nhất</a>
                </div>
                @foreach ($ticket as $ticketItem)
                <div class="ticket-all">
                    <div class="ticket-item" id="ticketDataItem-{{$ticketItem->trip_id}}">
                        <div class="ticket-img"><img src="{{$ticketItem->image}}" alt=""></div>
                        <div class="info-ticket">
                            <div class="info-ticket-gara">
                                <span class="info-ticket-gara-name">Nhà Xe {{$ticketItem->name}} </span>({{$ticketItem->quantityInStock}}/{{$ticketItem->quantity_customer}})
                                <span class="ticket-price">{{$ticketItem->buyPrice}}VNĐ</span>
                            </div>
                            <span>{{$ticketItem->media_type_name}}</span>
                            <div class="time-location">
                                <div class="time-location-data">
                                    <div class="time-location-item time-departure">
                                        <i class="fas fa-dot-circle"></i>
                                        <p>{{$ticketItem->time}}</p>
                                    </div>
                                    <span>Điểm đón: {{$ticketItem->address_pick}}</span>
                                </div>
                                <div class="time-location-data">
                                    <div class="time-location-item time-recipient">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>{{$ticketItem->time_arrival}}</p>
                                    </div>
                                    <span>Điểm trả: {{$ticketItem->address_pay}}</span>
                                </div>

                            </div>
                            <div class="ticket-btn">
                                <div class="ticket-detail">
                                    <button class="btn btn-primary" onclick="detail('#data-{{$ticketItem->trip_id}}', '#order-{{$ticketItem->trip_id}}')"><i class="fas fa-info"></i> Chi tiết</button>
                                </div>
                                <div class="ticket-btn-cart">
                                    <button class="btn btn-warning" onclick="detailOrder('#data-{{$ticketItem->trip_id}}', '#order-{{$ticketItem->trip_id}}')"><i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail-info" id="data-{{$ticketItem->trip_id}}">
                        <div class="ticketDetail">
                            {{-- <div class="detail-space"></div> --}}
                            <div class="garage-detail">
                                <span class="detail-title">Nhà Xe {{$ticketItem->name}}</span><br>
                                <span class="detail-item">- Liên Hệ: {{$ticketItem->phone}}</span><br>
                                <span class="detail-item">- Địa Chỉ: {{$ticketItem->address}}</span><br>
                                <span class="detail-item">- Đánh Giá: {{$ticketItem->rate_garage}}/5 <i class="fas fa-star star-color"></i></span><br>
                            </div>
                            <div class="driver-detail">
                                <span class="detail-title">Tài Xế</span><br>
                                <span class="detail-item">- Họ Tên: {{$ticketItem->employeeName}}</span><br>
                                <span class="detail-item">- Liên Hệ: {{$ticketItem->phoneNumber}}</span><br>
                            </div>
                            <div class="rate-detail">
                                <span class="detail-title">Đánh giá chung</span><br>
                                <span class="detail-item">{{$ticketItem->garageDescription}}</span>
                            </div>
                            <div class="regulation-detail">
                                <span class="detail-title">Một số quy định của nhà xe:</span><br>
                                <span class="detail-item">-Trọng lượng hành lý không quá 10kg</span><br>
                                <span class="detail-item">-Không mang đồ ăn, không hút thuốc trên xe</span><br>
                                <span class="detail-item">-Thực hiện quy tắc 5k</span><br>
                                <span class="detail-item">-Bắt buộc kiểm tra thân nhiệt trước khi lên xe</span><br>
                                <span class="detail-item">-Bắt buộc đeo khẩu trang trong suốt quá trình di chuyển</span><br>
                                <span class="detail-item">-Khách hàng đã tiêm ít nhất 1 mũi vacxin covid19(hoặc có giấy xét nghiệm âm tính trong vòng 72h)</span>
                            </div>
                        </div>
                    </div>
                    <div class="detail-info" id="order-{{$ticketItem->trip_id}}">
                        <div class="ticketDetail ticketOrder">
                            <div class="order-warning">
                                <p>Cam kết giữ vé đã mua, hoàn tiền 150% nếu bị hủy chuyến</p>
                            </div>
                            <div class="quantityInStock">
                                <p>Số ghế trống: {{$ticketItem->quantityInStock}}</p>
                            </div>
                            <div>
                                <p class="order-note">Lưu ý</p>
                                <p>Trẻ em dưới 6 tuổi không cần mua vé</p>
                                <p>Chỉ được đặt tối đa 5 vé</p>
                            </div>
                            <div>
                                <p class="order-note">Chọn số lượng vé cần mua</p>
                                <div class="btn-quantity">
                                    <button onclick="clickSeat(1,'#total-payment-{{$ticketItem->trip_id}}','#seats-{{$ticketItem->trip_id}}','{{$ticketItem->buyPrice}}')">1</button>
                                    <button onclick="clickSeat(2,'#total-payment-{{$ticketItem->trip_id}}','#seats-{{$ticketItem->trip_id}}','{{$ticketItem->buyPrice}}')">2</button>
                                    <button onclick="clickSeat(3,'#total-payment-{{$ticketItem->trip_id}}','#seats-{{$ticketItem->trip_id}}','{{$ticketItem->buyPrice}}')">3</button>
                                    <button onclick="clickSeat(4,'#total-payment-{{$ticketItem->trip_id}}','#seats-{{$ticketItem->trip_id}}','{{$ticketItem->buyPrice}}')">4</button>
                                    <button onclick="clickSeat(5,'#total-payment-{{$ticketItem->trip_id}}','#seats-{{$ticketItem->trip_id}}','{{$ticketItem->buyPrice}}')">5</button>
                                </div>
                            </div>
                            <div class="order-price">
                                <div class="order-seat">
                                    <p>Số ghế:</p>
                                    <span class="order-note" id="seats-{{$ticketItem->trip_id}}"></span>
                                </div>
                                <div class="btn-buyPrice">
                                    <p>Tổng thanh toán:</p>
                                    <span id="total-payment-{{$ticketItem->trip_id}}" class="order-note"></span>
                                    <p class="order-note">VNĐ</p>
                                </div>
                                <button class="btn btn-success">Xác nhận</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            let submitEles = document.querySelectorAll('.order-price');
            let len = submitEles.length;
            // console.log(len);
            for (let i = 0; i < len; ++i) {
                submitEles[i].querySelector('button').addEventListener('click', function() {
                    let item = {};
                    let buyPrice = {price: parseFloat(submitEles[i].querySelector('.btn-buyPrice span').innerHTML.toString())};
                    let trip_id = {id: parseInt(submitEles[i].querySelector('.order-seat span').id.substr(submitEles[i].querySelector('.order-seat span').id.indexOf('-')+1))};
                    // console.log(trip_id);
                    let quantity = {quantity: parseInt(submitEles[i].querySelector('.order-seat span').innerHTML.toString())};
                    // console.log(quantity);
                    // item.push({id: trip_id, quantity: quantity, price: buyPrice});
                    item = Object.assign(trip_id, quantity, buyPrice);
                    // console.log(item);

                    $.ajax({
                        type: 'GET',
                        url: "{{ route('frontend.main.carts') }}", 
                        data: {
                            item: item
                        },
                        success: function(data) {
                            if (data) {
                                console.log(data);
                            }
                        }
                    });
                });
            }
        });
    </script>
    <div class="footer">
        <div class="footer-contact">
            <div class="footer-about">
                <div class="footer-title">Đặt xe an toàn</div>
                <p>Đặt xe toàn hướng đến là hệ thống website đặt xe nhanh chóng an toàn tiện lợi đáp ứng nhu cầu của khách hàng. Cam kết hoàn trả 150% nếu bị hủy chuyến. Hệ thống liên kết với các đối tác doanh nghiệp vận tải hành khách hàng đầu</p>
            </div>
            <div class="footer-gara">
                <div class="footer-title">Các doanh nghiệp hợp tác</div>
                <div class="footer-list">
                    @foreach ($garageData as $item)
                    <p>{{$item->name}}</p>
                    @endforeach
                </div>
            </div>
            <div class="footer-city">
                <div class="footer-title">Các tỉnh thành phố</div>
                <div class="footer-list">
                    <p>Nam Định</p>
                    <p>Nam Định</p>
                    <p>Nam Định</p>
                    <p>Nam Định</p>
                    <p>Nam Định</p>
                    <p>Nam Định</p>
                    <p>Nam Định</p>
                    <p>Nam Định</p>
                    <p>Nam Định</p>
                    <p>Nam Định</p>
                    <p>Nam Định</p>
                    <p>Nam Định</p>
                </div>
            </div>

        </div>
        <div class="footer-line"></div>
        <div class="footer-icon">
            <div class="found">
                Thành lập năm 2017
            </div>
            <div class="footer-technology">
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-facebook-messenger"></i>
                <i class="far fa-envelope"></i>
                <i class="fab fa-instagram"></i>
            </div>
        </div>
    </div>
    <script src="{{URL::asset('js/ticket.js')}}"></script>
    <script src="{{URL::asset('js/header.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>

</body>

</html>