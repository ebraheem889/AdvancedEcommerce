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
                                <li class="breadcrumb-item"><a href="{{route('admin.categories','subcategory')}}"> الاقسام
                                        الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active"> تعديل قسم {{$category->name}}
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
                                    <h4 class="card-title" id="basic-layout-form"> تعديل القسم </h4>
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
                                            <form class="form"
                                                  action="{{route('admin.categories.update' , [$category->id,'subcategory'])}}"
                                                  method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <input name="id" value="{{$category->id}}" type="hidden">
                                                <!-- to stop the validation on the photo -->

                                                <div class="form-group">
                                                    <label> صورة القسم </label>
                                                    <label id="projectinput7" class="file center-block">
                                                        <input type="file" id="file" name="photo">
                                                        <span class="file-custom"></span>
                                                        @error('photo')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </label>
                                                </div>

                                                <div class="form-body">
                                                    <h4 class="form-section"><i class="ft-home"></i> بيانات القسم </h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <select class="form-control" name="parent_id">
                                                                    <option class="form-control" value="">اختار قسم</option>
                                                                    @foreach($categories as $cat)
                                                                        <option class="form-control" value="{{$cat->id}}" {{ $cat->id == $category->parent_id ? 'selected':''  }}>{{$cat->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error("parent_id")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> الاسم </label>
                                                                <input
                                                                    type="text"
                                                                    value="{{$category->name}}"
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
                                                                    value="{{$category->slug}}"
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
                                                            <div class="form-group mt-1">
                                                                <input type="checkbox" value="" name="is_active"
                                                                       id="switcheryColor4"
                                                                       class="switchery" data-color="success"
                                                                       @if($category->is_active == 'مفعل')
                                                                       checked @endif/>
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


                                            <ul class="nav nav-tabs">
                                                @isset($category->categories)
                                                    @foreach($category->categories as $index=> $cats)
                                                        <li class="nav-item">
                                                            <a class="nav-link @if($index ==  0) active  @endif "
                                                               id="homeLable-tab" data-toggle="tab"
                                                               href="#homeLable{{$index}}" aria-controls="homeLable"
                                                               aria-expanded="{{$index ==  0 ? 'true' : 'false'}}">
                                                                {{$cats->name}}</a>
                                                        </li>
                                                    @endforeach
                                                @endisset
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Basic form layout section end -->
                        </div>
                    </div>
                </section>
            </div>
@endsection

