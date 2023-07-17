<div>
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
                                    <select class="form-select" id="floatingSelect" name="wallet_type" required
                                        aria-label="Floating label select example">
                                        <option selected="">Open this select menu</option>
                                        @foreach ($walletsTypes as $walletsType)
                                        <option value="{{ $walletsType->id }}">{{ $walletsType->display_name }}
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
    <div class="second p-3">
        <div class="d-flex justify-content-between ">
            <b>Wallets</b>
            <b style="color: rgb(253,192,120);" data-bs-toggle="modal" data-bs-target="#exampleModal">+Add New</b>
        </div>
        @if ($wallets->count() > 0)


        @foreach ($wallets as $wallets)
        <div class="currency p-2 d-flex justify-content-between mt-3">
            <div class="d-flex gap-4">
                <i class="fa-sharp fa-solid fa-bitcoin-sign rounded-circle fs-3 p-3" style="background-color: rgb(244,219,189); color: rgb(250,158,48); height: 6vh;"></i>
              <div>
                <b>{{ $wallets->type->display_name }}</b>
                <p class="text-secondary">0.5{{ $wallets->type->currency_code }}</p>
              </div>
            </div>
            <img class="vector" src="{{ asset('panel/images/Vector 1.png') }}" alt="">
            <div>
                <h6>$40,000.31899</h6>
                <span class="text-secondary">$-200</span>
                <span class="text-danger">$4.47%</span>
            </div>
        </div>
        @endforeach
        @else
        <div class="text-center">No Wallet Have.</div>
        @endif


        {{-- <div class="currency p-2 d-flex justify-content-between mt-3">
            <div class="d-flex gap-4">
                <i class="fa-brands fa-ethereum rounded-circle fs-3 p-3" style="background-color: rgb(240,240,240); color: black; height: 6vh;"></i>
              <div>
                <b>Ethereum</b>
                <p class="text-secondary">0.5btc</p>
              </div>
            </div>
            <img class="vector" src="{{ asset('panel/images/Vector 3.png') }}" alt="">
            <div>
                <h6>$40,000.31899</h6>
                <span class="text-secondary">$-200</span>
                <span class="text-success">$4.47%</span>
            </div>
        </div>

        <div class="currency p-2 d-flex justify-content-between mt-3">
            <div class="d-flex gap-4">
                <i class="fa-sharp fa-solid fa-link rounded-circle fs-3 p-3" style="background-color: rgb(224,241,246); color: rgb(37,141,230); height: 6vh;"></i>
              <div>
                <b>Chain</b>
                <p class="text-secondary">0.5btc</p>
              </div>
            </div>
            <img class="vector" src="{{ asset('panel/images/Vector 4.png') }}" alt="">
            <div>
                <h6>$40,000.31899</h6>
                <span class="text-secondary">$-200</span>
                <span class="text-primary">$4.47%</span>
            </div>
        </div> --}}
    </div>
</div>
