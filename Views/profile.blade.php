@extends('layouts.master')

@section('title', 'Profile')

@section('metas')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="{{ route('index') }}">Anasayfa</a>
                            </li>
                            <li class="active">
                                <a href="#">Profil</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">{{ $user->first_name . ' ' . $user->last_name }} Profil</h1>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    <!--================================
        END BREADCRUMB AREA
    =================================-->

    <!--================================
        START AUTHOR AREA
    =================================-->
    <section class="author-profile-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <aside class="sidebar sidebar_author">
                        <div class="author-card sidebar-card">
                            <div class="author-infos">
                                <div class="author_avatar">
                                    <img src="{{ asset($user->profile_photo) }}" alt="Profil fotoğrafı">
                                </div>

                                <div class="author">
                                    <h4>{{ $user->first_name . ' ' . $user->last_name }}</h4>
                                    <p>{{ explode(' ', $user->created_at)[0] }} tarihinden beri üye</p>
                                </div>
                                <!-- end /.author -->

                                <div class="author-badges">
                                    <ul class="list-unstyled">
                                        <li>
                                            <span data-toggle="tooltip" data-placement="bottom" title="Diamnond Author">
                                                <img src="{{ asset('images/svg/author_rank_diamond.svg') }}" alt="">
                                            </span>
                                        </li>
                                        <li>
                                            <span data-toggle="tooltip" data-placement="bottom" title="Has sold more than $10k">
                                                <img src="{{ asset('images/svg/author_level_3.svg') }}" alt="">
                                            </span>
                                        </li>
                                        <li>
                                            <span data-toggle="tooltip" data-placement="bottom" title="Referred 10+ members">
                                                <img src="{{ asset('images/svg/affiliate_level_1.svg') }}" alt="">
                                            </span>
                                        </li>
                                        <li>
                                            <span data-toggle="tooltip" data-placement="bottom" title="Has Collected 2+ Items">
                                                <img src="{{ asset('images/svg/collection_level_1.svg') }}" alt="">
                                            </span>
                                        </li>
                                        <li>
                                            <span data-toggle="tooltip" data-placement="bottom" title="Exclusive Author">
                                                <img src="{{ asset('images/svg/exclusive_author.svg') }}" alt="">
                                            </span>
                                        </li>
                                        <li>
                                            <span data-toggle="tooltip" data-placement="bottom" title="Weekly Featured Author">
                                                <img src="{{ asset('images/svg/featured_author.svg') }}" alt="">
                                            </span>
                                        </li>
                                        <li>
                                            <span data-toggle="tooltip" data-placement="bottom" title="Member for 2 Year">
                                                <img src="{{ asset('images/svg/members_years.svg') }}" alt="">
                                            </span>
                                        </li>
                                        <li>
                                            <span data-toggle="tooltip" data-placement="bottom" title="The seller is recommended by authority">
                                                <img src="{{ asset('images/svg/recommended.svg') }}" alt="">
                                            </span>
                                        </li>
                                        <li>
                                            <span data-toggle="tooltip" data-placement="bottom" title="Won a contest">
                                                <img src="{{ asset('images/svg/contest_winner.svg') }}" alt="">
                                            </span>
                                        </li>
                                        <li>
                                            <span data-toggle="tooltip" data-placement="bottom" title="Helped to resolve copyright issues">
                                                <img src="{{ asset('images/svg/copyright.svg') }}" alt="">
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end /.author-badges -->

                                <div class="social social--color--filled">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <span class="fa fa-facebook"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="fa fa-twitter"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="fa fa-dribbble"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end /.social -->
                                @auth
                                    @if(auth()->user()->username != $user->username)
                                        <div class="author-btn">
                                            @if(auth()->user()->getFollowing()->where('following_id', $user->id)->first())
                                                <button data-toggle="follow" data-target="{{ $user->username }}" data-transaction="unfollow" class="btn btn--md btn--round">Takipten çık</button>
                                            @else
                                                <button data-toggle="follow" data-target="{{ $user->username }}" data-transaction="follow" class="btn btn--md btn--round">Takip et</button>
                                            @endif
                                        </div>
                                        <!-- end /.author-btn -->
                                    @endif
                                @endauth
                            </div>
                            <!-- end /.author-infos -->
                        </div>
                        <!-- end /.author-card -->

                        <div class="sidebar-card author-menu">
                            <ul>
                                <li>
                                    <a href="{{ route('profile', ['username' => $user->username]) }}" class="active">Profil</a>
                                </li>
                                @if($user->type == 'provider')
                                    <li>
                                        <a href="{{ route('published_jobs', ['username' => $user->username]) }}">Yayınladığı işler</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ route('reviews', ['username' => $user->username]) }}">Kullanıcı incelemeleri</a>
                                </li>
                                <li>
                                    <a href="{{ route('followers', ['username' => $user->username]) }}">Takipçiler(<span id="follower">{{ $user->getFollowers()->count() }}</span>)</a>
                                </li>
                                <li>
                                    <a href="{{ route('following', ['username' => $user->username]) }}">Takip ettikleri(<span id="following">{{ $user->getFollowing()->count() }}</span>)</a>
                                </li>
                            </ul>
                        </div>
                        <!-- end /.author-menu -->

                        <div class="sidebar-card freelance-status">
                            <div class="custom-radio">
                                <input type="radio" id="opt1" class="" name="filter_opt" checked>
                                <label for="opt1">
                                    <span class="circle"></span>Çalışmaya müsait</label>
                            </div>
                        </div>
                        <!-- end /.author-card -->

                        @auth
                            @if(auth()->user()->username != $user->username)
                                <div class="sidebar-card message-card">
                                    <div class="card-title">
                                        <h4>Product Information</h4>
                                    </div>

                                    <div class="message-form">
                                            <form action="#">
                                                <div class="form-group">
                                                    <textarea name="message" class="text_field" id="author-message" placeholder="Your message..."></textarea>
                                                </div>

                                                <div class="msg_submit">
                                                    <button type="submit" class="btn btn--md btn--round">send message</button>
                                                </div>
                                            </form>
                                            <p> Please
                                                <a href="#">sign in</a> to contact this author.</p>
                                    </div>
                                    <!-- end /.message-form -->
                                </div>
                            @endif
                        @endauth
                        <!-- end /.freelance-status -->
                    </aside>
                </div>
                <!-- end /.sidebar -->

                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="author-info mcolorbg4">
                                <p>Total Items</p>
                                <h3>4,369</h3>
                            </div>
                        </div>
                        <!-- end /.col-md-4 -->

                        <div class="col-md-4 col-sm-4">
                            <div class="author-info pcolorbg">
                                <p>Total sales</p>
                                <h3>36,957</h3>
                            </div>
                        </div>
                        <!-- end /.col-md-4 -->

                        <div class="col-md-4 col-sm-4">
                            <div class="author-info scolorbg">
                                <p>Total Ratings</p>
                                <div class="rating product--rating">
                                    <ul>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-half-o"></span>
                                        </li>
                                    </ul>
                                    <span class="rating__count mt-1">(26)</span>
                                </div>
                            </div>
                        </div>
                        <!-- end /.col-md-4 -->

                        <div class="col-md-12 col-sm-12">
                            <div class="author_module about_author">
                                <h2>Hakkında</span>
                                </h2>
                                <p>{{ $user->description }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- end /.row -->

                    @auth
                        @if(auth()->user()->type == 'provider')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="product-title-area">
                                        <div class="product__title">
                                            <h2>Paylaştığı tüm işler</h2>
                                        </div>
                                    </div>
                                    <!-- end /.product-title-area -->
                                </div>
                                <!-- end /.col-md-12 -->

                                @foreach ($postedJobs as $job)
                                    <!-- start col-lg-12 -->
                                    <div class="col-lg-12">
                                        <!-- start .single-product -->
                                        <div class="product product--list product--list-small h-auto">

                                            <div class="product__thumbnail">
                                                <img src="{{ asset('images/pl1.jpg') }}" alt="Product Image">
                                                <div class="prod_btn">
                                                    <a href="single-product.html" class="transparent btn--sm btn--round">Daha fazla bilgi</a>
                                                </div>
                                                <!-- end /.prod_btn -->
                                            </div>
                                            <!-- end /.product__thumbnail -->

                                            <div class="product__details py-2">
                                                <div class="product-desc">
                                                    <a href="#" class="product_title">
                                                        <h4>{{ $job->title }}</h4>
                                                    </a>
                                                    <p>{{ $job->description }}</p>

                                                    <ul class="titlebtm">
                                                        <li class="product_cat">
                                                            <a href="#">
                                                                <span class="lnr lnr-book"></span>Fındık</a>
                                                        </li>
                                                    </ul>
                                                    <!-- end /.titlebtm -->
                                                </div>
                                                <!-- end /.product-desc -->

                                                <div class="product-meta">
                                                    <div class="author">
                                                        <img class="auth-img" src="{{ asset('images/auth3.jpg') }}" alt="author image">
                                                        <p>
                                                            <a href="#">İşveren</a>
                                                        </p>
                                                    </div>
                                                    <!-- end /.author -->

                                                    <div class="love-comments">
                                                        <p>
                                                            <span class="lnr lnr-heart"></span> 90 loves</p>
                                                        <p>
                                                            <span class="lnr lnr-bubble"></span> 90 Comments</p>
                                                    </div>
                                                    <!-- end /.love-comments -->

                                                    <div class="rating product--rating">
                                                        <ul>
                                                            <li>
                                                                <span class="fa fa-star"></span>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-star"></span>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-star"></span>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-star"></span>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-star-half-o"></span>
                                                            </li>
                                                        </ul>
                                                        <span class="rating__count">(34)</span>
                                                    </div>
                                                    <!-- end /.rating -->
                                                </div>
                                                <!-- end /.product-meta -->

                                                <div class="product-purchase w-75 d-flex align-items-center justify-content-md-center justify-content-sm-start">
                                                    <div class="price_love p-0">
                                                        <span>$10 - $50</span>
                                                    </div>
                                                </div>
                                                <!-- end /.product-purchase -->
                                            </div>
                                        </div>
                                        <!-- end /.single-product -->
                                    </div>
                                    <!-- end /.col-lg-12 -->
                                @endforeach
                                <div class="col-lg-12 text-center">
                                    <a href="#" class="btn btn--sm mx-auto">Paylaştığı tüm işleri gör</a>
                                </div>
                            </div>
                            <!-- end /.row -->
                        @endif
                    @endauth
                </div>
                <!-- end /.col-md-8 -->

            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    <!--================================
        END AUTHOR AREA
    =================================-->

    @if(!auth()->user())
        <!--================================
            START CALL TO ACTION AREA
        =================================-->
        <section class="call-to-action bgimage">
            <div class="bg_image_holder">
                <img src="images/calltobg.jpg" alt="">
            </div>
            <div class="container content_above">
                <div class="row">
                    <div class="col-md-12">
                        <div class="call-to-wrap">
                            <h1 class="text--white">Ready to Join Our Marketplace!</h1>
                            <h4 class="text--white">Over 25,000 designers and developers trust the MartPlace.</h4>
                            <a href="#" class="btn btn--lg btn--round btn--white callto-action-btn">Join Us Today</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================================
            END CALL TO ACTION AREA
        =================================-->
    @endif
@endsection

@section('scripts')
        <script type="text/javascript">
            $('button[data-toggle="follow"]').on('click', function(e) {

                button = $('button[data-toggle="follow"]');

                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });

                if(button.attr('data-transaction') == 'follow') {
                    $.ajax({
                        /* the route pointing to the post function */
                        url: '/follow',
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {target:button.attr('data-target')},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            button.html('Takipten çık');
                            button.attr('data-transaction', 'unfollow');
                            x = parseInt($('#follower').html());
                            x1 = ++x;
                            $('#follower').html(x1);
                            alert(data.msg);
                        },
                        error:function(){
                            alert("İşlem sırasında bir hata oluştu.");
                        },
                    });
                }

                else if(button.attr('data-transaction') == 'unfollow') {
                    $.ajax({
                        /* the route pointing to the post function */
                        url: '/unfollow',
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {target:button.attr('data-target')},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            button.html('Takip et');
                            button.attr('data-transaction', 'follow');
                            x = parseInt($('#follower').html());
                            x1 = --x;
                            $('#follower').html(x1);
                            alert(data.msg);
                        },
                        error:function(){
                            alert("İşlem sırasında bir hata oluştu.");
                        },
                    });
                }
            });
        </script>
@endsection

