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
                            placeholder="Nhập tài khoản" name="userlogin">
                    </div>
                    <div class="form-group">
                        <label for="userpassword" class="form-group__text">Mật khẩu</label>
                        <input type="password" class="form-control" autocomplete="current-password" id="userpassword"
                            placeholder="Nhập mật khẩu" name="userpassword">
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
            <div class="nav__shopcart">
                <i class="material-icons-outlined nav__icon">shop</i>
                <div class="form__text nav__shopcart--wrapper">
                    <div class="nav__shopcart--arrow-up"></div>
                    <div class="nav__shopcart--title">
                        giỏ hàng
                    </div>
                    <div class="nav__shopcart--item">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 nav__shopcart--item--left">
                                    Số lượng sản phẩm
                                </div>
                                <div class="col-md-4 nav__shopcart--item--right">
                                    10.000.000
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 nav__shopcart--item--left">
                                    Tổng tiền
                                </div>
                                <div class="col-md-4 nav__shopcart--item--right">
                                    10.000.000
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 nav__shopcart--item--left">
                                    Đơn vị tính
                                </div>
                                <div class="col-md-4 nav__shopcart--item--right">
                                    VND
                                </div>
                            </div>
                            <div class="row">
                                <a href="">
                                    <div class="btn btn-primary nav__shopcart--btn ">thanh toán</div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
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
                    <img src="{{URL::asset('img/graphic-map.png')}}" alt="">
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
                                placeholder="Nhập SDT">
                        </div>
                        <div class="form__modal">
                            <label for="full_name">Địa chỉ</label>
                            <input type="text" id="address" name="address" class="form__text"
                                placeholder="Nhập địa chỉ">
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
