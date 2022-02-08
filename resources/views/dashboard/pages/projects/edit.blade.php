@extends('dashboard.layouts.master')
@section('title','edit')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/vendors/css/forms/select/select2.min.css")}}">

    @stop
@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">اضافة مشروع</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">الرئيسية</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">المشاريع</a>
                                    </li>
                                    <li class="breadcrumb-item active">اضافة مشروع
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <!-- Input Mask start -->
                <section id="input-mask-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">اضافة مشروع</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-sm-12 mb-2">
                                            <label for="credit-card">اسم المؤسسة</label>
                                            <input type="text" name="company_name" class="form-control credit-card-mask" placeholder="اسم المؤسسة" id="credit-card" />
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-sm-12 mb-2">
                                            <label for="date">اسم المشروع</label>
                                            <input name="project_name" type="text" class="form-control date-mask" placeholder="اسم المشروع"  />
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mb-2">
                                            <label for="time">تاريخ المنحة</label>
                                            <input type="date" name="grant_date" class="form-control time-mask" placeholder="hh:mm:ss" id="time" />
                                        </div>
                                        <!-- Basic -->
                                        <div class="col-xl-4 col-md-6 col-sm-12 mb-2">
                                            <label>نوع المنحة</label>
                                            <select name="category_id " class="select2 form-control form-control-lg">
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>

                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mb-2">
                                            <label for="numeral-formatting">قيمة المنحة</label>
                                            <input type="text" name="grant_value" class="form-control numeral-mask" placeholder="10,000" id="قيمة المنحة" />
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mb-2">
                                            <label>العملة</label>
                                            <select class="select2 form-control form-control-lg">
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>

                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mb-2">
                                            <label for="delimiters">سعر الصرف</label>
                                            <input type="text" name="exchange_amount" class="form-control delimiter-mask" placeholder="سعر الصرف" id="delimiters" />
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mb-2">
                                            <label for="prefix">الاداريات</label>
                                            <input type="text" name="managerial_fees" class="form-control prefix-mask" id="prefix" />
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mb-2">
                                            <label for="custom-delimiters">تاريخ بداء التنفيذ</label>
                                            <input type="date" name="start_date" class="form-control custom-delimiter-mask" placeholder="" id="custom-delimiters" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Input Mask End -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
@section('js')



    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset("app-assets/vendors/js/forms/select/select2.full.min.js")}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset("app-assets/js/scripts/forms/form-select2.js")}}"></script>
@stop
