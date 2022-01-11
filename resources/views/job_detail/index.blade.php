@extends('layouts.app_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/job_detail.css ') }}"/>
@stop
@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url({{asset('assets/jobhunt/images/mslider1.jpg')}}) 50% -62.5px repeat scroll transparent;" class="parallax scrolly-invisible no-parallax"></div>
            <!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Chi tiết công việc</h3>
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
                    <div class="col-lg-12 column">
                        <div class="job-single-sec style3">
                            <div class="job-head-wide">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="job-single-head3 emplye">
                                            <div class="job-thumb"> <img src="{{ pare_url_file($job->company->c_logo ?? '') }}" alt=""></div>
                                            <div class="job-single-info3">
                                                <h3>{{ $job->j_name }}</h3>
                                                <span><i class="la la-map-marker"></i>{{ $job->j_address }}</span>
                                                <span class="job-is ft">{{ $job->getAttributeJob->a_name ?? "[N\A]" }}</span>
                                                <ul class="tags-jobs">
                                                    <li><i class="la la-file-text"></i> Lương: {{ $job->j_salary }} </li>
                                                    <li><i class="la la-calendar-o"></i> Hạn tuyển dụng: {{ $job->j_time }}</li>
{{--                                                    <li><i class="la la-eye"></i> Lượt xem {{ $job->j_view }}</li>--}}
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Job Head -->
                                    </div>
                                    <div class="col-lg-2">
{{--                                        <div class="share-bar">--}}
{{--                                            <a href="" title="" class="share-google"><i class="la la-google"></i></a>--}}
{{--                                            <a href="" title="" class="share-fb"><i class="fa fa-facebook"></i></a>--}}
{{--                                            <a href="" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>--}}
{{--                                        </div>--}}
                                        <div class="emply-btns">
                                            <a class="seemap js-apply-job" data-hash-slug="{{ $job->j_hash_slug }}" data-title="{{ $job->j_name }}"
                                               href="" title=""> Ứng tuyển</a>
{{--                                            <a class="followus" href="" title="">Theo dõi</a>--}}
                                        </div>
                                    </div>
                                    <div>

                                        <div class="job-details" style="margin-bottom: 40px; margin-left: 20px">
                                            <h3>Mô tả công việc</h3>
                                            {!! $job->j_description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="job-wide-devider">
                                <div class="row">
                                    <div class="col-lg-8 column">
                                        <div class="recent-jobs">
                                            <h3>Tin tuyển dụng liên quan</h3>
                                            <div class="job-list-modern">
                                                <div class="job-listings-sec no-border">
                                                    @foreach($jobsSuggest as $item)
                                                    <div class="job-listing wtabs noimg">
                                                        <div class="job-title-sec">
                                                            <h3><a href="{{ route('get.job',['slug'=> $item->j_slug, 'hashID' => $item->j_hash_slug]) }} }}" title="{{ $item->j_name }}">{{ $item->j_name }}</a></h3>
                                                            <span>{{ $item->company->c_name ?? "[N/A]" }}s</span>
                                                            <div class="job-lctn"><i class="la la-map-marker"></i>{{ $item->j_address }}</div>
                                                        </div>
                                                        <div class="job-style-bx">
                                                            <span class="job-is ft">{{ $item->getAttributeJob->a_name ?? "[N\A]" }}</span>
                                                            <span class="fav-job {{ get_data_user('users') ? 'js-favourite' : 'js-login-message' }}" data-url="{{ route('ajax_get.add.favourite',$item->j_hash_slug) }}"><i class="la la-heart-o"></i></span>
                                                            <i>{{ $item->created_at->diffForHumans() }}</i>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                    <!-- Job -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 column">
                                        <div class="job-overview">
                                            <h3>Thông tin công ty {{ $job->company->c_name ?? "[N\A]"}}</h3>
                                            <ul>
{{--                                                <li>--}}
{{--                                                    <i class="la la-eye"></i>--}}
{{--                                                    <h3>Viewed </h3>--}}
{{--                                                    <span>164</span>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <i class="la la-file-text"></i>--}}
{{--                                                    <h3>Posted Jobs</h3>--}}
{{--                                                    <span>4</span>--}}
{{--                                                </li>--}}
                                                <li>
                                                    <i class="la la-map"></i>
                                                    <h3 style="color: red">Địa điểm</h3>
                                                    <span>{{ $job->company->c_address ?? "[N\A]"}}</span>
                                                </li>
                                                <li>
                                                    <i class="la la-newspaper-o"></i>
                                                    <h3 style="margin-top: 10px; color: red">Ngành nghề</h3>
                                                    @if(isset($company->careers) && !$company->careers->isEmpty())
                                                    <span>
                                                        @foreach($company->careers as $item)
                                                           <p style="font-size: 13px"> {{ $item->c_name }}</p>
                                                        @endforeach
                                                    </span>
                                                    @endif
                                                </li>
{{--                                                <li>--}}
{{--                                                    <i class="la la-clock-o"></i>--}}
{{--                                                    <h3 style="margin-top: 10px; color: red">Thời gian làm việc</h3>--}}
{{--                                                        <span>--}}
{{--                                                          <p style="font-size: 13px"> {{ $company->working_time ?? "[N\A]"}}</p>--}}
{{--                                                    </span>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <i class="la la-users"></i>--}}
{{--                                                    <h3>Team Size</h3>--}}
{{--                                                    <span>15</span>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <i class="la la-user"></i>--}}
{{--                                                    <h3>Followers</h3>--}}
{{--                                                    <span>15</span>--}}
{{--                                                </li>--}}
                                            </ul>
                                        </div>
                                        <!-- Job Overview -->
{{--                                        <div class="quick-form-job">--}}
{{--                                            <h3>Contact Business Network</h3>--}}
{{--                                            <form>--}}
{{--                                                <input type="text" placeholder="Enter your Name *">--}}
{{--                                                <input type="text" placeholder="Email Address*">--}}
{{--                                                <input type="text" placeholder="Phone Number">--}}
{{--                                                <textarea placeholder="Message should have more than 50 characters"></textarea>--}}
{{--                                                <button class="submit">Send Email</button>--}}
{{--                                                <span>You accepts our <a href="employer_single1.html#" title="">Terms and Conditions</a></span>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('components.popup._inc_popup_apply_job')
@stop
@section('script')
    <script src="{{asset('js/home.js')}}"></script>
@stop
