@extends('base')

@section('content')

<style>
    .position-relative{
        
        border-bottom-right-radius: 15px;
        background-color: #92959a;
    }
</style>

<section class="bg-success py-5">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-md-8 text-white">
                    <h1>About Us</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
                <div class="col-md-4">

                    <!-- Start Banner Hero -->
                    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
                        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="row p-5">
                                <img src="assets/img/about-hero.svg" alt="About Hero"> 4
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row p-5">
                                <img src="assets/img/about-hero.svg" alt="About Hero">2
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row p-5">
                                <img src="assets/img/about-hero.svg" alt="About Hero"> 1
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
                <!-- End Banner Hero -->

                   
                </div>
            </div>
        </div>
    </section>
    <!-- Close Banner -->

    <!-- Start Section -->
      
    <div class="container mt-2">
       
       <div class="card">
       <div class="card-header">
           <h2 style="">Tous les produits de fleurs</h2>
               <!-- end csv -->
           </div>
       <div class="row">

       @foreach($fleurs as $key => $fleur)
           <div class="col-12 col-md-4 p-5 mt-3">
               <div class="card rounded-0">
                   <a href="#"><img src="{{url('images/fleurs/'.$fleur->photo)}}" class="card-img rounded-0 img-fluid" style=" width: 100%;height: 150px;"></a>
                   
               </div>
               <div class="card-body">
                   <a href="shop-single.html" class="h3 text-decoration-none">{{$fleur->name}}</a>
                   <p class="text-center mb-0">{{number_format($fleur->price) }} fcfa</p>
                   <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $fleur->id }}" name="id">
                        <input type="hidden" value="{{ $fleur->name }}" name="name">
                        <input type="hidden" value="{{ $fleur->price }}" name="price">
                        <input type="hidden" value="{{ $fleur->image }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="px-4 py-2 text-black rounded">Ajouter au panier</button>
                    </form>
               </div>
           </div>

         @endforeach

           
           </div>
           <div div="row">
               <ul class="pagination pagination-lg justify-content-end">
                   <li class="page-item disabled">
                       <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                   </li>
                   <li class="page-item">
                       <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                   </li>
                   <li class="page-item">
                       <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                   </li>
               </ul>
           </div>

          
           <!-- /.card-header -->
           
           <!-- /.card-body -->
       </div>

   </div>
    <!-- End Section -->
     <!-- Footer Start -->
     <div class="container-fluid bg-secondary mt-1 pt-1" style="background-color: #59ab6e !important;color: #ffffff !important;">
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left">
                     <a class="font-weight-semi-bold text-white" href="#"> MinaISEP</a> © 2022 - &copy;Tous droits réservés. Réalisé
                    par <strong>Mina</strong>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->

@endsection