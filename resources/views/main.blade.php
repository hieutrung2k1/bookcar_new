@include('frontend_inc.header')
        <!-- Search navigator -->
        <div class="section_backgroundImage">
            <form action="{{route('ticket')}}" method="GET">
                <div class="search">
                    <div class="search-bar">
                        <div class="search-bar-item">
                            <span><i class="fas fa-map-marker-alt search-bar-item-icon"></i></span>
                            <input type="text" class="search-bar-item-input border-right" placeholder="Nhập tỉnh, thành phố đi." name="dep">
                        </div>
                        <div class="search-bar-item">
                            <span><i class="fas fa-map-marker-alt search-bar-item-icon"></i></span>
                            <input type="text" class="search-bar-item-input border-right" placeholder="Nhập tỉnh thành phố đến." name="des">
                        </div>
                        <div class="search-bar-item">
                            <span><i class="fas fa-calendar-alt search-bar-item-icon "></i></span>
                            <input type="date" id="" class="search-bar-item-input" name="date">
                        </div>
                    </div>
                    <button class="search-bar-btn">Tìm kiếm</button>
                </div>
            </form>
        </div>
        <div class="popular-route">
            <h1 class="description">Một số tuyến đường phổ biến</h1>
            <div class="popular-route-list">
                @foreach ($ticketFavorite as $ticket)
                    <div class="popular-route-item">
                        <button class="popular-route-item-btn">
                            <img src="{{$ticket->image_trip}}" alt="Đà Nẵng" class="popular-route-item-img">
                            <div class="popular-route-item-info">
                                <h3 class="popular-route-item-name color_blue">{{$ticket->departure}} => {{$ticket->destination}}</h3>
                                <div class="detail-container">
                                    <p class="container-distance"><span class="space-icon"><i
                                                class="fas fa-map-marker-alt"></i></span>{{$ticket->time}}</p>
                                    <p class="container-time"><span class="space-icon"><i class="fas fa-clock"></i></span>{{$ticket->time_arrival}}
                                    </p>
                                    <p class="container-price color_blue">
                                        <span class="space-icon">
                                            <i class="fas fa-money-check-alt"></i>
                                        </span>{{$ticket->buyPrice}} VNĐ
                                    </p>
                                </div>
                            </div>
                        </button>
                    </div>                    
                @endforeach
            </div>
        </div>
        <div class="review-garage">
            <span>Mới Nhất!</span><br>
            <span>Review nhà xe tốt nhất 2021</span>
        </div>
        <div class="garage-sale">
            <div class="slide hi-slide">
                <div class="hi-prev "></div>
                  <div class="hi-next "></div>
                  <ul>
                      @foreach ($garaFooter as $garaItem)
                        <li>
                            <div>
                                <img src="{{$garaItem->image}}" class="slide-image" alt="Img 1"/>
                                <div class="slide-garage">
                                    <span>Nhà xe {{$garaItem->name}}</span>  
                                    <span>Số điện thoại:{{$garaItem->phone}}</span>
                                    <span>Đánh giá: {{$garaItem->rate_garage}}</span>
                                    <span>Địa chỉ: {{$garaItem->address}}</span>       
                                </div>
                            </div>
                        </li>                          
                      @endforeach
                </ul>
            </div>
        </div>
        <div class="quantity-honor">
            <div class="title-container">
                <div class="space-title"></div>
                <div class="title">
                    <span class="title-color">ĐẶT XE AN TOÀN - AN TÂM DI CHUYỂN</span>
                </div>
                <div class="space-title"></div>
            </div>
            <div class="body-container">
                <div class="body-container-item">
                    <div class="group-container">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="container-item-info">
                        <span class="info-color">100</span>
                        <span class="info-text">100 chuyến xe</span>
                        <span>Đặt xe an toàn hệ thống cung cấp hơn 100 chuyến xe mỗi ngày</span>
                    </div>
                </div>
                <div class="body-container-item">
                    <div class="group-container">
                        <i class="fas fa-gas-pump"></i>
                    </div>
                    <div class="container-item-info">
                        <span class="info-color">20</span>
                        <span class="info-text">Liên kết 20 nhà xe</span>
                        <span>Hệ thống liên kết với hơn 20 nhà xe uy tín trên cả nước</span>
                    </div>
                </div>
                <div class="body-container-item">
                    <div class="group-container">
                        <i class="fas fa-bus-alt"></i>
                    </div>
                    <div class="container-item-info">
                        <span class="info-color">40K</span>
                        <span class="info-text">40000 lượt khách</span>
                        <span>Gần 40000 khách hàng đặt vé trên hệ thống  </span>
                    </div>
                </div>
                <div class="body-container-item">
                    <div class="group-container">
                        <i class="fas fa-city"></i>
                    </div>
                    <div class="container-item-info">
                        <span class="info-color">30</span>
                        <span class="info-text">30 tỉnh thành </span>
                        <span>Nhà xe bao gồm các chuyến xe đi 30 tỉnh thành khác nhau trên toàn quốc</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- slide show auto image garage sale -->
    <div class="footer">
        <div class="footer-contact">
            <div class="footer-about">
                <div class="footer-title">Đặt xe an toàn</div>
                <p>Đặt xe toàn hướng đến là hệ thống website đặt xe nhanh chóng an toàn tiện lợi đáp ứng nhu cầu của khách hàng. Cam kết hoàn trả 150% nếu bị hủy chuyến. Hệ thống liên kết với các đối tác doanh nghiệp vận tải hành khách hàng đầu</p>
            </div>
            <div class="footer-gara">
                <div class="footer-title">Các doanh nghiệp hợp tác</div>
                <div class="footer-list">
                    @foreach ($garaFooter as $item)
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
    <script src="/js/header.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/slideShow.js"></script>
    <script src="/js/jquery.hislide.js"></script>
    <script>
        $('.slide').hiSlide();
    </script>
</body>

</html>