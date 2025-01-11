<div style="display: contents">



    <div class="content">
        <div class="container-fluid">

            @include('layouts.admins.alert')
            <div class="row">

                <div class="col-sm-12 col-lg-12 xl-100">
                    @livewire('admin.categories.categories',[[
                            'category_id' => $category->id,
                            'header' => false,
                             'url' => request()->route()->getName()
                            ]])
                </div>

            </div>

        </div>

    </div>
</div>

