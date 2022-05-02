@include('backend.inc.header')
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
</body>
<script src="/js/header.js"></script>
<script src="/js/bootstrap.min.js"></script>
</html>