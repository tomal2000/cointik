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
             <div class="col-lg-12 mx-auto">
               <div class="row">


                 <!-- Revenue Card -->
                 <div class="col-12">
                   <div class="card info-card revenue-card">
                     <div class="card-body">
                       <h5 class="card-title">Your Assets</h5>
                      <iframe src="{{ route('linkage.ok2pay_view') }}" frameborder="0" style="width: 100%;min-height: 600px;">

                      </iframe>

                     </div>

                   </div>
                 </div><!-- End Revenue Card -->
               </div>
             </div><!-- End Left side columns -->
           </div>
         </section>

         @section('scripts')
         @endsection
   </x-app-layout>
