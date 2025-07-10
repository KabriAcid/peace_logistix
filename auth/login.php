<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Peace Logistix</title>
    <link rel="stylesheet" href="../assets/css/toasted.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Logo/Brand -->
            <div class="brand-section">
                <div class="brand-logo">
                    <img src="../favicon.png" alt="favicon" class="favicon">
                </div>
                <h1 class="brand-title">Peace Logistix</h1>
                <p class="brand-subtitle">Welcome back! Please sign in to your account</p>
            </div>

            <!-- Login Form -->
            <form class="login-form" id="loginForm">
                <!-- Email Field -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-wrapper">
                        <i class="fa fa-envelope input-icon"></i>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-input"
                            placeholder="Enter your email"
                            required>
                    </div>
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-wrapper">
                        <i class="fa fa-lock input-icon"></i>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input"
                            placeholder="Enter your password"
                            required>
                        <button type="button" class="toggle-password" id="togglePassword">
                            <i class="fa fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="form-options">
                    <a href="#" class="forgot-password">Forgot password?</a>
                </div>

                <!-- Login Button -->
                <button type="submit" class="button custom-button">Sign In</button>

                <!-- Divider -->
                <div class="divider">
                    <span class="divider-text">or continue with</span>
                </div>

                <!-- Google Login -->
                <button type="button" class="btn-google" id="googleLogin">
                    <svg class="google-icon" viewBox="0 0 24 24">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                    </svg>
                    Continue with Google
                </button>
            </form>
        </div>
        <script src="../assets/js/ajax.js"></script>
        <script src="../assets/js/toasted.js"></script>
        <script>
            // Toggle password visibility
            document.getElementById('togglePassword').addEventListener('click', function() {
                const passwordInput = document.getElementById('password');
                const icon = this.querySelector('i');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });

            // Form submission
            document.getElementById('loginForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const email = document.getElementById('email').value.trim();
                const password = document.getElementById('password').value.trim();

                // Validate input fields
                if (!email || !password) {
                    showToasted('Please fill in both email and password fields.', 'error');
                    return;
                }

                // Add loading state
                const submitBtn = this.querySelector('.custom-button');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Signing in...';
                submitBtn.disabled = true;

                // Prepare data for AJAX request
                const data = `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`;

                sendAjaxRequest('/peace_logistix/api/process_login.php', 'POST', data, function(response) {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;

                    if (response.success) {
                        showToasted('Login successful! Redirecting...', 'success');
                        setTimeout(() => {
                            window.location.href = '/peace_logistix/admin/dashboard.php';
                        }, 1500);
                    } else {
                        showToasted(response.message || 'Login failed. Please try again.', 'error');
                    }
                });
            });

            // Google login
            document.getElementById('googleLogin').addEventListener('click', function() {
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Connecting...';
                this.disabled = true;

                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                    showToasted('Google login functionality would be implemented here.', 'info');
                }, 1500);
            });

            // Input focus animations
            document.querySelectorAll('.form-input').forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });

                input.addEventListener('blur', function() {
                    if (!this.value) {
                        this.parentElement.classList.remove('focused');
                    }
                });
            });
        </script>
</body>

</html>