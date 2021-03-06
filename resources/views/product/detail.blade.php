@extends('layouts.app')
@section('content')
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="{{asset('images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Sản phẩm</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="{{asset('images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="block">
            @if(isset($productDetail))
                <div class="container">
                    <div class="product product--layout--standard" data-layout="standard">
                        <div class="product__content">
                            <!-- .product__gallery -->
                            <div class="product__gallery">
                                <div class="product-gallery">
                                    <div class="product-gallery__featured">
                                        <button class="product-gallery__zoom">
                                            <svg width="24px" height="24px">
                                                <use xlink:href="{{asset('images/sprite.svg#zoom-in-24')}}"></use>
                                            </svg>
                                        </button>
                                        <div class="owl-carousel owl-loaded owl-drag" id="product-image">
                                            <div class="owl-stage-outer">
                                                <div class="owl-stage"
                                                     style="transform: translate3d(-1062px, 0px, 0px); transition: all 0.3s ease 0s; width: 2655px;">
                                                    @if(isset($images))
                                                        @foreach($images as $key => $image)
                                                            <div class="owl-item {{$key == 0 ? 'active' :' ' }} "
                                                                 style="width: 531px;">
                                                                <a href="{{pare_url_file($image->image)}}"
                                                                   target="_blank"><img
                                                                        src="{{pare_url_file($image->image)}}" alt="">
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="owl-item active" style="width: 531px;">
                                                            <a href="{{pare_url_file($productDetail->pro_avatar)}}"
                                                               target="_blank">
                                                                <img src="{{pare_url_file($productDetail->pro_avatar)}}"
                                                                     alt="{{$productDetail->pro_name}}">
                                                            </a>
                                                        </div>
                                                    @endif


                                                </div>
                                            </div>
                                            <div class="owl-nav disabled">
                                                <button type="button" role="presentation" class="owl-prev"><span
                                                        aria-label="Previous">‹</span></button>
                                                <button type="button" role="presentation" class="owl-next"><span
                                                        aria-label="Next">›</span></button>
                                            </div>
                                            <div class="owl-dots disabled"></div>
                                        </div>
                                    </div>
                                    <div class="product-gallery__carousel">
                                        <div class="owl-carousel owl-loaded owl-drag" id="product-carousel">
                                            <div class="owl-stage-outer">
                                                <div class="owl-stage"
                                                     style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 545px;">
                                                    @if(isset($images))
                                                        @foreach($images as $key => $image)
                                                            <div class="owl-item active"
                                                                 style="width: 99px; margin-right: 10px;">
                                                                <a href="{{pare_url_file($image->image)}}"
                                                                   class="product-gallery__carousel-item {{ $key == 0 ?'product-gallery__carousel-item--active' : '' }} ">
                                                                    <img class="product-gallery__carousel-image"
                                                                         src="{{pare_url_file($image->image)}}" alt="">
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        @for($i=1;$i<=5;$i++)
                                                            <div class="owl-item active"
                                                                 style="width: 99px;margin-right: 10px;">
                                                                <a href="{{asset('none.jpg')}}"
                                                                   class="product-gallery__carousel-item"><img
                                                                        class="product-gallery__carousel-image"
                                                                        src="{{asset('none.jpg')}}" alt=""> </a>
                                                            </div>
                                                        @endfor

                                                    @endif

                                                </div>
                                            </div>
                                            <div class="owl-nav disabled">
                                                <button type="button" role="presentation" class="owl-prev"><span
                                                        aria-label="Previous">‹</span></button>
                                                <button type="button" role="presentation" class="owl-next"><span
                                                        aria-label="Next">›</span></button>
                                            </div>
                                            <div class="owl-dots disabled"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .product__gallery / end -->
                            <!-- .product__info -->
                            <div class="product__info">
                                <div class="product__wishlist-compare">
                                    <a href="{{route('user.favorite.add',$productDetail->id)}}">
                                        <button type="button" class="btn btn-sm btn-light btn-svg-icon"
                                                data-toggle="tooltip"
                                                data-placement="right" title="" data-original-title="Wishlist">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="{{asset('images/sprite.svg#wishlist-16')}}"></use>
                                            </svg>
                                        </button>
                                    </a>

                                </div>
                                <h1 class="product__name">{{$productDetail->pro_name}}</h1>
                                <div class="product-card__rating">
                                    <div class="rating">
                                        <div class="rating__body">
                                            @if($productDetail->pro_total_rating > 0)
                                                <?php $rating = round($productDetail->pro_total_number_rating / $productDetail->pro_total_rating) ?>

                                                @for($i =1 ; $i <= $rating;$i++)
                                                    <svg class="rating__star rating__star--active" width="13px"
                                                         height="12px">
                                                        <g class="rating__fill">
                                                            <use
                                                                xlink:href="{{asset('images/sprite.svg#star-normal')}}"></use>
                                                        </g>
                                                        <g class="rating__stroke">
                                                            <use
                                                                xlink:href="{{asset('images/sprite.svg#star-normal-stroke')}}"></use>
                                                        </g>
                                                    </svg>
                                                    <div
                                                        class="rating__star rating__star--only-edge rating__star--active">
                                                        <div class="rating__fill">
                                                            <div class="fake-svg-icon"></div>
                                                        </div>
                                                        <div class="rating__stroke">
                                                            <div class="fake-svg-icon"></div>
                                                        </div>
                                                    </div>
                                                @endfor
                                                @for($i = 1;$i <= (5- $rating);$i++)
                                                    <svg class="rating__star" width="13px" height="12px">
                                                        <g class="rating__fill">
                                                            <use
                                                                xlink:href="{{asset('images/sprite.svg#star-normal')}}"></use>
                                                        </g>
                                                        <g class="rating__stroke">
                                                            <use
                                                                xlink:href="{{asset('images/sprite.svg#star-normal-stroke')}}"></use>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__star rating__star--only-edge">
                                                        <div class="rating__fill">
                                                            <div class="fake-svg-icon"></div>
                                                        </div>
                                                        <div class="rating__stroke">
                                                            <div class="fake-svg-icon"></div>
                                                        </div>
                                                    </div>
                                                @endfor
                                            @else
                                                @for($i = 1;$i <= 5;$i++)
                                                    <svg class="rating__star" width="13px" height="12px">
                                                        <g class="rating__fill">
                                                            <use
                                                                xlink:href="{{asset('images/sprite.svg#star-normal')}}"></use>
                                                        </g>
                                                        <g class="rating__stroke">
                                                            <use
                                                                xlink:href="{{asset('images/sprite.svg#star-normal-stroke')}}"></use>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__star rating__star--only-edge">
                                                        <div class="rating__fill">
                                                            <div class="fake-svg-icon"></div>
                                                        </div>
                                                        <div class="rating__stroke">
                                                            <div class="fake-svg-icon"></div>
                                                        </div>
                                                    </div>
                                                @endfor
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-card__rating-legend">{{$productDetail->pro_total_rating}} đánh
                                        giá
                                    </div>
                                </div>
                                <div class="product__description">{{$productDetail->pro_description}}
                                </div>
                                <ul class="product__meta">
                                    <li class="product__meta-availability">Availability: <span
                                            class="text-success">In Stock</span></li>
                                </ul>
                            </div>
                            <!-- .product__info / end -->
                            <!-- .product__sidebar -->
                            <div class="product__sidebar">
                                <div class="product__availability">Availability: <span
                                        class="text-success">In Stock</span>
                                </div>
                                <div class="product__actions-item product__actions-item--wishlist">
                                    <a href="{{route('user.favorite.add',$productDetail->id)}}">
                                    <button type="button" class="btn btn-secondary btn-svg-icon btn-lg"
                                            data-toggle="tooltip" title="" data-original-title="Wishlist">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="{{asset('images/sprite.svg#wishlist-16')}}"></use>
                                        </svg>
                                    </button>
                                    </a>
                                </div>

                                <div class="product__prices">{{number_format($productDetail->pro_price,0,',','.')}}Vnđ
                                </div>
                                <!-- .product__options -->
                                <form class="product__options" method="get"
                                      action="{{route('add.shopping.product',$productDetail->id)}}">
                                    <div class="form-group product__option">
                                        <label class="product__option-label" for="product-quantity">Số lượng</label>
                                        <div class="product__actions">
                                            <div class="product__actions-item">
                                                <div class="input-number product__quantity">
                                                    <input id="product-quantity"
                                                           class="input-number__input form-control form-control-lg"
                                                           type="number" min="1" value="1" name="quantity">
                                                    <div class="input-number__add"></div>
                                                    <div class="input-number__sub"></div>
                                                </div>
                                            </div>
                                            <div class="product__actions-item product__actions-item--addtocart">
                                                <button class="btn btn-primary product-card__addtocart"
                                                        type="submit">Thêm vào giỏ hàng
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                                <!-- .product__options / end -->
                            </div>
                            <!-- .product__end -->

                            <div class="product__footer">
                                <div class="product__tags tags">
                                    <div class="tags__list"><a href="#">Mounts</a> <a href="#">Electrodes</a> <a
                                            href="#">Chainsaws</a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="product__share-links share-links">
                                <ul class="share-links__list">
                                    <li class="share-links__item share-links__item--type--like"><a href="#">Like</a>
                                    </li>
                                    <li class="share-links__item share-links__item--type--tweet"><a href="#">Tweet</a>
                                    </li>
                                    <li class="share-links__item share-links__item--type--pin"><a href="#">Pin It</a>
                                    </li>
                                    <li class="share-links__item share-links__item--type--counter"><a href="#">4K</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="product-tabs">
                        <div class="product-tabs__list"><a href="#tab-description"
                                                           class="product-tabs__item product-tabs__item--active">Mô
                                tả</a> <a href="#tab-reviews" class="product-tabs__item">Bình luận</a></div>
                        <div class="product-tabs__content">
                            <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
                                <div class="typography">
                                    {!! $productDetail->pro_content !!}
                                </div>
                            </div>
                            <div class="product-tabs__pane" id="tab-reviews">

                                <div class="reviews-view">
                                    <div class="reviews-view__list">

                                        <h3 class="reviews-view__header">Bình luận của khách hàng</h3>
                                        <div class="reviews-list">
                                            <ol class="reviews-list__content">

                                                @if(isset($ratings))
                                                    @foreach($ratings as $rating)
                                                        <li class="reviews-list__item">
                                                            <div class="review">
                                                                <div class="review__avatar"><img
                                                                        src="{{isset($rating->user->avatar) ? pare_url_file($rating->user->avatar) : asset('none.jpg')}}"
                                                                        alt=""></div>
                                                                <div class="review__content">
                                                                    <div
                                                                        class="review__author">{{isset($rating->user['name']) ? $rating->user['name'] : 'N\A'}}</div>
                                                                    <div class="review__rating">
                                                                        <div class="rating">
                                                                            <div class="rating__body">
                                                                                @for($i =1 ; $i <= $rating->ra_number;$i++)
                                                                                    <svg
                                                                                        class="rating__star rating__star--active"
                                                                                        width="13px" height="12px">
                                                                                        <g class="rating__fill">
                                                                                            <use
                                                                                                xlink:href="{{asset('images/sprite.svg#star-normal')}}"></use>
                                                                                        </g>
                                                                                        <g class="rating__stroke">
                                                                                            <use
                                                                                                xlink:href="{{asset('images/sprite.svg#star-normal-stroke')}}"></use>
                                                                                        </g>
                                                                                    </svg>
                                                                                    <div
                                                                                        class="rating__star rating__star--only-edge rating__star--active">
                                                                                        <div class="rating__fill">
                                                                                            <div
                                                                                                class="fake-svg-icon"></div>
                                                                                        </div>
                                                                                        <div class="rating__stroke">
                                                                                            <div
                                                                                                class="fake-svg-icon"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endfor
                                                                                @for($i = 1;$i <= (5- $rating->ra_number);$i++)
                                                                                    <svg class="rating__star"
                                                                                         width="13px" height="12px">
                                                                                        <g class="rating__fill">
                                                                                            <use
                                                                                                xlink:href="{{asset('images/sprite.svg#star-normal')}}"></use>
                                                                                        </g>
                                                                                        <g class="rating__stroke">
                                                                                            <use
                                                                                                xlink:href="{{asset('images/sprite.svg#star-normal-stroke')}}"></use>
                                                                                        </g>
                                                                                    </svg>
                                                                                    <div
                                                                                        class="rating__star rating__star--only-edge">
                                                                                        <div class="rating__fill">
                                                                                            <div
                                                                                                class="fake-svg-icon"></div>
                                                                                        </div>
                                                                                        <div class="rating__stroke">
                                                                                            <div
                                                                                                class="fake-svg-icon"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endfor

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="review__text">{{$rating->ra_content}}</div>
                                                                    <div
                                                                        class="review__date">{{date_format($rating->created_at,'d-m-Y')}}</div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ol>


                                            {{-- paginate --}}
                                            {{$ratings->links()}}
                                            {{-- paginate / end --}}
                                        </div>
                                    </div>
                                    <form class="reviews-view__form" method="post" action="">
                                        @csrf
                                        <h3 class="reviews-view__header">Bình luận</h3>
                                        <div class="row">
                                            <div class="col-12 col-lg-9 col-xl-8">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="review-stars">Cho điểm</label>
                                                        <select id="review-stars" class="form-control" name="rating">
                                                            <option value="5">5 sao</option>
                                                            <option value="4">4 sao</option>
                                                            <option value="3">3 sao</option>
                                                            <option value="2">2 sao</option>
                                                            <option value="1">1 sao</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="review-author">Tên của bạn:</label>
                                                        <input type="text" name="name" class="form-control"
                                                               id="review-author" placeholder="tên của bạn"
                                                               value="{{get_data_user('web','name')}}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="review-email">Email Address</label>
                                                        <input type="text" name="email" class="form-control"
                                                               id="review-email" placeholder="Email Address"
                                                               value="{{get_data_user('web','email')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="review-text">Nội dung bình luận</label>
                                                    <textarea class="form-control" name="contentt" id="review-text"
                                                              rows="6"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" name="id" class="form-control"
                                                           id="review-email" placeholder="Email Address"
                                                           value="{{$productDetail->id}}">
                                                </div>
                                                <div class="form-group mb-0">
                                                    <button type="submit" class="btn btn-primary btn-lg">Bình luận
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <!-- .Sản phẩm liên quan -->
        <div class="block block-products-carousel" data-layout="grid-4">
            <div class="container">
                <div class="block-header">
                    <h3 class="block-header__title">Sản phẩm liên quan</h3>
                    <div class="block-header__divider"></div>
                    <div class="block-header__arrows-list">
                        <button class="block-header__arrow block-header__arrow--left" type="button">
                            <svg width="7px" height="11px">
                                <use xlink:href="{{asset('images/sprite.svg#arrow-rounded-left-7x11')}}"></use>
                            </svg>
                        </button>
                        <button class="block-header__arrow block-header__arrow--right" type="button">
                            <svg width="7px" height="11px">
                                <use xlink:href="{{asset('images/sprite.svg#arrow-rounded-right-7x11')}}"></use>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="block-products-carousel__slider">
                    <div class="block-products-carousel__preloader"></div>
                    <div class="owl-carousel">
                        @if(isset($productRelates))
                            @foreach($productRelates as $proNew)
                                <div class="block-products-carousel__column">
                                    <div class="block-products-carousel__cell">
                                        <div class="product-card">
                                            <a href="{{ route('get.view.product',$proNew->id) }}"
                                               class="product-card__quickview js_product_detail" type="button">
                                                <svg width="16px" height="16px">
                                                    <use xlink:href="{{asset('images/sprite.svg#quickview-16')}}"></use>
                                                </svg>
                                                <span class="fake-svg-icon"></span></a>
                                            @if($proNew->pro_number == 0)
                                                <div class="product-card__badges-list">
                                                    <div class="product-card__badge product-card__badge--out">Tạm hết
                                                        hàng
                                                    </div>
                                                </div>
                                            @else
                                                <div class="product-card__badges-list">
                                                    <div class="product-card__badge product-card__badge--new">Mới</div>
                                                </div>
                                            @endif


                                            <div class="product-card__image">
                                                <a href="{{route('get.detail.product',[$proNew->pro_slug,$proNew->id])}}"><img
                                                        src="{{pare_url_file($proNew->pro_avatar)}}"
                                                        alt="{{$proNew->pro_name}}"></a>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__name"><a
                                                        href="{{route('get.detail.product',[$proNew->pro_slug,$proNew->id])}}">{{$proNew->pro_name}}</a>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            @if($proNew->pro_total_rating > 0)
                                                                <?php $rating = round($proNew->pro_total_number_rating / $proNew->pro_total_rating) ?>

                                                                @for($i =1 ; $i <= $rating;$i++)
                                                                    <svg class="rating__star rating__star--active"
                                                                         width="13px" height="12px">
                                                                        <g class="rating__fill">
                                                                            <use
                                                                                xlink:href="{{asset('images/sprite.svg#star-normal')}}"></use>
                                                                        </g>
                                                                        <g class="rating__stroke">
                                                                            <use
                                                                                xlink:href="{{asset('images/sprite.svg#star-normal-stroke')}}"></use>
                                                                        </g>
                                                                    </svg>
                                                                    <div
                                                                        class="rating__star rating__star--only-edge rating__star--active">
                                                                        <div class="rating__fill">
                                                                            <div class="fake-svg-icon"></div>
                                                                        </div>
                                                                        <div class="rating__stroke">
                                                                            <div class="fake-svg-icon"></div>
                                                                        </div>
                                                                    </div>
                                                                @endfor
                                                                @for($i = 1;$i <= (5- $rating);$i++)
                                                                    <svg class="rating__star" width="13px"
                                                                         height="12px">
                                                                        <g class="rating__fill">
                                                                            <use
                                                                                xlink:href="{{asset('images/sprite.svg#star-normal')}}"></use>
                                                                        </g>
                                                                        <g class="rating__stroke">
                                                                            <use
                                                                                xlink:href="{{asset('images/sprite.svg#star-normal-stroke')}}"></use>
                                                                        </g>
                                                                    </svg>
                                                                    <div class="rating__star rating__star--only-edge">
                                                                        <div class="rating__fill">
                                                                            <div class="fake-svg-icon"></div>
                                                                        </div>
                                                                        <div class="rating__stroke">
                                                                            <div class="fake-svg-icon"></div>
                                                                        </div>
                                                                    </div>
                                                                @endfor
                                                            @else
                                                                @for($i = 1;$i <= 5;$i++)
                                                                    <svg class="rating__star" width="13px"
                                                                         height="12px">
                                                                        <g class="rating__fill">
                                                                            <use
                                                                                xlink:href="{{asset('images/sprite.svg#star-normal')}}"></use>
                                                                        </g>
                                                                        <g class="rating__stroke">
                                                                            <use
                                                                                xlink:href="{{asset('images/sprite.svg#star-normal-stroke')}}"></use>
                                                                        </g>
                                                                    </svg>
                                                                    <div class="rating__star rating__star--only-edge">
                                                                        <div class="rating__fill">
                                                                            <div class="fake-svg-icon"></div>
                                                                        </div>
                                                                        <div class="rating__stroke">
                                                                            <div class="fake-svg-icon"></div>
                                                                        </div>
                                                                    </div>
                                                                @endfor
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="product-card__rating-legend">{{$proNew->pro_total_rating}}
                                                        đánh giá
                                                    </div>
                                                </div>
                                                <ul class="product-card__features-list">
                                                    <li>Speed: 750 RPM</li>
                                                    <li>Power Source: Cordless-Electric</li>
                                                    <li>Battery Cell Type: Lithium</li>
                                                    <li>Voltage: 20 Volts</li>
                                                    <li>Battery Capacity: 2 Ah</li>
                                                </ul>
                                            </div>
                                            <div class="product-card__actions">
                                                <div class="product-card__availability">Availability: <span
                                                        class="text-success">In Stock</span></div>
                                                <div class="product-card__prices">$1,019.00</div>
                                                <div class="product-card__buttons">
                                                    <a href="{{route('add.shopping.product',$proNew->id)}}">
                                                        <button class="btn btn-primary product-card__addtocart"
                                                                type="button">Add To Cart
                                                        </button>
                                                    </a>
                                                    <button
                                                        class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                        type="button">Add To Cart
                                                    </button>
                                                    <button
                                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                        type="button">
                                                        <svg width="16px" height="16px">
                                                            <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                        </svg>
                                                        <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                    </button>
                                                    <button
                                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                        type="button">
                                                        <svg width="16px" height="16px">
                                                            <use xlink:href="images/sprite.svg#compare-16"></use>
                                                        </svg>
                                                        <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <!-- .Sản phẩm liên quan  / end -->
    </div>
@stop
