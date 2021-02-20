<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Express</title>
    <!-- Bootstrap link -->
    <link rel="stylesheet" href="<?php echo $this->config->item('bootstrap_css_url') ?>">
    <!-- Css file link -->
    <link rel="stylesheet" href="<?php echo $this->config->item('css_url') . '/express_main.css' ?>">
    <!-- Fontawesome link css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
</head>

<body>
    <h1 class="brand"> EXPRESS </h1>
    <p class="moto">Express your feelings, write some quotes and share it with the world</p>
    <div class="buttons">
        <button>Register</button>
        <button>Login</button>
    </div>
    <div class="footer">
        <p>| Express - Made with <span class="heart"><i class="fa fa-heart"></i></span> | &copy; - <a href="https://p4avinash.github.io/portfolio/" target="_blank" rel="noreferrer">p4avinash</a> | <span class="year"></span> |</p>
    </div>

    <!-- Scripts -->
    <script src="<?php echo $this->config->item('js_url') . '/express_main.js' ?>"></script>
</body>

</html>