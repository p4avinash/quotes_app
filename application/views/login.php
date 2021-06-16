<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Icon title -->
    <link rel="icon" href="https://img.icons8.com/clouds/100/000000/e.png">
    <!-- Bootstrap link -->
    <script src="<?php echo $this->config->item('jquery_url') ?>"></script>
    <link rel="stylesheet" href="<?php echo $this->config->item('bootstrap_css_url') ?>">
    <script src="<?php echo $this->config->item('bootstrap_js_url') ?>"></script>
    <!-- Css file link -->
    <link rel="stylesheet" href="<?php echo $this->config->item('css_url') . '/express_main.css' ?>">
    <!-- Fontawesome link css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
</head>

<body>
    <div class="user_details">
        <form action="" method="post" id="user_details_form" enctype="multipart/form-data">
            <div class="input login-email">
                <label for="email">Email:</label><br>
                <input type="text" name="login-email" value="<?php echo set_value('login-email') ?>" id="login-email" placeholder="enter your email">
                <div class="error"><?php echo form_error('login-email'); ?></div>
            </div>
            <div class="input password">
                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password" placeholder="enter you password">
                <div class="error"><?php echo form_error('password'); ?></div>
            </div><br>
            <button type="submit">Submit</button>
        </form>
    </div>
    <!-- Scripts -->
    <script src="<?php echo $this->config->item('js_url') . '/login.js' ?>"></script>
</body>

</html>