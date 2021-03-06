<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="/adminLTE/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminLTE/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/adminLTE/dist/css/skins/_all-skins.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="hold-transition login-page">
<?php echo $content; ?>
<!-- jQuery 2.1.4 -->
<script src="/adminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 3.3.5 -->
<script src="/adminLTE/bootstrap/js/bootstrap.min.js"></script>
<script>
    $(function () {
        $('#sign').click(function () {
            var _username = $('#username').val();
            var _password = $('#password').val();
            if (_username == '' || _username.length < 6 || _username > 20) {
                $('.checkbox label').html('请正确填写邮箱！');
                return false;
            } else if (_password == '' || _password.length < 6 || _password.length > 20) {
                $('.checkbox label').html('请正确填写密码！');
                return false;
            }
            $('.checkbox label').html('');
            $.ajax({
                type: "POST",
                url: '/admin/login/login',
                data: {'username': _username, 'password': _password},
                dataType: 'json',
                success: function (data) {
                    $('.checkbox label').html(data.msg);
                    if (data.status){
                        window.location.href = data.data['url'];
                    }
                }
            });
        });
    });
</script>
</body>
</html>