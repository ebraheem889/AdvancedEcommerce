@extends('layouts.admin')

@section('content')
    ﻿
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.Dashboard')}}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.products')}}">
                                        المحزن </a>
                                </li>
                                <li class="breadcrumb-item active">ادارة المخزن
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> ادارة المستودع </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('dashboard.includes.alerts.success')
                                @include('dashboard.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="form-group">
                                        <div class="card-body">
                                            <form class="form" action="{{route('admin.products.stock.store')}}"
                                                  method="POST"
                                                  enctype="multipart/form-data">
                                            @csrf
                                                <input type="hidden" name="product_id" value="{{$id}}">

                                                <div class="form-body">
                                                    <h4 class="form-section"><i class="ft-home"></i>
                                                        ادارة المستودع</h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> كود المنتج </label>
                                                                <input
                                                                    type="number"
                                                                    value="{{old('sku')}}"
                                                                    id="sku"
                                                                    class="form-control"
                                                                    name="sku"
                                                                >
                                                                @error("sku")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> تتبع النتج </label>
                                                                <select name="manage_stock" class="form-control" id="product_status">
                                                                    <optgroup label="اختار حالة  تتبع المنتج">
                                                                        <option value="1">تتبع</option>
                                                                        <option value="0" selected> عدم تتبع</option>
                                                                    </optgroup>
                                                                </select>
                                                                @error("manage_stock")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6" >
                                                            <div class="form-group">
                                                                <label for="projectinput1"> حالة المنتج </label>

                                                                <select name="in_stock"  class="form-control" id="product_status">
                                                                    <optgroup label="اختار حالة المنتج">
                                                                        <option value="1">متاح</option>
                                                                        <option value="0" > غير متاح</option>
                                                                    </optgroup>
                                                                </select>

                                                                @error("in_stock")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 " style="display: none" id="qty">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> الكمية</label>
                                                                <input type="number" class="form-control" value="" name="qty">
                                                                @error("qty")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>


                                                <div class="form-actions">
                                                    <button type="button" class="btn btn-warning mr-1"
                                                            onclick="history.back();">
                                                        <i class="ft-x"></i> تراجع
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> تحديث
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Basic form layout section end -->
                        </div>
                    </div>
                </section>
@endsection


@section('script')

   <script>
       // $(document).on('change','#product_status' ,function(){
       //     if ($(this).value === 1 ){
       //
       //       $('#qty').show();
       //
       //     }
       //     else{
       //         $('#qty').hide();
       //     }
       // })

       let product_status = document.getElementById("product_status");
       let qty = document.getElementById("qty");
        product_status.addEventListener('change',function () {
            if (this.value == 1 ){

                qty.style.display = 'unset';
            }
            else{
                qty.style.display = 'none';
            }
        })
    </script>

@endsection
