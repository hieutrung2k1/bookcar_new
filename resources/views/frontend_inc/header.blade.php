<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt xe an toàn</title>
    <link rel="shotcut icon" href="/icon/favicon.ico">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/content.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/icon/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="/boostrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/slide-garage.css">
    <link rel="stylesheet" href="/css/search.css">
    <script src="/js/jquery.min.js"></script>

</head>

<body>
    <div class="main">
        <div class="header">
            <div class="favicon">
                <span class="font_iconCar">
                    <i class="fas fa-bus-alt"></i>
                </span>
                <img src="/img/car.png" alt="" class="img_car">
            </div>
            <ul class="header_form">
                <li class="header_item">
                    <a class="fontsize_item" href="">Thuê xe</a>
                </li>
                <li class="header_item">
                    <a class="fontsize_item" href="">Limousine</a>
                </li>
                <li class="header_item">
                    <a class="fontsize_item" href="{{ route('frontend.main.listcarts') }}">Quản lý đơn hàng</a>
                </li>
                <li class="header_item">
                    <a class="fontsize_item" href="">Trở thành đối tác<span class="font_icon"><i class="fas fa-caret-down"></i></span></a>
                </li>
                <li class="header_item">
                    <button class="btn btn-info fontsize_item" onclick="clickHidden('phone')"><span class="font_icon font_iconPhone">
                            <i class="fas fa-phone"></i>
                        </span>Hotline</button>
                    <div class="hotline" id="phone">
                        <ul>
                            <li>Vinaphone -0917334338</li>
                            <li>Viettel -0865888919</li>
                            <li>MobilePhone-0123478999</li>
                        </ul>
                    </div>
                </li>
                @if ($_SESSION['email'] != '')
                <!-- <p style="margin: auto">Hi, {{ $_SESSION['email'] }}</p>
                <a id="logout" style="margin: auto; padding: 0 5px" href="{{ route('frontend.main.logout') }}">Đăng xuất</a> -->
                <li class="header_item" onclick="clickHidden('info')">Hi, {{ $_SESSION['email'] }}<span class="font_icon"><i class="fas fa-caret-down"></i></span>

                    <div id="info" class="account-logout">

                        <ul>

                            <li data-toggle="modal" data-target="#myModal-account">Thông tin cá nhân</li>

                            <li><a href="{{ route('frontend.main.logout') }}">Đăng xuất</a></li>

                        </ul>

                    </div>

                </li>
                @else
                <li class="header_item">
                    <button class="btn btn-success" data-toggle="modal" data-target="#myModal-login"><span class="font_icon fontsize_item">
                            <i class="fas fa-user"></i>
                        </span>Đăng Nhập</button>
                </li>
                <li class="header_item">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal-register"><span class="font_icon fontsize_item">
                            <i class="fas fa-user"></i>
                        </span>Đăng Ký</button>
                </li>
                @endif
            </ul>
        </div>
        <!-- Modal form login -->
        <div id="myModal-login" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('frontend.main.login') }}" method="post" class="form">
                            @csrf
                            <h3 class="heading">Đăng Nhập</h3>
                            <p class="desc">Nhập thông tin đăng nhập vào form sau</p>
                            <div class="form_login">
                                <label for="email_login" class="form-lable">Email:</label>
                                <input type="email" name="email_login" id="email_login" class="form-control" placeholder="email@gmail.com">
                                <span class="form-massage"></span>
                            </div>
                            <div class="form_login">
                                <label for="password_login" class="form-lable">Mật khẩu:</label>
                                <input type="password" name="password_login" id="password_login" class="form-control" placeholder="Nhập mật khẩu tại đây">
                                <span class="form-massage"></span>
                            </div>
                            <button class="form-submit" name="login-submit">Đăng Nhập</button>
                            <span id="direction-register" style="font-size: 15px; cursor: pointer;">Đăng ký tài khoản</span>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal form register -->
        <div id="myModal-register" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('frontend.main.register') }}" method="post" class="form" id="form-1">
                            @csrf
                            <h3 class="heading">Đăng ký</h3>
                            <p class="desc">Mời bạn nhập thông tin đăng ký tại form</p>
                            <div class="space"></div>
                            <div class="form-login">
                                <label for="email" class="form-lable">Email</label>
                                <input type="text" id="email" name="email" placeholder="VD: email@domain.com" class="form-control">
                                <span class="form-massage"></span>
                            </div>
                            <div class="form-login">
                                <label for="password" class="form-lable">Mật khẩu</label>
                                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" class="form-control">
                                <span class="form-massage"></span>
                            </div>
                            <div class="form-login">
                                <label for="password_confirm" class="form-lable">Nhập lại mật khẩu</label>
                                <input type="password" id="password_confirm" name="password_confirm" placeholder="Nhập lại mật khẩu" class="form-control">
                                <span class="form-massage"></span>
                            </div>
                            <button class="form-submit submit_disabled" name="form-submit" id="submit_register">Đăng
                                ký</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="myModal-account" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content" id="modal-content-account">
                    <div class="modal-body">
                        <form action="{{ route('frontend.profile') }}" method="post" class="form" id="form-2">
                            @csrf
                            <i class="fas fa-user-circle"></i>
                            <p class="desc">Điền thông tin cá nhân</p>
                            <div class="space"></div>
                            <div class="form-group">
                                <label for="nameAccount" class="form-lable">Họ và tên:</label>
                                <input type="text" id="nameAccount" name="nameAccount" placeholder="VD: Nguyen Van A" class="form-control">
                                <span class="form-massage"></span>
                            </div>
                            <div class="form-group">
                                <label for="dobAccount" class="form-lable">Ngày sinh:</label>
                                <input type="date" id="dobAccount" name="dobAccount" class="form-control">
                                <span class="form-massage"></span>
                            </div>
                            <div class="form-group formgroup-sex">
                                <label for="sex" class="form-lable">Giới tính</label>
                                <div>
                                    <input type="radio" name="sexAccount"><span>Nam</span>
                                    <input type="radio" name="sexAccount"><span>Nữ</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phoneAccount" class="form-lable">Số điệnt thoại:</label>
                                <input type="number" id="phoneAccount" name="phoneAccount" class="form-control">
                                <span class="form-massage"></span>
                            </div>
                            <div class="form-group">
                                <label for="addressAccount" class="form-lable">Địa chỉ:</label>
                                <input type="text" id="addressAccount" name="addressAccount" class="form-control">
                                <span class="form-massage"></span>
                            </div>
                            <button type="submit" class="form-submit submit_disabled" name="form-submit" id="submit_register">Xác nhận</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>