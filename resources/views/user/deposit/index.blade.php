<x-app-layout>
 <!-- Modal -->
<div class="modal fade" id="accountLinkageWarningModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         Your account have not been linked with ok2pay. Please link it to get direct deposit from there
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="{{ route('linkage') }}" class="btn btn-primary">Let's Go!!</a>
        </div>
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


              <!-- Revenue Card -->
              <div class="col-12">
                <div class="card info-card revenue-card">
                  <div class="card-body">
                    <h5 class="card-title">Your Assets</h5>
                    <form class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                              <select class="form-select" id="floatingSelect" aria-label="State">
                                <option selected="">--Select--</option>
                                <option value="1">Oregon</option>
                                <option value="2">DC</option>
                              </select>
                              <label for="floatingSelect">Select OK2PAY Account</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-floating">
                            <input type="text" class="form-control" id="floatingName" placeholder="Amount">
                            <label for="floatingName">Amount</label>
                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" id="floatingNaration" placeholder="Naration">
                              <label for="floatingNaration">Naration</label>
                            </div>
                          </div>
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                      </form>

                  </div>

                </div>
              </div><!-- End Revenue Card -->
            </div>
          </div><!-- End Left side columns -->
        </div>
      </section>

      @section('scripts')
      <script>
        const accountLinkageWarningModal = new bootstrap.Modal('#accountLinkageWarningModal', {
            keyboard: false,
            backdrop: 'static',
        });
        accountLinkageWarningModal.show();
      </script>
      @endsection
</x-app-layout>
