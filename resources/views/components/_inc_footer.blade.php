<footer>
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 column">
                    <div class="widget">
                        <div class="about_widget">
                            <div class="logo">
                                <a href="#" title=""><img
                                        src="{{asset('assets/jobhunt/images/logo1.png')}}"
                                        alt=""/></a>
                            </div>
                            <span>Số 2 Nguyễn Đình Chiểu, Vĩnh Thọ, Thành phố Nha Trang, Khánh Hòa 650000</span>
                            <span>+123456789</span>
                            <span><a href="https://grandetest.com/cdn-cgi/l/email-protection" class="__cf_email__"
                                     data-cfemail="6a03040c052a000508021f041e44090507">DHNTJob@gmail.com</a></span>
                            <div class="social">
                                <a href="index.html#" title=""><i class="fa fa-facebook"></i></a>
                                <a href="index.html#" title=""><i class="fa fa-twitter"></i></a>
                                <a href="index.html#" title=""><i class="fa fa-linkedin"></i></a>
                                <a href="index.html#" title=""><i class="fa fa-pinterest"></i></a>
                                <a href="index.html#" title=""><i class="fa fa-behance"></i></a>
                            </div>
                        </div><!-- About Widget -->
                    </div>
                </div>
                <div class="col-lg-4 column">
                    <div class="widget">
                        <h3 class="footer-title">Trang</h3>
                        <div class="link_widgets">
                            <div class="row">

                                @if(get_data_user('users'))
                                    <div class="col-lg-6">
                                        <a href="{{ route('get.home') }}" title="">Trang chủ </a>
                                        <a href="{{ route('get.search.job') }}" title="">Tìm việc</a>
                                    </div>
                                @else
                                <div class="col-lg-6">
                                    <a href="{{ route('get.home') }}" title="">Trang chủ </a>
                                    <a class="signin-popup" title="">Đăng nhập </a>
                                    <a class="signup-popup" title="">Đăng ký</a>
                                    <a href="{{ route('get.search.job') }}" title="">Tìm việc</a>
                                </div>
                                @endif
{{--                                <div class="col-lg-6">--}}
{{--                                    <a href="index.html#" title="">Support </a>--}}
{{--                                    <a href="index.html#" title="">How It Works </a>--}}
{{--                                    <a href="index.html#" title="">For Employers </a>--}}
{{--                                    <a href="index.html#" title="">Underwriting </a>--}}
{{--                                    <a href="index.html#" title="">Contact Us</a>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div class="col-lg-2 column">--}}
{{--                    <div class="widget">--}}
{{--                        <h3 class="footer-title">Find Jobs</h3>--}}
{{--                        <div class="link_widgets">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-12">--}}
{{--                                    <a href="index.html#" title="">US Jobs</a>--}}
{{--                                    <a href="index.html#" title="">Canada Jobs</a>--}}
{{--                                    <a href="index.html#" title="">UK Jobs</a>--}}
{{--                                    <a href="index.html#" title="">Emplois en Fnce</a>--}}
{{--                                    <a href="index.html#" title="">Jobs in Deuts</a>--}}
{{--                                    <a href="index.html#" title="">Vacatures China</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 column">--}}
{{--                    <div class="widget">--}}
{{--                        <div class="download_widget">--}}
{{--                            <a href="index.html#" title=""><img--}}
{{--                                    src="https://grandetest.com/theme/jobhunt-html/images/resource/dw1.png" alt=""/></a>--}}
{{--                            <a href="index.html#" title=""><img--}}
{{--                                    src="https://grandetest.com/theme/jobhunt-html/images/resource/dw2.png" alt=""/></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
{{--    <div class="bottom-line">--}}
{{--        <a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>--}}
{{--    </div>--}}
</footer>
