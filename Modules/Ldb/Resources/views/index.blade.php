@component('admin.master')
    @slot('title')منو۱@endslot
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ '#' }}">منو۱</a></li>
        <li class="breadcrumb-item active">زیرمنو۱</li>
    @endslot
    @slot('custom_css')
        <style></style>
    @endslot

    <h2>عنوان صفحه</h2>

    @slot('custom_js')
        <script>
            $(document).ready(function () {
                //
            });
        </script>
    @endslot
@endcomponent
