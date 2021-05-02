@component('master')
    @slot('title') به داشبورد خوش آمدید @endslot
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ '#' }}">داشبورد</a></li>
{{--        <li class="breadcrumb-item active">زیرمنو۱</li>--}}
    @endslot
    @slot('custom_css')
        <style></style>
    @endslot


    @slot('custom_js')
        <script>
            $(document).ready(function () {
                //
            });
        </script>
    @endslot
@endcomponent
