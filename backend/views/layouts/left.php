<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..." />
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['/site']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Data Master',
                        'icon' => 'database',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Pengguna', 'icon' => 'address-book', 'url' => ['/user'],],
                            ['label' => 'Mobil', 'icon' => 'car', 'url' => ['/mobil'],],
                            ['label' => 'Fasilitas', 'icon' => 'book', 'url' => ['/fasilitas'],],
                        ],
                    ],
                    ['label' => 'Sewa', 'icon' => 'angle-double-right', 'url' => ['/sewa'],],
                    ['label' => 'Tool', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                ],
            ]
        ) ?>

    </section>

</aside>