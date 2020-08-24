<aside class="sidebar-left-collapse">
    <link rel="stylesheet" type="text/css" href="/vendor/font-awesome-4.7/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/mdi-font/css/material-design-iconic-font.css">


    <div class="text-center mb-5">
    <img src="/images/icons/logo.jpg"  width="180" height="180">
    </div>
    <div class="sidebar-links">

        @if (Auth::guard('web')->user()->id == 1)


        <div class="link-blue selected">

            <a >
                <i class="fa fa-diamond"></i>المخازن
            </a>

            <ul class="sub-links">
                <li><a href="/sortitem">المخزون</a></li>

            </ul>

        </div>
        @endif
            <div class="link-green">

            <a href="#" >
                <i class="fa fa-money"></i>المبيعات
            </a>

                @if (Auth::guard('web')->user()->id == 1 || Auth::guard('web')->user()->id != 1)
            <ul class="sub-links">
                @if(Auth::guard('web')->user()->id == 1)
                <li><a href="/customers/index">العملاء</a></li>
                <li><a href="/sales/create">فواتير المبيعات</a></li>
                <li><a href="/accountReceivables/index">حسابات العملاء</a></li>
                <li><a href="/services/create">الخدمات</a></li>
                @else
                    <li><a href="/sales/create">فواتير المبيعات</a></li>
                    <li><a href="/services/create">الخدمات</a></li>
                @endif
            </ul>
                @endif
        </div>

            @if (Auth::guard('web')->user()->id == 1)

            <div class="link-purple">

            <a href="#" >
                <i class="fa fa-shopping-cart"></i>المشتريات
            </a>

            <ul class="sub-links">
                <li><a href="/suppliers/index">موردين</a></li>
                <li><a href="/purchases/create">فواتير المشتريات</a></li>
                <li><a href="/accountPayables/index">حسابات موردين</a></li>
            </ul>

        </div>

        <div class="link-red">

            <a >
                <i class="fa fa-book"></i>المصاريف
            </a>

            <ul class="sub-links">
                <li><a href="/expensesCategories/index">انواع المصاريف</a></li>
                <li><a href="/expenses/create">المصاريف</a></li>
            </ul>

        </div>



        <div class="link-yellow">

            <a >
                <i class="fa fa-book"></i>النقــــــدي
            </a>

            <ul class="sub-links">
                <li><a href="/cash/index">تقارير الخذانه</a></li>
                <li><a href="/cash/create">اضافه تمويل</a></li>
                <li><a href="/quickReports/dayclosse">انهاء اليوم</a></li>
            </ul>

        </div>

        <div class="link-orange">

            <a >
                <i class="fa fa-newspaper-o"></i>التقارير
            </a>

            <ul class="sub-links">

                <li><a href="/quickReports/choose">تقارير سريعه</a></li>

            </ul>

        </div>

            @endif
    </div>

</aside>
<script src="/js/jquery.min.js"></script>
<script>

    $(function () {

        var links = $('.sidebar-links > div');

        links.on('click', function () {

            links.removeClass('selected');
            $(this).addClass('selected');

        });
    });

</script>



