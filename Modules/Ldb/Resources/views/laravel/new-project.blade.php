@component('admin.master')
    @slot('title') پروژه جدید @endslot
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ '#' }}">داشبورد</a></li>
        <li class="breadcrumb-item active">زیرمنو۱</li>
    @endslot
    @slot('custom_css')
        <style>
        </style>
    @endslot

    <row id="toolbar-top">
        <div class="btn-group mb-3">
            <button type="button" class="btn btn-default collapse-all">Collapse All <i class="fa fa-align-left" style="vertical-align: middle"></i></button>
            <button type="button" class="btn btn-default expand-all">Expand All <i class="fa fa-align-left" style="vertical-align: middle"></i></button>
        </div>
    </row>

    <div class="card card-primary">
        <div class="card-header"  data-widget="collapse" style="cursor: pointer">
            <h3 class="card-title text-center">test</h3>
            <div class="card-tools" style="right: 5px !important;">
                <button type="button" class="btn btn-tool">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus mr-2"></i>
                </button>
            </div>
        </div>
        <div class="card-body text-left collapsable-body" dir="ltr">
            <textarea name="ck-edit1" class="ck-edit" id="ck-edit1" rows="10" cols="80">This is my textarea to be replaced with CKEditor 4.</textarea>
        </div>
    </div>

    <div class="card card-primary collapsable-card collapsed-card">
        <div class="card-header"  data-widget="collapse" style="cursor: pointer">
            <h3 class="card-title text-center">دانلود لاراول</h3>
            <div class="card-tools" style="right: 5px !important;">
                <button type="button" class="btn btn-tool">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus mr-2"></i>
                </button>
            </div>
        </div>
        <div class="card-body collapsable-body">
            <div class="card card-light ">
                <div class="card-header d-flex p-0">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active show" href="#tab_1" data-toggle="tab">دانلود از طریق Laragon</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">دانلود از طریق Composer</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab_1">
                            <div class="row mb-2" id="lightgallery" dir="ltr">
                                <div class="col-sm-3 ">
                                    <div class="row text-center"><div class="col-sm-12"><h5 class="caption1">Step 1</h5></div></div>
                                    <div class="row text-center">
                                        <div class="col-sm-12">
                                            <a href="{{ asset('img/ldb/laragon2.png') }}" data-sub-html=".caption1">
                                                <img class="mt-2 mb-2 img-thumbnail" width="150px" src="{{ asset('img/ldb/laragon2.png') }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 ">
                                    <div class="row text-center"><div class="col-sm-12"><h5 class="caption2">Step 2</h5></div></div>
                                    <div class="row text-center">
                                        <div class="col-sm-12">
                                            <a href="{{ asset('img/ldb/laragon.png') }}" data-sub-html=".caption2">
                                                <img class="mt-2 mb-2 img-thumbnail" width="150px" src="{{ asset('img/ldb/laragon.png') }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="callout callout-info">
                                <h5 class="text-primary"><i class="icon fa fa-info ml-2"></i>راهنمایی</h5>
                                <span>
                                            لاراگون در واقع این کارها رو انجام میده موقع نصب:
                                        </span>
                                <ol>
                                    <li>ایجاد دیتابیس</li>
                                    <li>دانلود لاراول از طریق دستور composer داخل فولدر www</li>
                                    <li>ایجاد pretty URL برای پروژه (توی مرورگر ProjectName.test میزنیم و پروژه میاد بالا)</li>
                                </ol>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_2">
                            <pre class="text-left line-numbers"><code class="language-bash match-braces">{{ "composer create-project --prefer-dist laravel/laravel Blog" }}</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-primary collapsable-card collapsed-card">
        <div class="card-header"  data-widget="collapse" style="cursor: pointer">
            <h3 class="card-title text-center">کانفیگ دیتابیس</h3>
            <div class="card-tools" style="right: 5px !important;">
                <button type="button" class="btn btn-tool">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus mr-2"></i>
                </button>
            </div>
        </div>
        <div class="card-body collapsable-body">
            <p>داخل فایل <span class="my-keyword">.env</span> اینارو ست میکنیم: </p>
            <pre class="text-left line-numbers">
                        <code class="language-bash match-braces">
                            DB_DATABASE=mydbname
                            DB_USERNAME=root
                            DB_PASSWORD=
                        </code>
                    </pre>
        </div>
    </div>

    <div class="card card-primary collapsable-card collapsed-card">
        <div class="card-header"  data-widget="collapse" style="cursor: pointer">
            <h3 class="card-title text-center">تنظیم Timezone</h3>
            <div class="card-tools" style="right: 5px !important;">
                <button type="button" class="btn btn-tool">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus mr-2"></i>
                </button>
            </div>
        </div>
        <div class="card-body collapsable-body">
            <p>داخل فایل <span class="my-keyword">config/app.php</span> ست میکنیم: </p>
            <pre class="text-left line-numbers">
                        <code class="language-php match-braces">'timezone' => 'Asia/Tehran',</code>
                    </pre>
        </div>
    </div>

    <div class="card card-primary collapsable-card collapsed-card">
        <div class="card-header"  data-widget="collapse" style="cursor: pointer">
            <h3 class="card-title text-center">راه اندازی Git <span class="right badge badge-danger mr-2" style="vertical-align: middle;">ناقص</span> </h3>
            <div class="card-tools" style="right: 5px !important;">
                <button type="button" class="btn btn-tool">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus mr-2"></i>
                </button>
            </div>
        </div>
        <div class="card-body collapsable-body">
            <p>داخل روت پروژه، <span class="my-keyword">CMD</span> رو باز میکنیم: </p>
            <pre class="text-left line-numbers">
                        <code class="language-bash match-braces">
                            git config --global user.email "mohammadt8888@gmail.com"
                            git config --global user.name "Mohammad Esmaeili"
                            git init
                            git add .
                            git commit -m "initial commit"
                            git remote add origin https://github.com/LaraShout/laravel-ecommerce-application.git
                            git push -u origin master
                        </code>
                    </pre>
            <p class="mt-5">بعد داخل فایل <span class="my-keyword">.gitignore</span> این موارد رو میزاریم: </p>
            <pre class="text-left line-numbers">
                        <code class="language-git match-braces">
                            .idea
                            /public/backend
                            /public/frontend
                            /public/uploads
                        </code>
                    </pre>
            <p class="mt-5">تنظیم کردن <span class="my-keyword">SSH</span> به این شکل هست: </p>
            TODO
        </div>
    </div>

    <div class="card card-primary collapsable-card collapsed-card">
        <div class="card-header"  data-widget="collapse" style="cursor: pointer">
            <h3 class="card-title text-center">نصب laravel modules </h3>
            <div class="card-tools" style="right: 5px !important;">
                <button type="button" class="btn btn-tool">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus mr-2"></i>
                </button>
            </div>
        </div>
        <div class="card-body collapsable-body">
            <p><a href="https://github.com/nWidart/laravel-modules">https://github.com/nWidart/laravel-modules</a></p>
        </div>
    </div>

    <row id="toolbar-bottom">
        <div class="btn-group mb-3">
            <button type="button" class="btn btn-default collapse-all">Collapse All <i class="fa fa-align-left" style="vertical-align: middle"></i></button>
            <button type="button" class="btn btn-default expand-all">Expand All <i class="fa fa-align-left" style="vertical-align: middle"></i></button>
        </div>
    </row>

    @slot('custom_js')
        <script>
            $(document).ready(function () {
                //
            });
        </script>
        <script>
            let card = $('.collapsable-card');
            let card_body = card.find('.collapsable-body');
            $(document).on('click', '.collapse-all', function (){
                card.addClass('collapsed-card');
                card_body.hide();
            });
            $(document).on('click', '.expand-all', function (){
                card.removeClass('collapsed-card');
                card_body.show();
            });
        </script>
    @endslot
@endcomponent
