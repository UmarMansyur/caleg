@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-xl-7">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-start mb-2">
                <div class="flex-grow-1">
                    <h5 class="card-title">Popular Products</h5>
                </div>
                <div class="flex-shrink-0">
                    <div class="dropdown">
                        <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Today<i class="mdi mdi-chevron-down ms-1"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Yearly</a>
                            <a class="dropdown-item" href="#">Monthly</a>
                            <a class="dropdown-item" href="#">Weekly</a>
                            <a class="dropdown-item" href="#">Today</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-5">
                <div class="popular-product-img p-2">
                    <img src="./assets/images/product/img.png" alt="">
                </div>
                </div>
                <div class="col-md-7">
                    <span class="badge bg-primary-subtle text-primary  font-size-10 text-uppercase ls-05"> Popular Item</span>
                    <h5 class="mt-2 font-size-16"><a href="" class="text-body">Home &amp; Office Chair Blue</a></h5>
                    <p class="text-muted">But who has any right to find chooses enjoy.</p>

                    <div class="row g-0 mt-3 pt-1 align-items-end">
                        <div class="col-4">
                            <div class="mt-1">
                                <h4 class="font-size-16">800</h4>
                                <p class="text-muted mb-1">Total Selling</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mt-1">
                                <h4 class="font-size-16">250</h4>
                                <p class="text-muted mb-1">Total Stock</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mt-1">
                                <a href="" class="btn btn-primary btn-sm mb-1">Buy
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-n4 simplebar-scrollable-y" data-simplebar="init" style="max-height: 205px;"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
                <div class="popular-product-box rounded my-2">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avatar-md">
                                <div class="product-img avatar-title img-thumbnail bg-primary-subtle  border-0">
                                    <img src="assets/images/product/img-1.png" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3 overflow-hidden">
                            <h5 class="mb-1 text-truncate"><a href="" class="font-size-15 text-body">Wood Chair dark Brown</a></h5>
                            <p class="text-muted fw-semibold mb-0 text-truncate">$230.00</p>
                        </div>
                        <div class="flex-shrink-0 text-end ms-3">
                            <h5 class="mb-1"><a href="" class="font-size-15 text-body">$62300.00</a></h5>
                            <p class="text-muted fw-semibold mb-0">562 Sales</p>
                        </div>
                    </div>
                </div>

                <div class="popular-product-box rounded my-2">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avatar-md">
                                    <div class="product-img avatar-title img-thumbnail bg-success-subtle  border-0">
                                        <img src="assets/images/product/img-8.png" class="img-fluid" alt="">
                                    </div>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3 overflow-hidden">
                            <h5 class="mb-1 text-truncate"><a href="" class="font-size-15 text-body">Home &amp; Office Chair Crime</a></h5>
                            <p class="text-muted fw-semibold mb-0 text-truncate">$190.00</p>
                        </div>
                        <div class="flex-shrink-0 text-end ms-3">
                            <h5 class="mb-1"><a href="" class="font-size-15 text-body">$25698.00</a></h5>
                            <p class="text-muted fw-semibold mb-0">856 Sales</p>
                        </div>
                    </div>
                </div>

                <div class="popular-product-box rounded my-2">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avatar-md">
                                <div class="product-img avatar-title img-thumbnail bg-danger-subtle  border-0">
                                    <img src="assets/images/product/img-3.png" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3 overflow-hidden">
                            <h5 class="mb-1 text-truncate"><a href="" class="font-size-15 text-body">Office Chair Blue</a></h5>
                            <p class="text-muted fw-semibold mb-0 text-truncate">$420.00</p>
                        </div>
                        <div class="flex-shrink-0 text-end ms-3">
                            <h5 class="mb-1"><a href="" class="font-size-15 text-body">$64351.00</a></h5>
                            <p class="text-muted fw-semibold mb-0">524 Sales</p>
                        </div>
                    </div>
                </div>

                <div class="popular-product-box rounded my-2">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avatar-md">
                                <div class="product-img avatar-title img-thumbnail bg-success-subtle  border-0">
                                    <img src="assets/images/product/img-4.png" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3 overflow-hidden">
                            <h5 class="mb-1 text-truncate"><a href="" class="font-size-15 text-body">Home &amp; Office Chair Green</a></h5>
                            <p class="text-muted fw-semibold mb-0 text-truncate">$230.00</p>
                        </div>
                        <div class="flex-shrink-0 text-end ms-3">
                            <h5 class="mb-1"><a href="" class="font-size-15 text-body">$96485.00</a></h5>
                            <p class="text-muted fw-semibold mb-0">634 Sales</p>
                        </div>
                    </div>
                </div>

                <div class="popular-product-box rounded my-2">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avatar-md">
                                <div class="product-img avatar-title img-thumbnail bg-danger-subtle  border-0">
                                    <img src="assets/images/product/img-5.png" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3 overflow-hidden">
                            <h5 class="mb-1 text-truncate"><a href="" class="font-size-15 text-body">Wood Chair dark Brown</a></h5>
                            <p class="text-muted fw-semibold mb-0 text-truncate">$230.00</p>
                        </div>
                        <div class="flex-shrink-0 text-end ms-3">
                            <h5 class="mb-1"><a href="" class="font-size-15 text-body">$56230.00</a></h5>
                            <p class="text-muted fw-semibold mb-0">964 Sales</p>
                        </div>
                    </div>
                </div>

            </div></div></div></div><div class="simplebar-placeholder" style="width: 462px; height: 456px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 92px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div>
        </div>
    </div>
</div>
</div>
@endsection