<x-app-layout>
    <style>
        /* CSS */
button {
	border: none;
    background: none;
}
    </style>
      <!-- Confirmation Modal -->
      <div class="modal" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="confirmationModalLabel text-center">Transaction Confirmation</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-6">Transaction Type</div>
                      <div class="col-6 tnx_type"></div>
                    </div>
                    <hr class="hr" />
                    <div class="row">
                        <div class="col-6">Currency</div>
                        <div class="col-6 currency"></div>
                    </div>
                    <hr class="hr" />
                    <div class="row">
                        <div class="col-6">Transfer Type</div>
                        <div class="col-6 transfer_type"></div>
                    </div>
                    <hr class="hr" />
                    <div class="row">
                        <div class="col-6">To</div>
                        <div class="col-6 to"></div>
                    </div>
                    <hr class="hr" />
                    <div class="row">
                        <div class="col-6">Amount</div>
                        <div class="col-6 am"></div>
                    </div>
                    <hr class="hr" />
                    <div class="row">
                        <div class="col-6">Fee</div>
                        <div class="col-6 fee"></div>
                    </div>
                    <hr class="hr" />
                    <div class="row">
                        <div class="col-6">Total</div>
                        <div class="col-6 total"></div>
                    </div>
                    <hr class="hr" />
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="confirm_transaction_button">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Modal -->
    <div class="modal fade" id="createWallet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <select class="form-select" id="floatingSelect" name="currency" required
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
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="createAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('beneficiary') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" name="wallet_id" required
                                        aria-label="Floating label select example">
                                        <option selected="">--Select--</option>
                                        @foreach ($wallets as $wallet)
                                        <option value="{{ $wallet->id }}">{{ $wallet->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Wallet Type</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingEmail" name="address"
                                        placeholder="Your Email">
                                    <label for="floatingEmail">Address</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingEmail" name="display_name"
                                        placeholder="Your Email">
                                    <label for="floatingEmail">Label</label>
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
            <h1> {{ __('Dashboard') }}</h1>
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

                                    <form class="row g-3 mt-5" id="transfer_form" action="{{ route('send') }}" method="POST">
                                        @csrf
                                        <input type="hidden" id="rate" value="0">
                                        <input type="hidden" id="vol" value="0">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="form-floating flex-grow-1">
                                                    <select class="form-select" name="wallet_id" id="wallet_id"
                                                        aria-label="Wallet Id">
                                                        <option selected="" value="">--Select--</option>
                                                        @foreach ($wallets as $wallet)
                                                        <option data-currency="{{ $wallet->slug }}" data-balance="{{ $wallet->balanceFloat }}" value="{{ $wallet->id }}">{{ $wallet->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="wallet_id">Wallet</label>

                                                </div>
                                                <span class="input-group-text"><button type="button"
                                                        data-bs-toggle="modal" data-bs-target="#createWallet">Create Wallet</button></span>

                                            </div>
                                            <span class="d-flex justify-content-end">Fee: <span id="fee_area" class="">0</span></span>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="form-floating flex-grow-1">
                                                    <select class="form-select" name="address_id" id="address_id"
                                                        aria-label="State">
                                                        <option selected="" value="">Select Address</option>
                                                    </select>
                                                    <label for="address_id">Address</label>
                                                </div>
                                                <span class="input-group-text"><button type="button"
                                                        data-bs-toggle="modal" data-bs-target="#createAddress">Add New
                                                        Address</button></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control amount" id="crypto_amount"
                                                            placeholder="Amount" name="crypto_amount">
                                                        <label for="amount" id="labelOfAmount">Amount</label>
                                                    </div>
                                                </div>
                                                <div class="col-2 d-flex justify-content-center">
                                                    <button type="button" class="btn btn-primary"><i class="bi bi-arrow-left-right"></i></button>
                                                </div>
                                                <div class="col-5 mx-auto">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control amount" id="local_amount"
                                                            placeholder="Amount" name="local_amount" data-currency="ngn" readonly>
                                                        <label for="amount">NGN</label>
                                                    </div>
                                                </div>

                                            </div>
                                            {{-- <div class="form-floating">
                                                <input type="text" class="form-control amount" id="amount"
                                                    placeholder="Amount" name="amount">
                                                <label for="amount">Amount</label>
                                            </div> --}}
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="note"
                                                    placeholder="Note" name="note">
                                                <label for="naration">Note</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Process</button>
                                        </div>
                                    </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>

    @section('scripts')
    <script>
        const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
        $(document).ready(function(){
        $("#transfer_form").validate({
            rules: {
                wallet_id: {
                required: true
            },
            address_id:{
                required: true
            },
            amount:{
                required: true
            },
            naration:{
                required: true
            }
            },
            errorPlacement: function (error, element) {
            console.log('dd', element.prop('tagName'));
            if(element.prop('tagName') == 'SELECT')
            {
                error.insertAfter(element.parent().parent());
            }
            else{
                error.insertAfter(element.parent());
            }

            },
            submitHandler: function(form) {
                var  tnx_type = "Crypto Transfer";
                var  currency = $('#wallet_id option:selected').text();
                var  fee = $('#fee_area').text();
                var  transfer_type = "External";
                var  to = $('#address_id option:selected').text();
                var  amount = $('#crypto_amount').val();
                var  naration = $('#note').val();
                //var  total = $('#total').val();
                $('.tnx_type').text(tnx_type);
                $('.currency').text(currency);
                $('.transfer_type').text(transfer_type);
                $('.to').text(to);
                $('.am').text(amount);
                $('.fee').text(fee);
                $('.total').text(parseFloat(amount) + parseFloat(fee));
                confirmationModal.show();

                $( "#confirm_transaction_button" ).on('click',function(e) {
                    confirmationModal.hide();
                    showLoading();
                    form.submit();
                    // $.ajax({
                    //     url: $(form).attr('action'),
                    //     type: "POST",
                    //     data: new FormData(form),
                    //     contentType: false,
                    //     cache: false,
                    //     processData: false,
                    //     success: function(response) {
                    //         $(form).trigger("reset");
                    //         console.log(response);
                    //         if(response.status == 'success')
                    //         {
                    //             Swal.fire(
                    //                 'Success!',
                    //                 'Transaction processed successfully',
                    //                 'success'
                    //               );
                    //             return;
                    //         }
                    //         else{
                    //             Swal.fire(
                    //                 'Failed!',
                    //                 response.message,
                    //                 'error'
                    //               );
                    //               return;
                    //         }
                    //     },
                    //     error: function(e) {
                    //         Swal.fire(
                    //                 'Failed!',
                    //                'Try Again Later',
                    //                 'error'
                    //               );
                    //               return;
                    //     }
                    //     });
                });
            }
 });
});
    </script>
    <script>
        $(document).ready(function(){

    function get_fee(id) {
        $.ajax({
            url: "{{ url('/withdraw/fee') }}/"+id,
            type: 'get',
            dataType: 'json',
            success: function(response){
                $('#fee_area').text(response['data']['amount']);
            }
        });
        }

        function get_rate(market) {
        $.ajax({
            url: "{{ url('/withdraw/exchange/rate') }}/"+market,
            type: 'get',
            dataType: 'json',
            success: function(response){

                $('#rate').val(response['open']);
                $('#vol').val(response['vol']);
                //alert(response['data']['amount']);
            }
        });
        }

$("#crypto_amount").keyup(function(){
   var crypto_amount = $(this).val();
   var local_amount = $('#local_amount').val();
   var rate = $('#rate').val();
   var vol = $('#vol').val();
   var get_one = rate / 1;
   var ex = get_one * crypto_amount;
   $('#local_amount').val(ex);
});

$('#wallet_id').change(function(){

    //alert('go');

     var id = $(this).val();
     var base = 'ngn';

     $('#labelOfAmount').text($("#wallet_id option:selected" ).text());

     get_rate($("#wallet_id option:selected" ).data('currency')+base);
        //get_fee(id);
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

                       var id = response['data'][i].id;
                       var address = response['data'][i].address;
                       var name = response['data'][i].display_name;

                       var option = "<option value='"+id+"'>"+address+"-"+name+"</option>";

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
