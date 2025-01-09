<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create an Account</title>

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

    .signup-wrapper {
        width: 100%;
        max-width: 400px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .signup-header {
        text-align: center;
        padding: 20px;
        background: #f8f9fa;
        border-bottom: 1px solid #ddd;
    }

    .signup-header img {
        width: 60px;
        margin-bottom: 10px;
    }

    .signup-header h3 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .signup-header h4 {
        margin-top: 5px;
        color: #666;
        font-size: 0.9rem;
    }

    .signup-content {
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

    .btn-signup {
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

    .btn-signup:hover {
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

<div class="signup-wrapper">
    <div class="signup-header">
        <img src="<?=assets?>/img/icons/farm.jpg" alt="Logo">
        <h3>Create an Account</h3>
        <h4>Continue where you left off</h4>
    </div>
    <div class="signup-content">
        <form action="/accounts/createacc" method="post">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input id="fullname" name="fullname" type="text" placeholder="Enter your full name">
            </div>
            <div class="form-group">
                <label for="username">Email</label>
                <input id="username" name="username" type="text" placeholder="Enter your email address">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn-signup">Sign Up</button>
        </form>
        <div class="form-footer">
            <p>Already a user? <a href="/accounts/login">Sign In</a></p>
        </div>
    </div>
</div>

</body>
</html>
