<!-- Content Header (Page header) -->
<section class="content-header" xmlns="http://www.w3.org/1999/html">
    <h1>
        添加文章
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <?php if (isset($id) && $id > 0){ ?>
                <form method="post" action="/admin/article/editor">
                    <input type="hidden" name="type" value="_edit">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <?php }else{ ?>
                    <form method="post" action="/admin/article/add">
                        <input type="hidden" name="type" value="_add">
                        <?php } ?>
                        <div class="box-header">
                            <div class="form-group">
                                <label>文章标题</label>
                                <input type="text" name="title" class="form-control my-colorpicker1 colorpicker-element" value="<?php echo (isset($info['title']))?$info['title']:'';?>" placeholder="请输入文章标题">
                            </div>
                            <div class="form-group">
                                <label>文章短标题</label>
                                <input type="text" name="short_title" class="form-control my-colorpicker1 colorpicker-element" value="<?php echo (isset($info['short_title']))?$info['short_title']:'';?>" placeholder="请输入文章短标题">
                            </div>
                            <div class="form-group">
                                <label>文章分类</label>
                                <select name="class" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option <?php echo (isset($info['status']))?'':'selected="selected"';?> value="0">请选择文章分类</option>
                                    <?php foreach ($class as $key => $value) { ?>
                                        <option value="<?php echo $value['id']; ?>"  <?php if (isset($info['status']) && $info['status']==$value['id']) echo 'selected="selected"';?>><?php echo $value['class']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>文章简介</label>
                                <input type="text" name="simple_introduce" class="form-control my-colorpicker1 colorpicker-element" value="<?php echo (isset($info['title']))?$info['title']:'';?>" placeholder="请输入文章简介">
                            </div>
                            <div class="form-group">
                                <label>文章内容</label>
                                <div class="box-body pad">
                                    <textarea id="content" name="content" rows="10" cols="80"><?php echo (isset($info['content']))?$info['content']:'';?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>是否发布</label>
                                <select name="status" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option <?php echo (isset($info['status']))?'':'selected="selected"';?>>请选择文章分类</option>
                                    <option value="0" <?php echo (isset($info['status']) && $info['status']==0)?'':'selected="selected"';?>>发布</option>
                                    <option value="1" <?php echo (isset($info['status']) && $info['status']==1)?'':'selected="selected"';?>>暂不发布</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>作者</label>
                                <input name="author" type="text" class="form-control my-colorpicker1 colorpicker-element" value="<?php echo (isset($info['author']))?$info['author']:'';?>" placeholder="请输入文章作者">
                            </div>
                        </div><!-- /.box -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" data-toggle="modal"
                                    data-target=".bs-example-modal-sm" id="ok">确认
                            </button>
                        </div>
                    </form>
            </div>
        </div>
</section>


<!-- CK Editor -->
<script src="/adminLTE/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('content');
    });
</script>