<div class="login-box">
    <div class="login-logo">
        <b><?php echo Yii::app()->name; ?></b>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">登录</p>
        <div class="form-group has-feedback">
            <input type="text" name="username" id="username" class="form-control" placeholder="用户名">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="password" id="password" class="form-control" placeholder="密码">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox">
                    <label></label>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat" id="sign">登录</button>
            </div><!-- /.col -->
        </div>
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->


