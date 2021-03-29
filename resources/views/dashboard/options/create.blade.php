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
                                <li class="breadcrumb-item"><a href="{{route('admin.brands')}}"> الخيارات
                                    </a>
                                </li>
                                <li class="breadcrumb-item active"> اضافة خيار
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
                                            <form class="form" action="{{route('admin.options.store')}}"
                                                  method="POST"
                                                  enctype="multipart/form-data">
                                            @csrf
                                            <!-- to stop the validation on the photo -->

                                                <div class="form-body">
                                                    <h4 class="form-section"><i class="ft-home"></i> بيانات المنتج
                                                    </h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> الاسم </label>
                                                                <input
                                                                    type="text"
                                                                    value="{{old('name')}}"
                                                                    id="name"
                                                                    class="form-control"
                                                                    name="name"
                                                                >
                                                                @error("name")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">السعر</label>
                                                                    <input
                                                                         type="text"
                                                                         name="price"
                                                                         class="form-control"
                                                                         value="{{old('price')}}"
                                                                    >
                                                                    @error("price")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        @if ($products->count() > 0 )
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> اختار المنتح</label>
                                                                <select class="form-control" name="product_id">
                                                                    @foreach($products as $product)
                                                                        <option class="form-control" value="{{$product->id}}">{{$product->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error("product_id")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                                </select>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @if ($attributes->count() > 0)
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> اختار الخاصية</label>
                                                                <select class="form-control" name="attribute_id">
                                                                    @foreach($attributes as $attribute)
                                                                        <option class="form-control" value="{{$attribute->id}}">{{$attribute->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error("attribute_id")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                                </select>
                                                            </div>
                                                        </div>
                                                        @endif
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

