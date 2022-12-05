@extends('base')

@section('content')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
          <main class="my-8">
            <div class="container px-6 mx-auto">
                <div class="flex justify-center my-6">
                    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                     
                        <h3 class="text-3xl text-bold">Liste du panier</h3>
                      <div class="flex-1">
                        <table class="w-full text-sm lg:text-base" cellspacing="0">
                          <thead>
                            <tr class="h-12 uppercase">
                              <th class="hidden md:table-cell"></th>
                              <th class="text-left">Nom</th>
                              <th class="pl-5 text-left lg:text-right lg:pl-0">
                                <span class="lg:hidden" title="Quantity">Qtd</span>
                                <span class="hidden lg:inline">Quatité</span>
                              </th>
                              <th class="hidden text-right md:table-cell"> Prix</th>
                              <th class="hidden text-right md:table-cell"> supprimer </th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($cartItems as $item)
                              @php
                                    $fleur = \App\Models\Fleur::find($item->id);
                                @endphp
                            <tr>
                              <td class="hidden pb-4 md:table-cell">
                                <a href="#">
                                <img src="{{url('images/fleurs/'.$fleur->photo)}}" style="width:50px" />
                                </a>
                              </td>
                              <td>
                                <a href="#">
                                  <p class="mb-2 md:ml-4">{{ $item->name }}</p>
                                  
                                </a>
                              </td>
                              <td class="justify-center mt-6 md:justify-end md:flex">
                                <div class="h-10 w-28">
                                  <div class="relative flex flex-row w-full h-8">
                                    
                                    <form action="{{ route('cart.update') }}" method="POST">
                                      @csrf
                                      <input type="hidden" name="id" value="{{ $item->id}}" >
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" 
                                    class="w-6 text-center bg-gray-300" />
                                    <button type="submit" class="px-2 pb-2 ml-2 text-white bg-blue-500">Modifier</button>
                                    </form>
                                  </div>
                                </div>
                              </td>
                              <td class="hidden text-right md:table-cell">
                                <span class="text-sm font-medium lg:text-base">
                                {{number_format($fleur->price) }} fcfa
                                </span>
                              </td>
                              <td class="hidden text-right md:table-cell">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                  @csrf
                                  <input type="hidden" value="{{ $item->id }}" name="id">
                                  <button class="px-4 py-2 text-white bg-red-600">x</button>
                              </form>
                                
                              </td>
                            </tr>
                            @endforeach
                             
                          </tbody>
                        </table>
                        <div class="row mt-5">
                    <div class="col-lg-6">
                    <div class="row">
                            <div class="col-lg-3">
                            Total: {{ Cart::getTotal() }} fcfa
                            </div>
                            <div class="col-lg-3">
                            <a href="{{ route('commande.index') }}" class="btn btn-primary">Commander</a>
                            </div>
                       </div>
                    </div>
                    <div class="col-lg-6">
                       <div class="row">
                            <div class="col-lg-3">
                                <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                <button class="px-6 py-2 text-red-800 bg-red-300">vider panier</button>
                                </form>
                            </div>
                            <div class="col-lg-3">
                                <a href="{{route('home')}}" class="btn btn-primary">Autre achat</a>
                            </div>
                       </div>
                    </div>
                </div>


                      </div>
                    </div>
                  </div>
            </div>
        </main>

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