<x-app-layout>
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

                            <ul class="nav nav-pills mb-3 mt-3 nav-justified" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Buy</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Sell</button>
                                </li>
                              </ul>
                              <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                    <form class="row g-3" action="{{ route('trade') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="type" value="instant">
                                        <input type="hidden" name="department" value="price">
                                        <input type="hidden" name="side" value="buy">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                              <select class="form-select" id="from" name="from" aria-label="Buy with">
                                                <option selected="">--Select--</option>
                                                @foreach ($from_wallets as $from_wallet)
                                                    <option value="{{ $from_wallet->id }}">{{ $from_wallet->name }}</option>
                                                @endforeach
                                              </select>
                                              <label for="floatingSelect">Buy with</label>
                                            </div>
                                          </div>
                                        <div class="col-md-6">
                                          <div class="form-floating mb-3">
                                            <select class="form-select" id="to" name="to" aria-label="Currency to Buy">
                                                <option selected="">--Select--</option>
                                                @foreach ($to_wallets as $to_wallet)
                                                    <option value="{{ $to_wallet->id }}">{{ $to_wallet->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="floatingSelect">Currency to Buy</label>
                                          </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="form-floating">
                                            <input type="text" class="form-control" id="amount" name="amount" placeholder="amount">
                                            <label for="amount">Amount to Spend</label>
                                          </div>
                                        </div>
                                        <div class="text-center">
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                          <button type="reset" class="btn btn-secondary">Reset</button>
                                        </div>
                                      </form>


                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                    <form class="row g-3" action="{{ route('trade') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="type" value="instant">
                                        <input type="hidden" name="department" value="price">
                                        <input type="hidden" name="side" value="sell">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                              <select class="form-select" id="floatingSelect" name="to" aria-label="State">
                                                <option selected="">--Select--</option>
                                                @foreach ($to_wallets as $to_wallet)
                                                    <option value="{{ $to_wallet->id }}">{{ $to_wallet->name }}</option>
                                                @endforeach
                                              </select>
                                              <label for="floatingSelect">Currency to Sell</label>
                                            </div>
                                          </div>
                                        <div class="col-md-6">
                                          <div class="form-floating mb-3">
                                            <select class="form-select" id="floatingSelect" name="from" aria-label="State">
                                                <option selected="">--Select--</option>
                                                @foreach ($from_wallets as $from_wallet)
                                                    <option value="{{ $from_wallet->id }}">{{ $from_wallet->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="floatingSelect">Sell for</label>
                                          </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingZip" name="amount" placeholder="Zip">
                                            <label for="floatingZip">Amount to Spend</label>
                                          </div>
                                        </div>
                                        <div class="text-center">
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                          <button type="reset" class="btn btn-secondary">Reset</button>
                                        </div>
                                      </form>

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
               $(document).ready(function(){

  function get_fee(id) {
    $.ajax({
         url: "{{ url('/withdraw/fee') }}/"+id,
         type: 'get',
         dataType: 'json',
         success: function(response){
            $('#fee_area').text(response['data']['amount']);
            //alert(response['data']['amount']);
         }
     });

    }

$('#wallet_id').change(function(){

    //alert('go');

     var id = $(this).val();
        get_fee(id);
     // Empty the dropdown
     $('#address_id').find('option').not(':first').remove();

     // AJAX request
     $.ajax({
         url: "{{ url('/beneficiary') }}/"+id,
         type: 'get',
         dataType: 'json',
         success: function(response){

             var len = 0;
             if(response['data'] != null){
                  len = response['data'].length;
             }

             if(len > 0){
                  // Read data and create <option >
                  for(var i=0; i<len; i++){

                       var id = response['data'][i].address;
                       var name = response['data'][i].display_name;

                       var option = "<option value='"+id+"'>"+id+"-"+name+"</option>";

                       $("#address_id").append(option);
                  }
             }

         }
     });
});
});
         </script>
         @endsection
   </x-app-layout>
