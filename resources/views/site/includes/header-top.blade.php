<div class="header-top">
    <div class="container">
        <div class="ht-left">
            <a href="#" class="row user-service pr-5 pl-2">
                <h5>خدمة العملاء </h5>
                <i class="fa fa-user mr-2" style="font-size: 20px;"></i>
            </a>
            <a href="#" class="row user-service pr-5 pl-2">
                <h5>بدأ البيع</h5>
                <i class="fa fa-cart-arrow-down mr-2" style="font-size: 20px;"></i>
            </a>
            <a  href="#" class="row user-service pr-5 pl-2">
                <h5>تتبع مشتريتك</h5>
                <i class="fa fa-shopping-cart mr-2" style="font-size: 20px;"></i>
            </a>
        </div>
        <div class="ht-right">
            @if(auth('web')->guest())
                <a href="{{ route('login') }}" class="login-panel">تسجيل الدخول<i class="fa fa-user mr-2"></i></a>
            @endif
            @if(auth()->user())
                <a href="#" class="login-panel">{{ auth()->user()->fullName }}</a>
                <form action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="submit" value="تسجيل خروج" class="btn btn-danger mt-2">
                </form>
            @endif
            {{--  <div class="lan-selector text-white"> العربية
            </div>  --}}
        </div>
    </div>
</div>
