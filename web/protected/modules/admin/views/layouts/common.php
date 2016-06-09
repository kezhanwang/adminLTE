<?php echo $this->renderPartial('/layouts/head'); ?>
<?php
$controller = Yii::app()->controller->id;
$function = Yii::app()->controller->getAction()->getId();
?>

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
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
            <ul class="sidebar-menu">
                <li class="header">功能列表</li>
                <?php $menu = $this->getMenu(); ?>
                <?php foreach ($menu as $key => $value) { ?>
                    <?php if ($value['controller'] == $controller) { ?>
                        <li class="active treeview">
                    <?php } else { ?>
                        <li class="treeview">
                    <?php } ?>
                    <?php if (!empty($value['children'])) { ?>
                        <a href="#"><i class="fa fa-dashboard"></i> <span><?php echo $value['menu_name']; ?></span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <?php foreach ($value['children'] as $k => $v) { ?>
                                <?php if ($v['controller'] == $controller && $v['function'] == $function) { ?>
                                    <li class="active"><a href="<?php echo $v['url']; ?>"><i class="fa fa-circle-o"></i><?php echo $v['menu_name']; ?></a></li>
                                <?php } else { ?>
                                    <li><a href="<?php echo $v['url']; ?>"><i class="fa fa-circle-o"></i><?php echo $v['menu_name']; ?></a></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    <?php }else{ ?>
                        <a href="<?php echo $value['url'];?>"><i class="fa fa-dashboard"></i> <span><?php echo $value['menu_name']; ?></span> <i class="fa fa-angle-left pull-right"></i></a>
                    <?php }?>
                    </li>
                <?php } ?>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php echo $content;?>
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>
<?php echo $this->renderPartial('/layouts/footer'); ?>