<x-app-layout>

           <img class="elli" src="{{ asset('panel/images/Ellipse 1.png') }}" alt="">

           <img class="rec" src="{{ asset('panel/images/Rectangle 1.png') }}" alt="">
           <x-user.wallets/>
       </div>
       </div>

       <!-- Activities -->
       {{-- <div class="active p-3">
           <h5>Activities</h5>
           <div class="currency p-4 d-flex justify-content-between mt-3">
               <div>
                   <b>Replenish Deposits</b>
                   <p class="text-secondary">0.5btc</p>
               </div>
               <div>
                   <h6>$40,000.31899</h6>
                   <span class="text-secondary">$-200</span>
                   <span class="text-success">$4.47%</span>
               </div>
           </div>
       </div> --}}




    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <select class="form-select" id="floatingSelect" name="wallet_type" required
                                        aria-label="Floating label select example">
                                        <option selected="">Open this select menu</option>
                                        @foreach ($availableWallets as $availableWallet)
                                        <option value="{{ $availableWallet->id }}">{{ $availableWallet->display_name }}
                                        </option>
                                        @endforeach
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
            <h1> {{ __('Wallets') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">{{ __('Wallets') }}</li>
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
                                <h5 class="card-title">Your Wallets
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                       Create New
                                      </button>
                                </h5>
                                @if ($wallets->count() > 0)
                                @foreach ($wallets as $wallet)
                                <div class="accordion my-3" id="accordionExample">
                                    <div class="accordion-item">
                                        <div class="d-flex align-items-center justify-content-between my-2">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    @php
                                                    $walletAssign = GeneralHelper::walletAssign($wallet->id);
                                                    @endphp
                                                    <img src="{{ asset('assets/img/'.$walletAssign->type->logo) }}"
                                                        alt="" style="width: 55px;height: 55px;">
                                                </div>
                                                <div class="ps-3">
                                                    <h6>
                                                        {{ $walletAssign->type->display_name }}
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">

                                                <div class="ps-3">
                                                    <h6>{{ rtrim(rtrim(strval($wallet->balanceFloat), "0"), ".") }}</h6>

                                                </div>
                                                <button class="accordion-button collapsed" type="button"
                                                    title="Receive/Address" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne-{{ $wallet->id }}"
                                                    aria-expanded="false" aria-controls="collapseOne">
                                                </button>
                                            </div>
                                        </div>
                                        <div id="collapseOne-{{ $wallet->id }}" class="accordion-collapse collapse"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                            <div class="accordion-body">
                                                @if (isset($wallet->meta['address']['address']) && $wallet->meta['address']['address'] !=
                                                null)
                                                <div class="text-center mt-3">
                                                    {!! QrCode::size(300)->generate($wallet->meta['address']['address']); !!}
                                                </div>
                                                <div class="mt-5">
                                                    <div class="input-group mb-3">
                                                        <input readonly type="text" class="form-control"
                                                            placeholder="Recipient's username"
                                                            aria-label="Recipient's username"
                                                            value="{{ $wallet->meta['address']['address'] }}"
                                                            aria-describedby="basic-addon2" id="copyAddress">
                                                        <button title="Copy" class="input-group-text copyClip"
                                                            id="basic-addon2" data-clipboard-target="#copyAddress"><i
                                                                class="bi bi-clipboard-data" id="copyPrimary"></i><i
                                                                class="bi bi-clipboard-check-fill d-none"
                                                                id="copySuccess"></i></button>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="text-center mt-3">
                                                    <strong>Address Have Not Generate Yet. Please Try After Some
                                                        time</strong>
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
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
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
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>

    @section('scripts')
    <script>
        var clipboard = new ClipboardJS('.copyClip');
            clipboard.on('success', function(e) {

                if(!$("#copyPrimary").hasClass('d-none'))
                {
                    $("#copyPrimary").addClass('d-none');
                }
                if($("#copySuccess").hasClass('d-none'))
                {
                    $("#copySuccess").removeClass('d-none');
                }
                setTimeout(function() {
                if(!$("#copySuccess").hasClass('d-none'))
                {
                    $("#copySuccess").addClass('d-none');
                }
                if($("#copyPrimary").hasClass('d-none'))
                {
                    $("#copyPrimary").removeClass('d-none');
                }
                }, 3000);
                e.clearSelection();
            });
    </script>
    @endsection --}}
</x-app-layout>
