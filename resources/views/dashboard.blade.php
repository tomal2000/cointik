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
          <div class="col-lg-8">
            <div class="row">

              <!-- Sales Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                <a href="{{ route('deposit') }}">
                  <div class="card-body">
                    <div class="mx-auto my-auto py-3">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center mx-auto">
                            <i class="bi bi-box-arrow-down"></i>
                      </div>
                      <div class="mx-auto text-center">
                        <h6>Deposit</h6>
                      </div>
                    </div>

                  </div>
</a>
                </div>
              </div><!-- End Sales Card -->

              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
<a href="{{ route('send') }}">
                  <div class="card-body">
                    <div class="mx-auto my-auto py-3">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center mx-auto">
                            <i class="bi bi-send-fill"></i>
                      </div>
                      <div class="mx-auto text-center">
                        <h6>Send</h6>
                      </div>
                    </div>

                  </div>
</a>
                </div>
              </div><!-- End Sales Card -->

              <!-- Sales Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <a href="{{ route('wallet') }}">
                        <div class="card-body">
                            <div class="mx-auto my-auto py-3">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center mx-auto">
                                    <i class="bi bi-wallet2"></i>
                            </div>
                            <div class="mx-auto text-center">
                                <h6>Wallets</h6>
                            </div>
                            </div>

                        </div>
                    </a>
                </div>
              </div><!-- End Sales Card -->

              <!-- Sales Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <a href="{{ route('trade') }}">
                  <div class="card-body">
                    <div class="mx-auto my-auto py-3">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center mx-auto">
                            <i class="bi bi-cart-plus-fill"></i>
                      </div>
                      <div class="mx-auto text-center">
                        <h6>Buy</h6>
                      </div>
                    </div>

                  </div>
                 </a>

                </div>
              </div><!-- End Sales Card -->
              <!-- Sales Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <a href="{{ route('trade') }}">
                  <div class="card-body">
                    <div class="mx-auto my-auto py-3">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center mx-auto">
                            <i class="bi bi-nintendo-switch"></i>
                      </div>
                      <div class="mx-auto text-center">
                        <h6>Sell</h6>
                      </div>
                    </div>

                  </div>
             </a>

                </div>
              </div><!-- End Sales Card -->

                 <!-- Sales Card -->
                 <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <a href="{{ route('linkage') }}">
                            <div class="card-body">
                                <div class="mx-auto my-auto py-3">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center mx-auto">
                                        <i class="bi bi-link-45deg"></i>
                                </div>
                                <div class="mx-auto text-center">
                                    <h6>Linked</h6>
                                </div>
                                </div>

                            </div>
                        </a>
                    </div>
                  </div><!-- End Sales Card -->

              <!-- Revenue Card -->
              <div class="col-12">
                <div class="card info-card revenue-card">
                  <div class="card-body">
                    <h5 class="card-title">Your Assets</h5>
                    <div class="d-flex align-items-center justify-content-between my-2">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="ps-3">
                              <h6>Bitcoin (BTC)</h6>
                              {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}
                            </div>
                          </div>
                          <div class="d-flex align-items-center">
                            {{-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-currency-dollar"></i>
                            </div> --}}
                            <div class="ps-3">
                              <h6>0</h6>
                              {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}
                            </div>
                          </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between my-2">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="ps-3">
                              <h6>Bitcoin (BTC)</h6>
                              {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}
                            </div>
                          </div>
                          <div class="d-flex align-items-center">
                            {{-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-currency-dollar"></i>
                            </div> --}}
                            <div class="ps-3">
                              <h6>0</h6>
                              {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}
                            </div>
                          </div>
                    </div>

                  </div>

                </div>
              </div><!-- End Revenue Card -->

              <!-- Reports -->
              <div class="col-12">
                <div class="card">

                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>

                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>

                  <div class="card-body">
                    <h5 class="card-title">Reports <span>/Today</span></h5>

                    <!-- Line Chart -->
                    <div id="reportsChart"></div>

                    <script>
                      document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#reportsChart"), {
                          series: [{
                            name: 'Sales',
                            data: [31, 40, 28, 51, 42, 82, 56],
                          }, {
                            name: 'Revenue',
                            data: [11, 32, 45, 32, 34, 52, 41]
                          }, {
                            name: 'Customers',
                            data: [15, 11, 32, 18, 9, 24, 11]
                          }],
                          chart: {
                            height: 350,
                            type: 'area',
                            toolbar: {
                              show: false
                            },
                          },
                          markers: {
                            size: 4
                          },
                          colors: ['#4154f1', '#2eca6a', '#ff771d'],
                          fill: {
                            type: "gradient",
                            gradient: {
                              shadeIntensity: 1,
                              opacityFrom: 0.3,
                              opacityTo: 0.4,
                              stops: [0, 90, 100]
                            }
                          },
                          dataLabels: {
                            enabled: false
                          },
                          stroke: {
                            curve: 'smooth',
                            width: 2
                          },
                          xaxis: {
                            type: 'datetime',
                            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                          },
                          tooltip: {
                            x: {
                              format: 'dd/MM/yy HH:mm'
                            },
                          }
                        }).render();
                      });
                    </script>
                    <!-- End Line Chart -->

                  </div>

                </div>
              </div><!-- End Reports -->
            </div>
          </div><!-- End Left side columns -->

          <!-- Right side columns -->
          <div class="col-lg-4">

            <!-- Recent Activity -->
            <div class="card h-200">
              {{-- <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div> --}}

              <div class="card-body">
                <h5 class="card-title text-center">Your Balance <span>| NGN</span></h5>

                <div class="activity text-center">
                    <div>{{ Auth::user()->balanceFloat }}₦</div>
                </div>

              </div>
            </div><!-- End Recent Activity -->

            <!-- Budget Report -->
            <div class="card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body pb-0">
                <h5 class="card-title">Budget Report <span>| This Month</span></h5>

                <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                      legend: {
                        data: ['Allocated Budget', 'Actual Spending']
                      },
                      radar: {
                        // shape: 'circle',
                        indicator: [{
                            name: 'Sales',
                            max: 6500
                          },
                          {
                            name: 'Administration',
                            max: 16000
                          },
                          {
                            name: 'Information Technology',
                            max: 30000
                          },
                          {
                            name: 'Customer Support',
                            max: 38000
                          },
                          {
                            name: 'Development',
                            max: 52000
                          },
                          {
                            name: 'Marketing',
                            max: 25000
                          }
                        ]
                      },
                      series: [{
                        name: 'Budget vs spending',
                        type: 'radar',
                        data: [{
                            value: [4200, 3000, 20000, 35000, 50000, 18000],
                            name: 'Allocated Budget'
                          },
                          {
                            value: [5000, 14000, 28000, 26000, 42000, 21000],
                            name: 'Actual Spending'
                          }
                        ]
                      }]
                    });
                  });
                </script>

              </div>
            </div><!-- End Budget Report -->

            <!-- Website Traffic -->
            <div class="card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body pb-0">
                <h5 class="card-title">Website Traffic <span>| Today</span></h5>

                <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    echarts.init(document.querySelector("#trafficChart")).setOption({
                      tooltip: {
                        trigger: 'item'
                      },
                      legend: {
                        top: '5%',
                        left: 'center'
                      },
                      series: [{
                        name: 'Access From',
                        type: 'pie',
                        radius: ['40%', '70%'],
                        avoidLabelOverlap: false,
                        label: {
                          show: false,
                          position: 'center'
                        },
                        emphasis: {
                          label: {
                            show: true,
                            fontSize: '18',
                            fontWeight: 'bold'
                          }
                        },
                        labelLine: {
                          show: false
                        },
                        data: [{
                            value: 1048,
                            name: 'Search Engine'
                          },
                          {
                            value: 735,
                            name: 'Direct'
                          },
                          {
                            value: 580,
                            name: 'Email'
                          },
                          {
                            value: 484,
                            name: 'Union Ads'
                          },
                          {
                            value: 300,
                            name: 'Video Ads'
                          }
                        ]
                      }]
                    });
                  });
                </script>

              </div>
            </div><!-- End Website Traffic -->

            


          </div><!-- End Right side columns -->

        </div>
      </section>
</x-app-layout>
