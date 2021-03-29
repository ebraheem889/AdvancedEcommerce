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
                                        المنتجات </a>
                                </li>
                                <li class="breadcrumb-item active"> اضافة قسم
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
                                    <h4 class="card-title" id="basic-layout-form"> اضافة قسم </h4>
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
                                            <form class="form" action="{{route('admin.products.store')}}"
                                                  method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf
                                            <!-- to stop the validation on the photo -->

                                                <div class="form-body">
                                                    <h4 class="form-section"><i class="ft-home"></i> البيانات الأساسية للقسم </h4>
                                                    <div class="row">

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> اسم المنتح </label>
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
                                                                <label for="projectinput1"> الاسم بالرابط </label>
                                                                <input
                                                                    type="text"
                                                                    value="{{old('slug')}}"
                                                                    id="name"
                                                                    class="form-control"
                                                                    name="slug"
                                                                >
                                                                @error("slug")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> وصف المنتح </label>
                                                                <input
                                                                    type="text"
                                                                    value="{{old('description')}}"
                                                                    id="name"
                                                                    class="form-control"
                                                                    name="description"
                                                                >
                                                                @error("description")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> الوصف المختصر </label>
                                                                <input
                                                                    type="text"
                                                                    value="{{old('short_description')}}"
                                                                    id="name"
                                                                    class="form-control"
                                                                    name="short_description"
                                                                >
                                                                @error("short_description")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <select name="categories[]" class="form-control select2 " multiple >
                                                                    <optgroup label="من فضلك اختار قسم">
                                                                        @foreach($data['categories'] as $item )
                                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                                        @endforeach
                                                                    </optgroup>
                                                                </select>
                                                                @error("categories")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <select name="tags[]" class="form-control">
                                                                    <option value="">اختار العلامات الدلالية</option>
                                                                    @foreach($data['tags'] as $item )
                                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @error("tags")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <select name="brand_id" class="form-control">
                                                                    <option value="">اختار الماركة</option>
                                                                    @foreach($data['brands'] as $item )
                                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @error("brand_id")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group mt-1">
                                                                <input type="checkbox" value="" name="is_active"
                                                                       id="switcheryColor4"
                                                                       class="switchery" data-color="success"
                                                                       checked/>
                                                                <label for="switcheryColor4"
                                                                       class="card-title ml-1">الحالة </label>
                                                                @error("is_active")
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

