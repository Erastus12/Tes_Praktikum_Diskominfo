<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* fallback gradient if image missing */
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            /* put your background image at public/img/sekolah_bg.jpg */
            background-image: url("{{ asset('img/sekolah_bg.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }

        .login-box {
            background: white;
            padding: 2.5rem 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo-img {
            width: 80px;
            height: 80px;
            margin: 0 auto 1rem;
            object-fit: contain;
        }

        .login-header h1 {
            color: #333;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: #999;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.85rem 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .password-wrapper {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .password-wrapper input {
            flex: 1;
        }

        .toggle-btn {
            background: transparent;
            border: none;
            cursor: pointer;
            font-size: 1.05rem;
            padding: 0.35rem;
            color: #555;
            border-radius: 4px;
        }

        .toggle-btn:hover {
            background: rgba(0, 0, 0, 0.03);
        }

        .form-group input::placeholder {
            color: #ccc;
        }

        .error-message {
            background: #fee;
            color: #c33;
            padding: 0.75rem 1rem;
            border-radius: 5px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            border-left: 4px solid #c33;
        }

        .submit-btn {
            width: 100%;
            padding: 0.9rem;
            background: #4f46e5;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .submit-btn:hover {
            background: #3730a3;
        }

        .submit-btn:active {
            transform: scale(0.98);
        }

        @media (max-width: 480px) {
            .login-box {
                padding: 2rem 1.5rem;
            }

            .login-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                @if (file_exists(public_path('logo/logo.png')))
                    <img src="{{ asset('logo/logo.png') }}" alt="Logo" class="logo-img">
                @endif
                <h1>Login</h1>
                <p>Masuk ke sistem</p>
            </div>

            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <form method="POST" action="/login">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email Anda"
                        value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                        <button type="button" id="showPasswordToggle" class="toggle-btn"
                            aria-label="Tampilkan password" aria-pressed="false">Tampil</button>
                    </div>
                </div>

                <button type="submit" class="submit-btn">Masuk</button>
            </form>
        </div>
    </div>

    <script>
        (function() {
            var btn = document.getElementById('showPasswordToggle');
            var pwd = document.getElementById('password');
            if (!btn || !pwd) return;
            btn.addEventListener('click', function() {
                if (pwd.type === 'password') {
                    pwd.type = 'text';
                    btn.textContent = 'Sembunyi';
                    btn.setAttribute('aria-pressed', 'true');
                } else {
                    pwd.type = 'password';
                    btn.textContent = 'Tampil';
                    btn.setAttribute('aria-pressed', 'false');
                }
            });
        })();
    </script>
</body>

</html>
