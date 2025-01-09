<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Modern Design</title>

<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="<?=assets?>/img/favicon.jpg">

<!-- Stylesheets -->
<link rel="stylesheet" href="<?=assets?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=assets?>/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="<?=assets?>/plugins/fontawesome/css/all.min.css">

<!-- Custom Styles -->
<style>
    body {
        background: url('<?=assets?>/img/background.jpg') no-repeat center center/cover;
        height: 100vh;
        margin: 0;
        font-family: 'Arial', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-wrapper {
        width: 100%;
        max-width: 400px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .login-header {
        text-align: center;
        padding: 20px;
        background: #f8f9fa;
        border-bottom: 1px solid #ddd;
    }

    .login-header img {
        width: 60px;
        border-radius: 50%;
        margin-bottom: 10px;
    }

    .login-header h3 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .login-header h4 {
        margin-top: 5px;
        color: #666;
        font-size: 0.9rem;
    }

    .login-content {
        padding: 20px;
    }

    .form-group label {
        font-weight: 600;
        color: #333;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-top: 5px;
        box-sizing: border-box;
    }

    .form-group input:focus {
        border-color: #007bff;
        outline: none;
    }

    .btn-login {
        width: 100%;
        background: #28a745;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        margin-top: 15px;
    }

    .btn-login:hover {
        background: #218838;
    }

    .form-footer {
        text-align: center;
        margin-top: 15px;
        font-size: 0.9rem;
    }

    .form-footer a {
        color: #007bff;
        text-decoration: none;
    }

    .form-footer a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>

<div class="login-wrapper">
    <div class="login-header">
        <img src="<?=assets?>/img/icons/farm.jpg" alt="Logo">
        <h3>Sign In</h3>
        <h4>Please login to your account</h4>
    </div>
    <div class="login-content">
        <form action="/accounts/acclogin" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="username" type="text" placeholder="Enter your email address">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn-login">Sign In</button>
        </form>
        <div class="form-footer">
            <p><a href="forgetpassword.html">Forgot Password?</a></p>
            <p>Don’t have an account? <a href="/accounts/signup">Sign Up</a></p>
        </div>
    </div>
</div>

</body>
</html>
