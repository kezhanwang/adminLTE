<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        添加文章
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <div class="form-group">
                        <label>文章标题</label>
                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" placeholder="请输入文章标题">
                    </div>
                    <div class="form-group">
                        <label>文章短标题</label>
                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" placeholder="请输入文章短标题">
                    </div>
                    <div class="form-group">
                        <label>文章分类</label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option selected="selected" value="0">请选择文章分类</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>文章简介</label>
                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" placeholder="请输入文章简介">
                    </div>
                    <div class="form-group">
                        <label>文章内容</label>
                        <div class="box-body pad">
                            <textarea id="editor1" name="editor1" rows="10" cols="80"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>是否发布</label>
                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" placeholder="请输入文章标题">
                    </div>
                    <div class="form-group">
                        <label>作者</label>
                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" placeholder="请输入文章作者">
                    </div>
                </div><!-- /.box -->
                <div class="box-footer">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm" id="ok">确认</button>
<!--                    <a href="--><?php //echo $back;?><!--" type="button" class="btn btn-primary">取消</a>-->
                </div>
            </div>
        </div>
</section>


<!-- CK Editor -->
<script src="/adminLTE/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
    });
</script>