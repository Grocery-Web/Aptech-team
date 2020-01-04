@extends('layouts.master')
@section('content')
<div class="container list_item">
    <h2 class="heading__title">
        Search by Categories
    </h2>
    <div class="card-deck">
        <?php
            $count =0;
        ?>
        @foreach ($products as $product)
        <?php
            $count++;
        ?>
                <div class="card list_item__card">
                    <a href="{{ route('productDetails',['id' => $product->id])}}"> <img class="card-img-top list_item__card--img" src="{{asset ('storage')}}/product_images/{{$product['image']}}" alt="">
                        <div class="card-body list_item__card--body">
                            <h4 class="card-title list_item__card--title">{{$product->name}}</h4>
                            <p class="card-text list_item__card--text">
                                ${{$product->price}}</p>
                        </div>
                    </a>
                </div>
                <?php
                    if ($count % 2 == 0) {
                        echo'<div class="w-100 d-none d-sm-block d-md-none"></div>';
                        //wrap every 2 on sm
                    };
                    if ($count % 3 == 0){
                        echo '<div class="w-100 d-none d-md-block d-lg-none">
                    </div>';
                    // <!-- wrap every 3 on md-->
                    }
                    if ($count % 4 == 0){
                        echo '<div class="w-100 d-none d-lg-block d-xl-none"></div>';
                    // <!-- wrap every 4 on lg-->
                    }
                    if ($count % 6 == 0){
                        echo'<div class="w-100 d-none d-xl-block">
                        </div>';
                    // <!-- wrap every 6 on xl-->
                    };
                ?>
            @endforeach
    </div>
    <div class="row justify-content-center">
        {{ $products->links() }}
    </div>
</div>
@endsection
