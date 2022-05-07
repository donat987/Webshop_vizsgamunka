@extends('layout')
@section('content')
    <div class="owl-carousel hero-slide owl-style">
        <div class="intro-section container" style="background-image: url('images/palinka1.jpg');">
            <div class="row justify-content-center text-center align-items-center">
                <div class="col-md-8">
                    <span class="sub-title">Magyarország</span>
                    <h1>Legjobb pálinkái</h1>
                </div>
            </div>
        </div>
        <div class="intro-section container" style="background-image: url('images/palinka2.jpg');">
            <div class="row justify-content-center text-center align-items-center">
                <div class="col-md-8">
                    <span class="sub-title">Üdvözlünk!</span>
                    <h1>Pálinkák mindenkinek aki szereti</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section mt-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 section-title text-center mb-5">
                    <h2 class="d-block">Termékeink</h2>
                    <p>Gondosan válogatott, minőségi pálinkák!</p>
                    <p><a href="#">Összes termék megtekintése <span class="icon-long-arrow-right"></span></a></p>
                </div>
            </div>
            <div class="row">
                <?php
                $randomterm = DB::select('SELECT products.id as id, products.name as name, round(products.price+((products.price/100)*vats.vat)) as price, round(products.actionprice+((products.actionprice/100)*vats.vat)) as actionprice, products.picturename as picturename, round(AVG(point)) as pont FROM `ratings` INNER join products on products.id = ratings.productID INNER JOIN vats on vats.id = products.vatID WHERE products.quantity > 0 GROUP BY products.id order by RAND() limit 3;');
                ?>
                @if (isset($randomterm))
                    @foreach ($randomterm as $r)
                        <div class='col-lg-4 mb-5 col-md-6'>
                            <form method='post' action='cart.php?action=add&id=&quantity=1'>
                                <div class='wine_v_1 text-center pb-4'>
                                    <a href='/termekek/{{ $r->id }}' class='thumbnail d-block mb-4'><img
                                            src="images/termekkepek/{{ $r->picturename }}" alt='Image'
                                            class='img-fluid'></a>
                                    <div>
                                        <h3 class='heading mb-1'><a href='/termekek/{{ $r->id }}'>{{ $r->name }}</a></h3>
                                        @if ($r->actionprice == 0)
                                            <span class='price'>{{ $r->price }} Ft</span>
                                        @else
                                            <span class='price'><del style='color: red'>{{ $r->price }}
                                                    Ft</del>{{ $r->actionprice }} Ft</span>
                                        @endif
                                    </div>
                                    <div class='wine-actions'>
                                        <h3 class='heading-2'><a href=''>{{ $r->name }}</a></h3>
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
    <div class="hero-2" style="background-image: url('images/hero_2.jpg');">
        <div class="container">
            <div class="row justify-content-center text-center align-items-center">
                <div class="col-md-8">
                    <span class="sub-title"></span>
                    <h2>Minőségi gyümölcsökből</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section bg-light">
        <div class="container">
            <div class="owl-carousel owl-slide-3 owl-slide">
                <blockquote class="testimony">
                    <img src="images/person_1.jpg" alt="Image">
                    <p>&ldquo;Egyszerű a rendelés, felhívnak, ha valami kifogyott és ajánlanak helyette másik terméket,
                        egyeztetnek a kiszállításkor.&rdquo;</p>
                    <p class="small text-primary">&mdash; Földesi Zsanett</p>
                </blockquote>
                <blockquote class="testimony">
                    <img src="images/person_2.jpg" alt="Image">
                    <p>&ldquo;Néha nehezen találjuk az árukat, de szinte mindig kihoznak mindent, csak ritkán változik a
                        rendeléshez képest a szállítás, aki hozza, kedves, megbízható.&rdquo;</p>
                    <p class="small text-primary">&mdash; Szakály Nándor</p>
                </blockquote>
                <blockquote class="testimony">
                    <img src="images/person_3.jpg" alt="Image">
                    <p>&ldquo;Módosítani akartam a kiszállítást és az ügyfélszolgálat nagyon segítőkész volt, mindenben
                        segített.&rdquo;</p>
                    <p class="small text-primary">&mdash; Mester Emese</p>
                </blockquote>
                <blockquote class="testimony">
                    <img src="images/person_4.jpg" alt="Image">
                    <p>&ldquo;Külön felhívtak az adatok egyeztetése miatt, nagyon kedves, figyelmes volt a hölgy, a futár
                        pedig pontos és megbízható!&rdquo;</p>
                    <p class="small text-primary">&mdash; Vig Istvan</p>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="site-section bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 section-title text-center mb-5">
                    <h2 class="d-block">Friss hírek</h2>
                    <p><a href="hirek.php">Összes hír megtekintése <span class="icon-long-arrow-right"></span></a></p>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </div>
@endsection
