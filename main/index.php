
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/svg+xml" href="https://numberguest.shop/favicon.png">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #3794fc;
            --primary-dark: #2980b9;
            --text: #333;
            --text-light: #666;
            --error: #dc3545;
            --success: #28a745;
            --bg: #f4f6f9;
            --white: #fff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        body {
            background: var(--bg);
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 1rem;
        }

        .login-container {
            background: var(--white);
            padding: clamp(1.5rem, 5vw, 3rem);
            border-radius: 1rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            width: min(100%, 400px);
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .brand-wrapper {
            text-align: center;
            margin-bottom: 2rem;
        }

        .brand-wrapper img {
            width: min(200px, 80%);
            height: auto;
            margin-bottom: 1rem;
        }

        .brand-wrapper h2 {
            color: var(--text);
            font-size: clamp(1.5rem, 4vw, 2rem);
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text);
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid #e1e5ee;
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--white);
        }

        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 4px rgba(55, 148, 252, 0.1);
        }

        .btn-login {
            width: 100%;
            padding: 0.875rem;
            border: none;
            border-radius: 0.5rem;
            background: var(--primary);
            color: var(--white);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-login:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(55, 148, 252, 0.2);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .error-message {
            background: rgba(220, 53, 69, 0.1);
            color: var(--error);
            padding: 0.75rem;
            border-radius: 0.5rem;
            margin-top: 1rem;
            font-size: 0.875rem;
            text-align: center;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .whatsapp-container {
            margin-top: 2rem;
            text-align: center;
        }

        .whatsapp-text {
            color: var(--text-light);
            font-size: 0.875rem;
            margin-bottom: 0.75rem;
        }

        .whatsapp-link {
            display: inline-block;
            color: #25D366;
            font-size: 2.5rem;
            transition: all 0.3s ease;
        }

        .whatsapp-link:hover {
            color: #128C7E;
            transform: scale(1.1) rotate(8deg);
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 1.5rem;
            }

            .brand-wrapper h2 {
                font-size: 1.5rem;
            }

            .form-control {
                padding: 0.75rem;
            }

            .whatsapp-link {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="brand-wrapper">
            <img src="https://numberguest.shop/logo.png" alt="Logo">
            <h2>Admin Login</h2>
        </div>
        
        <form action="maulyikarisalu.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required 
                       placeholder="Enter your username">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required
                       placeholder="Enter your password">
            </div>
            
            <button type="submit" class="btn-login">
                Sign In
            </button>
                    </form>
        <div class="whatsapp-container">
            <div class="whatsapp-text">Want to purchase website?</div>
            <a href="https://wa.me/+917260843489" target="_blank" class="whatsapp-link">
                <i class="fab fa-whatsapp"></i>
            </a>
        </div>
    </div>
</body>
</html>