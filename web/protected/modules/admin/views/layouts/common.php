<?php echo $this->renderPartial('/layouts/head'); ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><?php echo $this->website['web_name'];?></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="/admin/login/logout" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-log-out"></i>
                            退出
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?php $menu = $this->getMenu();echo $menu;?>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php echo $content;?>
    </div><!-- /.content-wrapper -->

<?php echo $this->renderPartial('/layouts/footer'); ?>