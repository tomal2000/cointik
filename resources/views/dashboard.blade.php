<x-app-layout>
    <div class=" content">
        <div class="d-flex  navsec">
            <img class="prof" src="{{ asset('panel/images/312225309_1079619072724196_7760179058326832321_n.jpg') }}" alt="">
            <h6 class=" text-white m-auto">Account Balance: {{ Auth::user()->primary_wallet.Str::upper(Auth::user()->primary_wallet_currency) }}</h6>
           <div class=" m-auto d-flex gap-4">
            <i class="fa-solid fa-eye fs-3 text-white"></i>
            <i class="fa-solid fa-bell fs-3 text-white"></i>
           </div>
        </div>

      </div>
      <div class="container-fluid func" >
        <div class="container col-lg-6  ">
          <ul class=" d-flex flex-wrap justify-content-between gap-3">
            <li class="">
             <i class="fa-solid  text-white rounded-circle border p-2 fa-envelope-circle-check"></i>
                <a class="nav-link text-white ">Home</a>
              </li>
            <li class="">
              <i class="fas fa-satellite-dish text-white rounded-circle border p-2 ms-2"></i>
                <a class="nav-link text-white ">Recieve</a>
              </li>
            <li class="">
              <span class="material-symbols-outlined text-white rounded-circle border p-2">
                euro_symbol
                </span>
                <a class="nav-link text-white">Deposits</a>
              </li>
            <li class="">
             <i class="fa-solid fs-5 text-white rounded-circle border p-2 fa-envelope-circle-check"></i>
                <a class="nav-link text-white" href="{{ route('wallet') }}">Wallet</a>
              </li>
            <li class="">
              <span class="material-symbols-outlined text-white rounded-circle border p-2 ">
                shopping_cart
                </span>
                <a class="nav-link text-white">Buy</a>
              </li>
            <li class="">
              <span class="material-symbols-outlined text-white rounded-circle border p-2">
                storefront
                </span>
                <a class="nav-link text-white ">Sell</a>
              </li>
            <li class="">
              <img class="w-50 text-white rounded-circle border p-2 ms-3" src="{{ asset('panel/images/bitcoin.png') }}" alt="">

                <a class="nav-link text-white">BTC Mining</a>
              </li>
        </ul>

        </div>
      </div>
       <!-- Nav bar complete -->

       <img class="elli" src="{{ asset('panel/images/Ellipse 1.png') }}" alt="">

       <img class="rec" src="{{ asset('panel/images/Rectangle 1.png') }}" alt="">

       <div class="second p-3">
           <div class="d-flex justify-content-between ">
               <b>Wallets</b>
               <b style="color: rgb(253,192,120);">+Add New</b>
           </div>
           <div class="currency p-2 d-flex justify-content-between mt-3">
               <div class="d-flex gap-4">
                   <i class="fa-sharp fa-solid fa-bitcoin-sign rounded-circle fs-3 p-3" style="background-color: rgb(244,219,189); color: rgb(250,158,48); height: 6vh;"></i>
                 <div>
                   <b>Bitcoin</b>
                   <p class="text-secondary">0.5btc</p>
                 </div>
               </div>
               <img class="vector" src="{{ asset('panel/images/Vector 1.png') }}" alt="">
               <div>
                   <h6>$40,000.31899</h6>
                   <span class="text-secondary">$-200</span>
                   <span class="text-danger">$4.47%</span>
               </div>
           </div>

           <div class="currency p-2 d-flex justify-content-between mt-3">
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
           </div>
       </div>
   </div>
   </div>

   <!-- Activities -->
   <div class="active p-3">
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
   </div>
</x-app-layout>
