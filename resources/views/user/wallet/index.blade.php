<x-app-layout>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('wallet') }}" method="POST">
                @csrf
                <div class="row mb-3">
                  <div class="col-sm-12">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingSelect" name="currency" required aria-label="Floating label select example">
                        <option selected="">Open this select menu</option>
                        <option value="btc">BTC</option>
                        <option value="ltc">LTC</option>
                        <option value="trx">trx</option>
                        {{-- <option value="2">Two</option>
                        <option value="3">Three</option> --}}
                      </select>
                      <label for="floatingSelect">Wallet Type</label>
                    </div>
                  </div>
                </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
       <x-slot name="header">
           <div class="pagetitle">
               <h1>   {{ __('Dashboard') }}</h1>
               <nav>
                 <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                   <li class="breadcrumb-item active">{{ __('Dashboard') }}</li>
                 </ol>
               </nav>
             </div><!-- End Page Title -->
       </x-slot>
         <section class="section dashboard">
           <div class="row">

             <!-- Left side columns -->
             <div class="col-lg-8 mx-auto">
               <div class="row">


                <div class="col-12">
                    <div class="card info-card revenue-card">
                      <div class="card-body">
                        <h5 class="card-title">Your Assets
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                               Create
                            </button>
                        </h5>
                        @if ($wallets->count() > 0)

                        @foreach ($wallets as $wallet)
                        <div class="accordion my-3" id="accordionExample">
                            <div class="accordion-item">
                        <div class="d-flex align-items-center justify-content-between my-2">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                  {{-- <i class="bi bi-currency-dollar"></i> --}}
                                  @switch($wallet->slug)
                                        @case('btc')
                                            <img src="{{ asset('assets/img/bitcoin.png') }}" alt="" style="width: 55px;height: 55px;">
                                            @break
                                        @default
                                        <i class="bi bi-currency-dollar"></i>
                                    @endswitch
                                </div>
                                <div class="ps-3">
                                  <h6>
                                    @switch($wallet->slug)
                                        @case('btc')
                                            Bitcoin
                                            @break
                                        @default
                                        NULL
                                    @endswitch
                                    ({{ Str::ucfirst($wallet->slug) }})</h6>
                                </div>
                              </div>
                              <div class="d-flex align-items-center">

                                <div class="ps-3">
                                  <h6>{{ $wallet->balanceFloat}}</h6>

                                </div>
                                <button class="accordion-button collapsed" type="button" title="Receive/Address" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{ $wallet->id }}" aria-expanded="false" aria-controls="collapseOne">
                                  </button>
                              </div>
                        </div>

                              {{-- <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                  View Address
                                </button>
                              </h2> --}}
                              <div id="collapseOne-{{ $wallet->id }}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body">
                                    @if (isset($wallet->meta['ac_keys']['address']) && $wallet->meta['ac_keys']['address'] != null)
                                    <div class="text-center mt-3">
                                          {!! QrCode::size(300)->generate($wallet->meta['ac_keys']['address']); !!}
                                    </div>
                                    <div class="mt-5"><div class="input-group mb-3">
                                        <input readonly type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" value="{{ $wallet->meta['ac_keys']['address'] }}" aria-describedby="basic-addon2">
                                        <span class="input-group-text" id="basic-addon2"><i class="bi bi-clipboard-data"></i></span>
                                      </div>
                                    </div>
                                    @else
                                    <div class="text-center mt-3">
                                       <strong>Address Have Not Generate Yet. Please Try After Some time</strong>
                                     </div>
                                    @endif


                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                        @else
                        <div class="text-center">You Have No Wallet. Please Create A New One</div>
                        @endif
                        {{-- <div class="d-flex align-items-center justify-content-between my-2">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                  <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                  <h6>Bitcoin (BTC)</h6>

                                </div>
                              </div>
                              <div class="d-flex align-items-center">

                                <div class="ps-3">
                                  <h6>0</h6>

                                </div>
                              </div>
                        </div> --}}

                      </div>

                    </div>
                  </div>
               </div>
             </div><!-- End Left side columns -->
           </div>
         </section>

         @section('scripts')
         @endsection
   </x-app-layout>
