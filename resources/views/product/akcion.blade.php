@extends('layout')
@section('content')
    <div class="site-section mt-5">
        <div class="container">
            <div class="row">
                <?php
                $randomterm = DB::select('SELECT products.id as id, products.name as name, round(products.price+((products.price/100)*vats.vat)) as price, round(products.actionprice+((products.actionprice/100)*vats.vat)) as actionprice, products.picturename as picturename, round(AVG(point)) as pont FROM `ratings` INNER join products on products.id = ratings.productID INNER JOIN vats on vats.id = products.vatID WHERE products.actionprice > 0 and products.quantity > 0 GROUP BY products.id ;');

                ?>
                @if (isset($randomterm))
                    @foreach ($randomterm as $r)
                        <div class='col-lg-4 mb-5 col-md-6'>
                            <form method='post' action='cart.php?action=add&id=&quantity=1'>
                                <div class='wine_v_1 text-center pb-4'>
                                    <a href='/termekek/{{ $r->id }}' class='thumbnail d-block mb-4'><img
                                            src="/images/termekkepek/{{ $r->picturename }}" alt='Image'
                                            class='img-fluid'></a>
                                    <div>
                                        <h3 class='heading mb-1'><a
                                                href='/termekek/{{ $r->id }}'>{{ $r->name }}</a></h3>
                                        @if ($r->actionprice == 0)
                                            <span class='price'>{{ $r->price }} Ft</span>
                                        @else
                                            <span class='price'><del style='color: red'>{{ $r->price }}
                                                    Ft</del>{{ $r->actionprice }} Ft</span>
                                        @endif
                                    </div>
                                    <div class='wine-actions'>
                                        <h3 class='heading-2'><a
                                                href='/termekek/{{ $r->id }}'>{{ $r->name }}</a></h3>
                                        @if ($r->actionprice == 0)
                                            <span class='price'>{{ $r->price }} Ft</span>
                                        @else
                                            <span class='price'><del style='color: red'>{{ $r->price }}
                                                    Ft</del>{{ $r->actionprice }} Ft</span>
                                        @endif
                                        @if ($r->pont == 1)
                                            <div class='rating'>
                                                <span class='icon-star'></span>
                                                <span class='icon-star-o'></span>
                                                <span class='icon-star-o'></span>
                                                <span class='icon-star-o'></span>
                                                <span class='icon-star-o'></span>
                                            </div>
                                        @endif
                                        @if ($r->pont == 2)
                                            <div class='rating'>
                                                <span class='icon-star'></span>
                                                <span class='icon-star'></span>
                                                <span class='icon-star-o'></span>
                                                <span class='icon-star-o'></span>
                                                <span class='icon-star-o'></span>
                                            </div>
                                        @endif
                                        @if ($r->pont == 3)
                                            <div class='rating'>
                                                <span class='icon-star'></span>
                                                <span class='icon-star'></span>
                                                <span class='icon-star'></span>
                                                <span class='icon-star-o'></span>
                                                <span class='icon-star-o'></span>
                                            </div>
                                        @endif
                                        @if ($r->pont == 4)
                                            <div class='rating'>
                                                <span class='icon-star'></span>
                                                <span class='icon-star'></span>
                                                <span class='icon-star'></span>
                                                <span class='icon-star'></span>
                                                <span class='icon-star-o'></span>
                                            </div>
                                        @endif
                                        @if ($r->pont == 5)
                                            <div class='rating'>
                                                <span class='icon-star'></span>
                                                <span class='icon-star'></span>
                                                <span class='icon-star'></span>
                                                <span class='icon-star'></span>
                                                <span class='icon-star'></span>
                                            </div>
                                        @endif
                                        <input name="quantity" type="submit" value="Kosárba" class="btnAddAction" />
                                    </div>
                                </div>
                        </div>
                        </form>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
