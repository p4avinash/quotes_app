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
    <link rel="stylesheet" href="<?php echo $this->config->item('css_url').'/register.css' ?>">
    <!-- Fontawesome link css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
</head>

<body>
    <div class="user_details">
        <form action="" method="post" id="user_details_form" enctype="multipart/form-data">
            <div class="input first_name">
                <label for="first_name">First Name:</label><br>
                <input type="text" name="first_name" value="<?php echo set_value('first_name') ?>" id="first_name" placeholder="enter your first name">
                <div class="error"><?php echo form_error('first_name'); ?></div>
            </div>
            <div class="input last_name">
                <label for="last_name">Last Name:</label><br>
                <input type="text" name="last_name" value="<?php echo set_value('last_name') ?>" id="last_name" placeholder="enter your last name">
                <div class="error"><?php echo form_error('last_name'); ?></div>
            </div>
            <div class="input email">
                <label for="email">Email:</label><br>
                <input type="text" name="email" value="<?php echo set_value('email') ?>" id="email" placeholder="enter your email">
                <div class="error"><?php echo form_error('email'); ?></div>
            </div>
            <div class="input password">
                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password" placeholder="create your password">
                <div class="error"><?php echo form_error('password'); ?></div>
            </div>
            <div class="input gender">
                <label for="gender">Gender</label><br>
                Male: <input type="radio" id="male" value="male" name="gender"> &nbsp;&nbsp; Female: <input type="radio" id="female" value="female" name="gender"> &nbsp;&nbsp; Others: <input type="radio" id="others" value="others" name="gender">
            </div><br>
            <label for="profile_pic">Select Profile Picture</label><br>
            <input type="file" name="profile" id="profile"><br><br>
            <button type="submit">Submit</button>
        </form>
    </div>
    <!-- Scripts -->
    <script src="<?php echo $this->config->item('js_url') . '/register.js' ?>"></script>
</body>

</html>