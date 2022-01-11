@extends('layouts.frontend')

@section('content')
<style>
     .subscription.bg-white {
     background: none
 }

 .bg-white {
     background-color: #fff !important
 }

 .subscription.bg-white .subscription-wrapper {
     background: #fff
 }

 .subscription-wrapper {
     border-radius: 0% 5% 10% 3%/10% 20% 0% 17%;
     -webkit-transform: perspective(1800px) rotateY(20deg) skewY(1deg) translateX(50px);
     transform: perspective(1800px) rotateY(20deg) skewY(1deg) translateX(50px);
     padding: 70px 50px;
     z-index: 1;
     width: 100%;
     background: linear-gradient(80deg, #0030cc 0%, #00a4db 100%);
     position: absolute;
     top: 100px
 }

 .subscription-wrapper {
     box-shadow: 0px 15px 39px 0px rgba(8, 18, 109, 0.1) !important
 }

 .subscription-content {
     -webkit-transform: skewY(-1deg);
     transform: skewY(-1deg)
 }

 h3,
 .h3 {
     font-size: 30px
 }

 .flex-fill {
     -ms-flex: 1 1 auto !important;
     flex: 1 1 auto !important
 }

 .subscription.bg-white .form-control {
     border: 1px solid #ebebeb !important
 }

 .subscription-wrapper .form-control {
     height: 60px;
     background: rgba(255, 255, 255, 0.1);
     border-radius: 45px
 }

 .subscription-wrapper .form-control:focus {
     background: rgba(255, 255, 255, 0.1);
     outline: 0;
     box-shadow: none
 }

 .btn:not(:disabled):not(.disabled) {
     cursor: pointer
 }

 .btn-primary {
     border: 0;
     color: #fff
 }

 .btn {
     font-size: 16px;
     font-family: "Poppins", sans-serif;
     text-transform: capitalize;
     padding: 18px 45px;
     border-radius: 45px;
     font-weight: 500;
     border: 1px solid;
     position: relative;
     z-index: 1;
     transition: .3s ease-in;
     overflow: hidden
 }

 .btn-primary:after {
     content: '';
     position: absolute;
     top: 0;
     left: 0;
     width: 102%;
     height: 100%;
     background: linear-gradient(45deg, #00a8f4 0%, #02d1a1 100%);
     z-index: -1;
     transition: ease 0.3s
 }
    </style>


    <div class="container px-6 mx-auto">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" style=" width:100%; height: 500px !important;">
      @foreach ($products as $key=>$product)
      <div class="item {{$key == 0 ? 'active' : ''}}">
        <img src="{{ url($product->image) }}" alt="{{ $product->name }}" style="width:100%;">
      </div>
      @endforeach
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  @if ($message = Session::get('success'))
        <div class="p-4 mb-3 bg-green-400 rounded">
            <p class="text-green-800">{{ $message }}</p>
        </div>
    @endif
        <h3 class="text-2xl font-medium text-gray-700"><b>Product List</b></h3>
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($products as $product)
            <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">
                <img src="{{ url($product->image) }}" alt="" class="w-full max-h-60">
                <div class="flex items-end justify-end w-full bg-cover">
                    
                </div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                    <span class="mt-2 text-gray-500">${{ $product->price }}</span>
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->image }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button>
                    </form>
                </div>
                
            </div>
            @endforeach
        </div>

        




        <section class="subscription bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="subscription-wrapper">
                            <div class="d-flex subscription-content justify-content-between align-items-center flex-column flex-md-row text-center text-md-left">
                                <h3 class="flex-fill">Subscribe <br> to our newsletter</h3>
                                <form action="{{route('add.email')}}" class="row flex-fill">
                                    <div class="col-lg-7 my-md-2 my-2"> <input type="email" class="form-control px-4 border-0 w-100 text-center text-md-left" id="email" placeholder="Your Email" name="email" required> </div>
                                    <div class="col-lg-5 my-md-2 my-2"> <button type="submit" class="btn btn-primary btn-lg border-0 w-100">Subscribe Now</button> </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>









    </div>
    <script>
    (function($) {
    $(function() {
        $('.carousel').jcarousel({
            wrap: 'circular'
        });
    });
})(jQuery)
    </script>
@endsection