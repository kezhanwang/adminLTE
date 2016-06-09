<section class="content-header">
    <a href="/admin/website/add" class="btn btn-default">添加网站配置</a>
</section>
<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">网站配置</h3>

            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>KEY</th>
                        <th>设置</th>
                        <th>描述</th>
                        <th>创建时间</th>
                        <th>更新时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($result as $item) { ?>
                        <tr>
                            <td><?php echo $item['id']; ?></td>
                            <td><?php echo $item['define_key']; ?></td>
                            <td><?php echo $item['value']; ?></td>
                            <td><?php echo $item['desp']; ?></td>
                            <td><?php echo $item['create_time']; ?></td>
                            <td><?php echo $item['update_time']; ?></td>
                            <td>
                                <a href="/admin/website/edit?id=<?php echo $item['id'];?>" class="btn btn-default">编辑</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>KEY</th>
                        <th>设置</th>
                        <th>描述</th>
                        <th>创建时间</th>
                        <th>更新时间</th>
                        <th>操作</th>
                    </tr>
                    </tfoot>
                </table>

            </div><!-- /.box-body -->
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-7">
                        <?php echo $page;?>
                    </div>
                </div>
            </div>
        </div><!-- /.box -->
    </div>
</section>