<x-app-layout>
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
                            <div class="card-body text-center">
                                <h5 class="card-title">Your Assets



                                       <h2>Requote your order</h2>
                                       <h2>The Market Price Have Been Changed</h2>
                                       {{-- <p>You are about to {{ $order->side .' '. Str::upper($order->market->base_unit) }} with {{ Str::upper($order->market->quote_unit) }}. You can review your order details below and then click 'Confirm' to proceed.</p>
                                    <p>{{ json_decode($order->price)->unit .' '. json_decode($order->price)->amount }} ≈ {{ json_decode($order->market)->base_unit }} 1.0</p>
                                    <h4>You spend: {{ json_decode($order->total)->unit.json_decode($order->total)->amount }}</h4>
                                    <h4>You receive: {{ json_decode($order->volume)->unit.json_decode($order->volume)->amount }}</h4> --}}

                                    <div class="text-center">
                                        <form action="{{ route('trade.confirm') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $order->id }}">
                                            <input type="hidden" name="type" value="requote_confirm">
                                            <button type="submit" class="btn btn-primary">Requote</button>
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                        </form>
                                    </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
</x-app-layout>
