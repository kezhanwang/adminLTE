<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">文章分类</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label>分类</label>
                        <input class="form-control" id="class" name="class"
                               value="<?php echo isset($info['class']) ? $info['class'] : '' ?>">
                    </div>
                    <div class="form-group">
                        <label>状态</label>
                        <select class="form-control select2 select2-hidden-accessible" name="status" id="status"
                                style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <?php if (isset($info['status'])) { ?>
                                <option>请选择分类状态</option>
                                <option value="0" <?php if ($info['status'] == 0) {
                                    echo 'selected="selected"';} ?>>可用
                                </option>
                                <option value="1" <?php if ($info['status'] == 1) {
                                    echo 'selected="selected"';} ?>>不可用
                                </option>
                            <?php } else { ?>
                                <option selected="selected">请选择分类状态</option>
                                <option value="0">可用</option>
                                <option value="1">不可用</option>
                            <?php } ?>

                        </select>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm"
                            id="ok">确认
                    </button>
                    <a href="<?php echo $back; ?>" type="button" class="btn btn-primary">取消</a>
                </div>
            </div><!-- /.box -->
        </div>
    </div>

    <div id="sure" class="modal fade" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">文章分类</h4>
                </div>
                <div class="modal-body">
                    确认进行修改?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary" id="todo">确认</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="info" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel">
        <div id="info" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="mySmallModalLabel">警告</h4>
                </div>
                <div class="modal-body" id="infoerror">
                    ...
                </div>
            </div><!-- /.modal-content -->
        </div>
    </div>
</section>
<input type="hidden" id="type" value="<?php echo $type; ?>">
<input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>">

<script src="/adminLTE/plugins/fastclick/fastclick.min.js"></script>
<script type="text/javascript">
    $(function () {
        var sure = false;
        $('#ok').click(function () {
            var _class = $('#class').val();
            var _status = $('#_status').val();

            if (_class == '' || _status == '') {
                $('#infoerror').html('填写信息错误,请检查');
                $('#info').modal('show');
                return false;
            }

            $('#sure').modal('show');
        });

        $('#todo').click(function () {
            var _class = $('#class').val();
            var _status = $('#_status').val();
            var _type = $('#type').val();
            if (_type == '_classadd') {
                var _url = '/admin/article/classadd';
                var _data = {class: _class, status: _status, type: _type};
            } else {
                var _url = '/admin/article/classedit';
                var _data = {class: _class, status: _status, type: _type, id:$('#id').val()};
            }
            $('#sure').modal('hide');
            $.ajax({
                type: 'POST',
                url: _url,
                data: _data,
                dataType: 'json',
                success: function (responseData) {
                    if (responseData.code) {
                        $('#mySmallModalLabel').html('恭喜');
                    }
                    $('#infoerror').html(responseData.msg);
                    $('#info').modal('show');
                }
            });
        });


    });
</script>