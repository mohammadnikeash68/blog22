@extends('admin.layouts.master')
@section('title')
    ثبت دسته بندی جدید
@endsection
@section('content')
    <div class="wrap-category shadow bg-white rounded-4 p-3 mt-5">
    <form action="{{route('admin.category.store')}}" method="post">
        @csrf

        <div class="mb-3">
            <div class="row">
                <div class="col-12 col-md-6">
                    <input type="text" name="name_f" class="form-control">
                </div>
                <div class="col-12 col-md-6">
                    <select name="parent_id" class="form-control">
                        @foreach($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->name_f}}</option>

                        @endforeach

                    </select>
                </div>
                <div class="col-12 d-flex justify-content-center mt-2">
                    <button type="submit" class="btn btn-success ms-2">ثبت</button>
                    <a href="{{route('admin.category.index')}}" class="btn btn-danger">بازگشت</a>
                </div>
            </div>
        </div>

    </form>
    </div>
@endsection
