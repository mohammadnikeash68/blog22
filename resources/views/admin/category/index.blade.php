@extends('admin.layouts.master')
@section('head-tag')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">

@endsection
@section('content')
    <div class="bg_loading"></div>
    <div class="spinner-border text-primary  wrap-spinner"  role="status">
        <span class="visually-hidden">Loading...</span>
    </div>

<div class="wrap-category shadow bg-white rounded-4 p-3 mt-5">
    <div class="d-flex justify-content-between border-bottom mb-3 p-2">
        <h5 class="">لیست دسته بندی ها</h5>
        <a href="{{route('admin.category.create')}}" class="btn btn-success">ثبت دسته بندی</a>
    </div>
    <table id="file-datatablee" class="text-center transition-all">
        <thead class="border-top">
        <tr>
            <th class="">#</th>
            <th class="">نام دسته بندی</th>
            <th class="">نام والد</th>
            <th class=" text-center">عملیات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $key => $cat)
            @php

                $parent_name = $categories->where('id',$cat->parent_id);


            @endphp
          <tr>
                <td>{{$key + 1}}</td>
                <td>{{$cat->name_f != null ? $cat->name_f : '-'}}</td>
                <td>{{!$parent_name->isEmpty() ? $parent_name->first()->name_f : '-'}}</td>


                <td class="width-16-rem text-left">
                    <a href="#"
                       class="btn btn-primary btn-sm edit"> ویرایش <i class="fa fa-edit"></i> </a>
                    <div class="result"></div>
                    <div class="log"></div>

                    <form class="d-inline" id="myform"
                          action="#"
                          method="post">
                        @method('DELETE')
                        @csrf
                        <button data-id="{{$cat->id}}" id="1" type="button"
                                class="delete btn  btn-danger  btn-sm delete_user"> حذف <i
                                class="fa fa-remove"></i></button>
                    </form>

                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="{{ asset('js/iziToast.js') }}"></script>
    @if(session()->get('success'))
        <script>
            iziToast.success({
                title: '',
                message: 'ثبت با موفقیت انجام شد',
                position: 'topRight',

            });
        </script>
    @endif
    @if(session()->get('error'))
        <script>
            iziToast.error({
                title: '',
                message: 'ثبت با خطا مواجه شد',
                position: 'topRight',

            });
        </script>
    @endif
    <script>
        console.log(window.location.host)
        function sleep(ms) {
            clearInterval(sleepSetTimeout_ctrl);
            return new Promise(resolve => sleepSetTimeout_ctrl = setTimeout(resolve, ms));
        }
        $(".wrap-spinner").show()
        var table = $('#file-datatablee').DataTable({
            buttons: ['excel', 'colvis'],
            order: [[0, 'desc']],
            responsive: true,

            language: {
                "emptyTable": "هیچ داده‌ای در جدول وجود ندارد",
                "info": "نمایش _START_ تا _END_ از _TOTAL_ ردیف",
                "infoEmpty": "نمایش 0 تا 0 از 0 ردیف",
                "infoFiltered": "(فیلتر شده از _MAX_ ردیف)",
                "infoThousands": ",",
                "lengthMenu": "نمایش _MENU_ ردیف",
                "processing": "در حال پردازش...",
                "search": "جستجو:",
                "zeroRecords": "رکوردی با این مشخصات پیدا نشد",
                "paginate": {
                    "next": "بعدی",
                    "previous": "قبلی",
                    "first": "ابتدا",
                    "last": "انتها"
                },
                "aria": {
                    "sortAscending": ": فعال سازی نمایش به صورت صعودی",
                    "sortDescending": ": فعال سازی نمایش به صورت نزولی"
                },
                "autoFill": {
                    "cancel": "انصراف",
                    "fill": "پر کردن همه سلول ها با ساختار سیستم",
                    "fillHorizontal": "پر کردن سلول به صورت افقی",
                    "fillVertical": "پرکردن سلول به صورت عمودی"
                },
                "buttons": {
                    "collection": "مجموعه",
                    "colvis": "قابلیت نمایش ستون",
                    "colvisRestore": "بازنشانی قابلیت نمایش",
                    "copy": "کپی",
                    "copySuccess": {
                        "1": "یک ردیف داخل حافظه کپی شد",
                        "_": "%ds ردیف داخل حافظه کپی شد"
                    },
                    "copyTitle": "کپی در حافظه",
                    "pageLength": {
                        "-1": "نمایش همه ردیف‌ها",
                        "_": "نمایش %d ردیف",
                        "1": "نمایش 1 ردیف"
                    },
                    "print": "چاپ",
                    "copyKeys": "برای کپی داده جدول در حافظه سیستم کلید های ctrl یا ⌘ + C را فشار دهید",
                    "csv": "فایل CSV",
                    "pdf": "فایل PDF",
                    "renameState": "تغییر نام",
                    "updateState": "به روز رسانی",
                    "excel": "فایل اکسل",
                    "createState": "ایجاد وضعیت جدول",
                    "removeAllStates": "حذف همه وضعیت ها",
                    "removeState": "حذف",
                    "savedStates": "وضعیت های ذخیره شده",
                    "stateRestore": "بازگشت به وضعیت %d"
                },
                "searchBuilder": {
                    "add": "افزودن شرط",
                    "button": {
                        "0": "جستجو ساز",
                        "_": "جستجوساز (%d)"
                    },
                    "clearAll": "خالی کردن همه",
                    "condition": "شرط",
                    "conditions": {
                        "date": {
                            "after": "بعد از",
                            "before": "بعد از",
                            "between": "میان",
                            "empty": "خالی",
                            "not": "نباشد",
                            "notBetween": "میان نباشد",
                            "notEmpty": "خالی نباشد",
                            "equals": "برابر باشد با"
                        },
                        "number": {
                            "between": "میان",
                            "empty": "خالی",
                            "gt": "بزرگتر از",
                            "gte": "برابر یا بزرگتر از",
                            "lt": "کمتر از",
                            "lte": "برابر یا کمتر از",
                            "not": "نباشد",
                            "notBetween": "میان نباشد",
                            "notEmpty": "خالی نباشد",
                            "equals": "برابر باشد با"
                        },
                        "string": {
                            "contains": "حاوی",
                            "empty": "خالی",
                            "endsWith": "به پایان می رسد با",
                            "not": "نباشد",
                            "notEmpty": "خالی نباشد",
                            "startsWith": "شروع  شود با",
                            "notContains": "نباشد حاوی",
                            "notEndsWith": "پایان نیابد با",
                            "notStartsWith": "شروع نشود با",
                            "equals": "برابر باشد با"
                        },
                        "array": {
                            "empty": "خالی",
                            "contains": "حاوی",
                            "not": "نباشد",
                            "notEmpty": "خالی نباشد",
                            "without": "بدون",
                            "equals": "برابر باشد با"
                        }
                    },
                    "data": "اطلاعات",
                    "logicAnd": "و",
                    "logicOr": "یا",
                    "title": {
                        "0": "جستجو ساز",
                        "_": "جستجوساز (%d)"
                    },
                    "value": "مقدار",
                    "deleteTitle": "حذف شرط فیلتر",
                    "leftTitle": "شرط بیرونی",
                    "rightTitle": "شرط فرورفتگی"
                },
                "select": {
                    "cells": {
                        "1": "1 سلول انتخاب شد",
                        "_": "%d سلول انتخاب شد"
                    },
                    "columns": {
                        "1": "یک ستون انتخاب شد",
                        "_": "%d ستون انتخاب شد"
                    },
                    "rows": {
                        "1": "1ردیف انتخاب شد",
                        "_": "%d  انتخاب شد"
                    }
                },
                "thousands": ",",
                "searchPanes": {
                    "clearMessage": "همه را پاک کن",
                    "collapse": {
                        "0": "صفحه جستجو",
                        "_": "صفحه جستجو (٪ d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "صفحه جستجو وجود ندارد",
                    "loadMessage": "در حال بارگیری صفحات جستجو ...",
                    "title": "فیلترهای فعال - %d",
                    "showMessage": "نمایش همه",
                    "collapseMessage": "بستن همه"
                },
                "loadingRecords": "در حال بارگذاری...",
                "datetime": {
                    "previous": "قبلی",
                    "next": "بعدی",
                    "hours": "ساعت",
                    "minutes": "دقیقه",
                    "seconds": "ثانیه",
                    "amPm": [
                        "صبح",
                        "عصر"
                    ],
                    "months": {
                        "0": "ژانویه",
                        "1": "فوریه",
                        "10": "نوامبر",
                        "4": "می",
                        "8": "سپتامبر",
                        "11": "دسامبر",
                        "3": "آوریل",
                        "9": "اکتبر",
                        "7": "اوت",
                        "2": "مارس",
                        "5": "ژوئن",
                        "6": "ژوئیه"
                    },
                    "unknown": "-",
                    "weekdays": [
                        "یکشنبه",
                        "دوشنبه",
                        "سه‌شنبه",
                        "چهارشنبه",
                        "پنجشنبه",
                        "جمعه",
                        "شنبه"
                    ]
                },
                "editor": {
                    "close": "بستن",
                    "create": {
                        "button": "جدید",
                        "title": "ثبت جدید",
                        "submit": "ایجــاد"
                    },
                    "edit": {
                        "button": "ویرایش",
                        "title": "ویرایش",
                        "submit": "به روز رسانی"
                    },
                    "remove": {
                        "button": "حذف",
                        "title": "حذف",
                        "submit": "حذف",
                        "confirm": {
                            "_": "آیا از حذف %d خط اطمینان دارید؟",
                            "1": "آیا از حذف یک خط اطمینان دارید؟"
                        }
                    },
                    "multi": {
                        "restore": "واگرد",
                        "noMulti": "این ورودی را می توان به صورت جداگانه ویرایش کرد، اما نه بخشی از یک گروه",
                        "title": "مقادیر متعدد",
                        "info": "مقادیر متعدد"
                    },
                    "error": {
                        "system": "خطایی رخ داده (اطلاعات بیشتر)"
                    }
                },
                "decimal": ".",
                "stateRestore": {
                    "creationModal": {
                        "button": "ایجاد",
                        "columns": {
                            "search": "جستجوی ستون",
                            "visible": "وضعیت نمایش ستون"
                        },
                        "name": "نام:",
                        "order": "مرتب سازی",
                        "paging": "صفحه بندی",
                        "search": "جستجو",
                        "select": "انتخاب",
                        "title": "ایجاد وضعیت جدید",
                        "toggleLabel": "شامل:",
                        "scroller": "موقعیت جدول (اسکرول)",
                        "searchBuilder": "صفحه جستجو"
                    },
                    "emptyError": "نام نمیتواند خالی باشد.",
                    "removeConfirm": "آیا از حذف %s مطمئنید؟",
                    "removeJoiner": "و",
                    "renameButton": "تغییر نام",
                    "renameLabel": "نام جدید برای $s :",
                    "duplicateError": "وضعیتی با این نام از پیش ذخیره شده.",
                    "emptyStates": "هیچ وضعیتی ذخیره نشده",
                    "removeError": "حذف با خطا موماجه شد",
                    "removeSubmit": "حذف وضعیت",
                    "removeTitle": "حذف وضعیت جدول",
                    "renameTitle": "تغییر نام وضعیت"
                }
            }
        });

        $(document).ready(function () {


            $(".delete").click(function (){
                var id = $(this).data('id');
                var url = '{{route('admin.category.destroy',':id')}}'
                $.confirm({
                    title: 'حذف',
                    content: 'آیا از حذف دسته بندی مطمئنید؟',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        tryAgain: {

                            text: 'بله',
                            btnClass: 'btn-red',
                            action: function(){
                                $.ajax({
                                    url:url.replace(":id",id),
                                    type:'get',
                                    contentType: "application/json",
                                    data: {name:"mohammad"},
                                    beforeSend: function( xhr ) {
                                        $(".bg_loading").show();
                                        $(".wrap-spinner").show();
                                    }
                                }).done(function (data){
                                    console.log(data)
                                    iziToast.success({
                                        title: 'حذف',
                                        message: 'حذف با موفقیت انجام شد',
                                        position: 'topLeft',

                                    });

                                }).fail(function (jqXHR, textStatus){
                                    console.log(textStatus)
                                    iziToast.error({
                                        title: 'حذف',
                                        message: 'حذف با خطا مواجه شد',
                                        position: 'topLeft',

                                    });

                                }).always(function (){
                                    setTimeout(function (){
                                        $(".bg_loading").hide();
                                        $(".wrap-spinner").hide();
                                    },1000)
                                })

                            }
                        },
                        close: {
                            text: 'خیر',
                            btnClass: 'btn-default'
                        }
                    },

                });


            });
        });
    </script>
@endsection
@section('styles')
<style>
    .wrap-spinner{
        display: none;
        position: absolute;
        top: 50%;
        right: 50%;
        z-index: 5;
        transition: all ease 6ms;
    }
    .bg_loading{
        display: none;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.7);
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 4;
        transition: all ease 6ms;

    }
</style>
@endsection
