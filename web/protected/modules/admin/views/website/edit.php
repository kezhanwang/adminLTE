<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">网站设置修改</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label>ID</label>
                        <input class="form-control" id="id" name="id" value="<?php echo $data['id']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>KEY</label>
                        <input class="form-control" id="key" name="key" value="<?php echo $data['key']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>VALUE</label>
                        <input class="form-control" id="value" name="value" value="<?php echo $data['value']; ?>">
                    </div>
                    <div class="form-group">
                        <label>描述</label>
                        <input class="form-control" id="desp" name="desp" value="<?php echo $data['desp']; ?>">
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm" id="ok">确认</button>
                    <a href="<?php echo $back;?>" type="button" class="btn btn-primary">取消</a>
                </div>
            </div><!-- /.box -->
        </div>
    </div>

    <div id="sure" class="modal fade" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">网站设置修改</h4>
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

    <div id="info" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div id="info" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="mySmallModalLabel">警告</h4>
                </div>
                <div class="modal-body" id="infoerror">
                    ...
                </div>
            </div><!-- /.modal-content -->
        </div>
    </div>
</section>


<script src="/adminLTE/plugins/fastclick/fastclick.min.js"></script>
<script type="text/javascript">
    $(function () {
        var sure = false;
        $('#ok').click(function () {
            var id = $('#id').val();
            var key = $('#key').val();
            var value = $('#value').val();
            var desp = $('#desp').val();

            if (key == '' || key.length > 50 || value == '' || value.length > 50) {
                $('#infoerror').html('填写信息错误,请检查');
                $('#info').modal('show');
                return false;
            }

            $('#sure').modal('show');
        });
        
        $('#todo').click(function () {
            var id = $('#id').val();
            var key = $('#key').val();
            var value = $('#value').val();
            var desp = $('#desp').val();
            $('#sure').modal('hide');
            $.ajax({
                type: 'POST',
                url:'/admin/website/edit',
                data: {id: id, key: key, value: value, desp: desp, type: '_edit'},
                dataType: 'json',
                success: function (responseData) {
                    if (responseData.code){
                        $('#mySmallModalLabel').html('恭喜');
                    }
                    $('#infoerror').html(responseData.msg);
                    $('#info').modal('show');
                }
            });
        });


    });
</script>