@extends('layout')
@section('content')
    <?php
    $termeklekerdezes = DB::select("SELECT brands.name as barnd, products.description as description,  products.alcohol as alcohol, products.capacity as capacity, categories.name as catname, products.id as id, products.name as name, round(products.price+((products.price/100)*vats.vat)) as price, round(products.actionprice+((products.actionprice/100)*vats.vat)) as actionprice, products.picturename as picturename, round(AVG(point)) as pont FROM `ratings` INNER join products on products.id = ratings.productID inner join categories on categories.id = products.categoryID inner join brands on brands.id = products.brandID  INNER JOIN vats on vats.id = products.vatID WHERE products.quantity > 0 and  products.id = '" . $termek->id . "' GROUP BY products.id order by RAND() limit 3;");
    ?>
    <form method='post' action=''>
        <div class='site-section bg-primary py-5 page-title-wrap mt-5'>
            <div class='container'>
                <br>
                <h1>
                    <p style='float: left'>{{ $termeklekerdezes[0]->name }} </p>
                </h1>
                <h3>
                    @if ($termeklekerdezes[0]->pont == 1)
                        <div class='rating'>
                            <span class='icon-star'></span>
                            <span class='icon-star-o'></span>
                            <span class='icon-star-o'></span>
                            <span class='icon-star-o'></span>
                            <span class='icon-star-o'></span>
                        </div>
                    @endif
                    @if ($termeklekerdezes[0]->pont == 2)
                        <div class='rating'>
                            <span class='icon-star'></span>
                            <span class='icon-star'></span>
                            <span class='icon-star-o'></span>
                            <span class='icon-star-o'></span>
                            <span class='icon-star-o'></span>
                        </div>
                    @endif
                    @if ($termeklekerdezes[0]->pont == 3)
                        <div class='rating'>
                            <span class='icon-star'></span>
                            <span class='icon-star'></span>
                            <span class='icon-star'></span>
                            <span class='icon-star-o'></span>
                            <span class='icon-star-o'></span>
                        </div>
                    @endif
                    @if ($termeklekerdezes[0]->pont == 4)
                        <div class='rating'>
                            <span class='icon-star'></span>
                            <span class='icon-star'></span>
                            <span class='icon-star'></span>
                            <span class='icon-star'></span>
                            <span class='icon-star-o'></span>
                        </div>
                    @endif
                    @if ($termeklekerdezes[0]->pont == 5)
                        <div class='rating'>
                            <span class='icon-star'></span>
                            <span class='icon-star'></span>
                            <span class='icon-star'></span>
                            <span class='icon-star'></span>
                            <span class='icon-star'></span>
                        </div>
                    @endif
                </h3>
            </div>
        </div>
        <div class='site-section mt-5'>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-6'>
                        <img src='/images/termekkepek/{{ $termeklekerdezes[0]->picturename }}' alt='Image'
                            class='img-fluid'>
                    </div>
                    <div class='col-lg-5 ml-auto'>
                        <h2 class='text-primary'>{{ $termeklekerdezes[0]->name }} </h2>
                        @if ($termeklekerdezes[0]->actionprice > 0)
                            <h2 class='text-primary'>
                                <del style='color: red'>{{ $termeklekerdezes[0]->price }} Ft</del>
                                {{ $termeklekerdezes[0]->actionprice }} Ft
                            </h2>
                        @else
                            <h2 class='text-primary'>{{ $termeklekerdezes[0]->price }} Ft</h2>
                        @endif
                        <p>Márka: {{ $termeklekerdezes[0]->barnd }} </p>
                        <p>Alkoholfok: {{ $termeklekerdezes[0]->alcohol }} °</p>
                        <p>Mennyiség: {{ $termeklekerdezes[0]->capacity }} ml</p>
                        <p>Leírás:</p>
                        <p>{{ $termeklekerdezes[0]->description }} </p>
                        <p><input name='quantity' type='submit' value='Kosárba'
                                class='btn btn-outline-dark  btn-lg btn-block' />
                        </p>
    </form>
    <form method='post' action=''>
        <p>
            <select style='width: auto' class='custom-select' name='csillag'>
                <option selected>Önnek mennyire ízlett?</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
            </select> <input name='quantity' type='submit' value='Beküldés' class='btn btn-outline-dark' />
        </p>
    </form>
    </div>
    </div>
@endsection
