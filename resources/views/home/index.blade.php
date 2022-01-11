@extends('layouts.app_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css ') }}"/>
@stop
@section('content')
    <section>
        <div class="block no-padding">
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-featured-sec">
                            <div class="new-slide">
                                <img src="{{asset('assets/jobhunt/images/vector-1.png')}}">
                            </div>
                            <div class="job-search-sec">
                                <div class="job-search">
                                    <h3>Hệ thống tìm việc cho sinh viên đại học Nha Trang</h3>
                                    <form action="{{ route('get.search.job') }}">
                                        <div class="row">
                                            <div class="col-lg-7 col-md-5 col-sm-12 col-xs-12">
                                                <div class="job-field">
                                                    <input type="text" name="t" placeholder="Tiêu đề công việc"/>
                                                    <i class="la la-keyboard-o"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                                                <div class="job-field">
                                                    <select data-placeholder="Chọn địa điểm"
                                                            class="chosen-city" name="l" >
                                                        {{-- Lựa chọn địa điểm         --}}
                                                        <option>Nha Trang</option>
                                                        <option>Ninh Hòa</option>
                                                        <option>Diên Khánh</option>
                                                        <option>Cam Ranh</option>
                                                        <option>Khánh Sơn</option>
                                                        <option>Khánh Vĩnh</option>
                                                    </select>
                                                    <i class="la la-map-marker"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-md-2 col-sm-12 col-xs-12">
                                                <button type="submit"><i class="la la-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="scroll-to">
                                <a href="#scroll-here" title=""><i class="la la-arrow-down"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="scroll-here">
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>Xu hướng nghề nghiệp</h2>
                            <span>Lướt xem các xu hướng nghề nghiệp phổ biến</span>
                        </div><!-- Heading -->
                        {{-- Nhóm các bảng nghề nghiệp thành 1 nhóm nhỏ        --}}
                        @foreach($careersHot->chunk(4) as $careers)
                            <div class="cat-sec">
                                <div class="row no-gape">
                                    @foreach($careers as $item)
                                        <div class="col-lg-3 col-md-3 col-sm-6">
                                            <div class="p-category">
                                                <a href="{{ route('get.career.index',['slug' => $item->c_slug]) }}" title="{{ $item->c_name }}">
                                                    <img src="{{ pare_url_file($item->c_avatar) }}"  alt="" style="max-width: 100%; height: 80px; margin-top: 10px">
                                                    <span>{{ $item->c_name }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
{{--                    <div class="col-lg-12">--}}
{{--                        <div class="browse-all-cat">--}}
{{--                            <a href="" title="">Xem tất cả các ngành nghề</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="block double-gap-top double-gap-bottom">
            <div data-velocity="-.1"
                 style="background: url(https://grandetest.com/theme/jobhunt-html/images/resource/parallax1.jpg) repeat scroll 50% 422.28px transparent;"
                 class="parallax scrolly-invisible layer color"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="simple-text-block">
                            <h3>Tạo tài khoản, kiếm việc làm ngay hôm nay</h3>
                            <a class="signup-popup" title="">Đăng ký </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>Tin tuyển dụng mới nhất</h2>
                            <span>Danh sách tin tuyển dụng mới được đăng tải</span>
                        </div><!-- Heading -->
                        <div class="job-listings-sec">
                            @foreach($jobsNew as $item)
                            <div class="job-listing">
                                <div class="job-title-sec">
                                    <div class="c-logo"><img
                                            src="{{ pare_url_file($item->company->c_logo ?? '') }}"
                                            alt=""/></div>
                                    <h3><a href="{{ route('get.job',['slug'=> $item->j_slug, 'hashID' => $item->j_hash_slug]) }}" title="{{ $item->j_name }}">{{ $item->j_name }}</a></h3>
                                    <span>{{ $item->company->c_name ?? "[N\A]" }}</span>
                                </div>
                                <span class="job-lctn"><i class="la la-map-marker"></i>{{ $item->j_address }}</span>
                                <span class="fav-job {{ get_data_user('users') ? 'js-favourite' : 'js-login-message' }}" data-url="{{ route('ajax_get.add.favourite',$item->j_hash_slug) }}"><i class="la la-heart-o"></i></span>
                                <span class="job-is ft">{{ $item->getAttributeJob->a_name ?? "[N\A]" }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="browse-all-cat">
                            <a href="{{ route('get.search.job') }}" title="">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--    <section>--}}
{{--        <div class="block">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-12">--}}
{{--                        <div class="heading">--}}
{{--                            <h2>Nhà tuyển dụng tiêu biểu</h2>--}}
{{--                        </div><!-- Heading -->--}}
{{--                        <div class="comp-sec">--}}
{{--                            <div class="company-img">--}}
{{--                                <a href="index.html#" title=""><img--}}
{{--                                        src="https://grandetest.com/theme/jobhunt-html/images/resource/cc1.jpg" alt=""/></a>--}}
{{--                            </div><!-- Client  -->--}}
{{--                            <div class="company-img">--}}
{{--                                <a href="index.html#" title=""><img--}}
{{--                                        src="https://grandetest.com/theme/jobhunt-html/images/resource/cc2.jpg" alt=""/></a>--}}
{{--                            </div><!-- Client  -->--}}
{{--                            <div class="company-img">--}}
{{--                                <a href="index.html#" title=""><img--}}
{{--                                        src="https://grandetest.com/theme/jobhunt-html/images/resource/cc3.jpg" alt=""/></a>--}}
{{--                            </div><!-- Client  -->--}}
{{--                            <div class="company-img">--}}
{{--                                <a href="index.html#" title=""><img--}}
{{--                                        src="https://grandetest.com/theme/jobhunt-html/images/resource/cc4.jpg" alt=""/></a>--}}
{{--                            </div><!-- Client  -->--}}
{{--                            <div class="company-img">--}}
{{--                                <a href="index.html#" title=""><img--}}
{{--                                        src="https://grandetest.com/theme/jobhunt-html/images/resource/cc5.jpg" alt=""/></a>--}}
{{--                            </div><!-- Client  -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <section>--}}
{{--        <div class="block">--}}
{{--            <div data-velocity="-.1"--}}
{{--                 style="background: url(https://grandetest.com/theme/jobhunt-html/images/resource/parallax3.jpg) repeat scroll 50% 422.28px transparent;"--}}
{{--                 class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-12">--}}
{{--                        <div class="heading">--}}
{{--                            <h2>Quick Career Tips</h2>--}}
{{--                            <span>Found by employers communicate directly with hiring managers and recruiters.</span>--}}
{{--                        </div><!-- Heading -->--}}
{{--                        <div class="blog-sec">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-4">--}}
{{--                                    <div class="my-blog">--}}
{{--                                        <div class="blog-thumb">--}}
{{--                                            <a href="index.html#" title=""><img--}}
{{--                                                    src="https://grandetest.com/theme/jobhunt-html/images/resource/b1.jpg"--}}
{{--                                                    alt=""/></a>--}}
{{--                                            <div class="blog-metas">--}}
{{--                                                <a href="index.html#" title="">March 29, 2017</a>--}}
{{--                                                <a href="index.html#" title="">0 Comments</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="blog-details">--}}
{{--                                            <h3><a href="index.html#" title="">Attract More Attention Sales And--}}
{{--                                                    Profits</a></h3>--}}
{{--                                            <p>A job is a regular activity performed in exchange becoming an employee,--}}
{{--                                                volunteering, </p>--}}
{{--                                            <a href="index.html#" title="">Read More <i--}}
{{--                                                    class="la la-long-arrow-right"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-4">--}}
{{--                                    <div class="my-blog">--}}
{{--                                        <div class="blog-thumb">--}}
{{--                                            <a href="index.html#" title=""><img--}}
{{--                                                    src="https://grandetest.com/theme/jobhunt-html/images/resource/b2.jpg"--}}
{{--                                                    alt=""/></a>--}}
{{--                                            <div class="blog-metas">--}}
{{--                                                <a href="index.html#" title="">March 29, 2017</a>--}}
{{--                                                <a href="index.html#" title="">0 Comments</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="blog-details">--}}
{{--                                            <h3><a href="index.html#" title="">11 Tips to Help You Get New Clients</a>--}}
{{--                                            </h3>--}}
{{--                                            <p>A job is a regular activity performed in exchange becoming an employee,--}}
{{--                                                volunteering, </p>--}}
{{--                                            <a href="index.html#" title="">Read More <i--}}
{{--                                                    class="la la-long-arrow-right"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-4">--}}
{{--                                    <div class="my-blog">--}}
{{--                                        <div class="blog-thumb">--}}
{{--                                            <a href="index.html#" title=""><img--}}
{{--                                                    src="https://grandetest.com/theme/jobhunt-html/images/resource/b3.jpg"--}}
{{--                                                    alt=""/></a>--}}
{{--                                            <div class="blog-metas">--}}
{{--                                                <a href="index.html#" title="">March 29, 2017</a>--}}
{{--                                                <a href="index.html#" title="">0 Comments</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="blog-details">--}}
{{--                                            <h3><a href="index.html#" title="">An Overworked Newspaper Editor</a></h3>--}}
{{--                                            <p>A job is a regular activity performed in exchange becoming an employee,--}}
{{--                                                volunteering, </p>--}}
{{--                                            <a href="index.html#" title="">Read More <i--}}
{{--                                                    class="la la-long-arrow-right"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
@stop
@section('script')
    <script src="{{asset('js/home.js')}}"></script>
@stop
