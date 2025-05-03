<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem</title>
    <link href="<?= BASE_URL; ?>css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #0062E6, #33AEFF);
            height: 100vh;
        }
        .card {
            border-radius: 1rem;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }
        .btn-google, .btn-facebook, .btn-register {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .input-group-text {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow p-4">
                    <h3 class="text-center mb-4">Login</h3>
                    <form action="<?= BASE_URL; ?>/login/loginProcess" method="POST">
                        <div class="form-group mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password" required>
                                <span class="input-group-text" onclick="togglePassword()">
                                    <i id="eyeIcon" class="bi bi-eye-slash"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3 text-end">
                            <a href="#" class="text-decoration-none">Forgot password?</a>
                        </div>
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div class="text-center mb-2">
                            <small>or login with</small>
                        </div>
                        <div class="d-grid gap-2 mb-2">
                            <button type="button" class="btn btn-primary btn-google">
                                <i class="bi bi-google me-2"></i> Login with Google
                            </button>
                            <button type="button" class="btn btn-primary btn-facebook">
                                <i class="bi bi-facebook me-2"></i> Login with Facebook
                            </button>
                        </div>
                        <div class="d-grid">
                            <a href="<?= BASE_URL; ?>login/register" class="btn btn-success btn-register">
                                <i class="bi bi-person-plus-fill me-2"></i> Register
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById("password");
            const icon = document.getElementById("eyeIcon");
            if (password.type === "password") {
                password.type = "text";
                icon.classList.remove("bi-eye-slash");
                icon.classList.add("bi-eye");
            } else {
                password.type = "password";
                icon.classList.remove("bi-eye");
                icon.classList.add("bi-eye-slash");
            }
        }
    </script>
    <script src="<?= BASE_URL; ?>js/bootstrap.js" type="text/javascript"></script>
</body>
</html>
