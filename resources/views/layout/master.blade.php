<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/main.css')}}">
    <title>Title</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="./index.html">Navbar</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#headerNav"
            aria-controls="headerNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="headerNav">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="./index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">pages</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="category-menu" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Categories</a>
                    <div class="dropdown-menu" aria-labelledby="category-menu">
                        <a class="dropdown-item" href="#">Action 1</a>
                        <a class="dropdown-item" href="#">Action 2</a>
                    </div>
                </li>
            </ul>
            <form class="nav__search">
                <i class="material-icons nav__icon ">
                    search
                </i>
                <div class="form-group form__text">
                    <input type="text" class="form-control nav__search--form" name="form_search" id=""
                        placeholder="Search...">
                    <button type='submit'>
                        <i class="material-icons nav__search--btn">
                            search
                        </i>
                        <div class="nav__search--arrow-up"></div>
                    </button>
                </div>
            </form>
            <div class="nav__login">
                <i class="material-icons nav__icon">
                    person_outline
                </i>
                <form class="form__text">
                    <div class="nav__login--arrow-up"></div>
                    <div class="form-group">
                        <label for="username" class="form-group__text">Tài khoản</label>
                        <input type="text" class="form-control" id="username" autocomplete="username"
                            placeholder="Nhập tài khoản">
                    </div>
                    <div class="form-group">
                        <label for="userpassword" class="form-group__text">Mật khẩu</label>
                        <input type="password" class="form-control" autocomplete="current-password" id="userpassword"
                            placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form-group form-check form-group__text">
                        <input type="checkbox" class="form-check-input" id="remember_check">
                        <label class="form-check-label" for="remember_check">Nhớ tên đăng nhập</label>
                    </div>
                    <div class="form-group">
                        <a href="#" class="nav__signup--link">Chưa có tài khoản. Đăng kí ngay</a>
                    </div>
                    <button type="submit" class="btn btn-dark form-group__btn">Đăng nhập</button>
                </form>
            </div>
        </div>

        </div>
    </nav>
    <!-- Sign up Popup -->
    <div class="popup">
            <div class="blackscreen">
            </div>
            <div class="nav__signup">
                    <div class="closeup">
                    </div>
                <div class="nav__signup--left">
                    <h2 class="title">
                        Tạo tài khoản
                    </h2>
                    <p>Tạo tài khoản để theo dõi đơn hàng, lưu danh sách sản phẩm yêu thích, nhận nhiều ưu đãi hấp dẫn.</p>
                    <img src="./app/img/graphic-map.png" alt="">
                </div>
                <div class="nav__signup--right">
                    <form action="">
                        <div class="form__modal">
                            <label for="full_name">Họ tên</label>
                            <input type="text" id="full_name" name="full_name" class="form__text"
                                placeholder="Nhập họ và tên">
                        </div>
                        <div class="form__modal">
                            <label for="phone_number">SĐT</label>
                            <input type="text" id="phone_number" name="phone_number" class="form__text"
                                placeholder="nhập SDT">
                        </div>
                        <div class="form__modal">
                            <label for="">Email</label>
                            <input type="text" id="email" name="email" class="form__text" placeholder="Nhập địa chỉ email">
                        </div>
                        <div class="form__modal">
                            <label for="">Mật khẩu</label>
                            <input type="password" id="password" name="password" class="form__text"
                                placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form__modal">
                            <label for="">Nhập lại Mật khẩu</label>
                            <input type="password" id="re_password" name="re_password" class="form__text"
                                placeholder="Nhập lại mật khẩu">
                        </div>
                        <input type="radio" name="gender" value="male" checked> Nam<br>
                        <input type="radio" name="gender" value="female">Nữ<br>
                        <div class="nav__signup--btn">
                            <input type="submit" value="Tạo tài khoản" class="form__button">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    <!-- Sign up Popup -->
    <!-- End Navbar -->
    <!-- Content -->
    @yield('content')
    <!-- Footer -->
    <footer>
        <hr>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-to">
                        <div class="footer__title">
                            hỗ trợ khách hàng
                        </div>
                        <div class="footer__text">
                            <div class="footer__emphasis">
                                Hotline đặt hàng: 1800-6963 <br>
                            </div>
                            (Miễn phí , 8-21h kể cả T7, CN) <br>
                        </div>
                        <div class="footer__text">
                            <div class="footer__emphasis">
                                Hotline chăm sóc khách hàng: 1900-6035 <br>
                            </div>
                            (1000đ/phút , 8-21h kể cả T7, CN)
                        </div>
                        <a href="#" class="footer__text">Các câu hỏi thưởng gặp</a>
                        <a href="#" class="footer__text">Các câu hỏi thưởng gặp</a>
                        <a href="#" class="footer__text">Các câu hỏi thưởng gặp</a>
                        <a href="#" class="footer__text">Các câu hỏi thưởng gặp</a>
                        <a href="#" class="footer__text">Các câu hỏi thưởng gặp</a>
                        <a href="#" class="footer__text">Các câu hỏi thưởng gặp</a>
                    </div>
                    <div class="col-nho">
                        <div class="footer__title">
                            Về chúng tôi
                        </div>
                        <a href="#" class="footer__text">
                            Giới thiệu
                        </a>
                        <a href="#" class="footer__text">
                            Chính sách bảo mật và thanh toán
                        </a>
                        <a href="#" class="footer__text">
                            Chính sách bảo mật thông tin cá nhân
                        </a>
                        <a href="#" class="footer__text">
                            Điều khoản sử dụng
                        </a>
                        <a href="#" class="footer__text">
                            Bán hàng doanh nghiệp
                        </a>

                    </div>
                    <div class="col-nho">
                        <div class="footer__title">
                            Hợp tác và liên kết
                        </div>
                        <a href="#" class="footer__text">
                            Quy chế hoạt động Sàn GDTMDT
                        </a>
                        <a href="#" class="footer__text">
                            Bán hàng doanh nghiệp
                        </a>
                    </div>
                    <div class="col-nho">
                        <div class="footer__title">
                            Phương thức thanh toán
                        </div>
                        <div class="footer__img">
                            <img src="./app/img/visa.svg" alt="">
                            <img src="./app/img/jcb.svg" alt="">
                            <img src="./app/img/mastercard.svg" alt="">
                            <br>
                            <img src="./app/img/internet-banking.svg" alt="">
                            <img src="./app/img/cash.svg" alt="">
                            <img src="./app/img/installment.svg" alt="">
                        </div>
                    </div>
                    <div class="col-nho">
                        <div class="footer__title">
                            Kết nối với chúng tôi
                        </div>


                        <div class="footer__title">
                            Tải ứng dụng
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{URL::asset('js/main.js')}}"></script>
</body>

</html>
