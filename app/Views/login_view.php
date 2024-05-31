<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            .login-container {
                margin: 100px auto;
                width: 300px;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #f9f9f9;
            }
            .login-container h2 {
                text-align: center;
            }
            .login-container form {
                margin-top: 20px;
            }
            .login-container form label {
                display: block;
                margin-bottom: 5px;
            }
            .login-container form input[type="text"],
            .login-container form input[type="password"] {
                width: 100%;
                padding: 8px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }
            .login-container form input[type="submit"] {
                width: 100%;
                padding: 10px;
                border: none;
                border-radius: 3px;
                background-color: #007bff;
                color: white;
                cursor: pointer;
            }
            .login-container form input[type="submit"]:hover {
                background-color: #0056b3;
            }
            .error-message {
                color: red;
                margin-top: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body>

    <div class="login-container">
        <h2>Login</h2>
        <?php if(session()->getFlashdata('error')): ?>
            <div class="error-message"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <form action="<?= base_url('login/process') ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
    </div>

    </body>
</html>
