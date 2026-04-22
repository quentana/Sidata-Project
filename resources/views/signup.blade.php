@extends('templates.app')

@section('content')
<div class="login-container">
    <div class="login-background">
        <!-- Background dengan gradasi -->
        <div class="bg-overlay"></div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <!-- Sama dengan login: col-md-10 col-lg-8 -->
            <div class="col-md-10 col-lg-8">
                <div class="login-card">
                    <!-- Header Card -->
                    <div class="card-header-section">
                        <div class="school-logo">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h3 class="login-title">Buat Akun Baru</h3>
                        <p class="login-subtitle">Daftar untuk mengakses sistem SMK Wikrama</p>
                    </div>

                    <!-- Body Card -->
                    <div class="card-body-section">
                        <form method="POST" action="{{ route('signup.store') }}">
                            @csrf

                            {{-- Notifikasi --}}
                            @if (Session::get('success'))
                                <div class="alert alert-success-custom alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle me-2"></i>
                                    {{ Session::get('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @if (Session::get('error'))
                                <div class="alert alert-danger-custom alert-dismissible fade show" role="alert">
                                    <i class="fas fa-exclamation-circle me-2"></i>
                                    {{ Session::get('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <!-- Name fields -->
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <div class="form-group-custom">
                                        <label for="first_name" class="form-label-custom">
                                            <i class="fas fa-user me-2"></i>Nama Depan
                                        </label>
                                        <div class="input-group-custom">
                                            <input type="text" id="first_name"
                                                   class="form-control-custom @error('first_name') is-invalid-custom @enderror"
                                                   name="first_name" value="{{ old('first_name') }}"
                                                   placeholder="Masukkan nama depan" />
                                            <i class="fas fa-user input-icon"></i>
                                        </div>
                                        @error('first_name')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-custom">
                                        <label for="last_name" class="form-label-custom">
                                            <i class="fas fa-user me-2"></i>Nama Belakang
                                        </label>
                                        <div class="input-group-custom">
                                            <input type="text" id="last_name"
                                                   class="form-control-custom @error('last_name') is-invalid-custom @enderror"
                                                   name="last_name" value="{{ old('last_name') }}"
                                                   placeholder="Masukkan nama belakang" />
                                            <i class="fas fa-user input-icon"></i>
                                        </div>
                                        @error('last_name')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-group-custom">
                                <label for="email" class="form-label-custom">
                                    <i class="fas fa-envelope me-2"></i>Email Address
                                </label>
                                <div class="input-group-custom">
                                    <input type="email" id="email"
                                           class="form-control-custom @error('email') is-invalid-custom @enderror"
                                           name="email" value="{{ old('email') }}"
                                           placeholder="Masukkan email Anda" />
                                    <i class="fas fa-at input-icon"></i>
                                </div>
                                @error('email')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <div class="form-group-custom">
                                <label for="password" class="form-label-custom">
                                    <i class="fas fa-lock me-2"></i>Password
                                </label>
                                <div class="input-group-custom">
                                    <input type="password" id="password"
                                           class="form-control-custom @error('password') is-invalid-custom @enderror"
                                           name="password" placeholder="Buat password yang kuat" />
                                    <i class="fas fa-key input-icon"></i>
                                    <span class="password-toggle" onclick="togglePassword('password')">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password input -->
                            <div class="form-group-custom">
                                <label for="password_confirmation" class="form-label-custom">
                                    <i class="fas fa-lock me-2"></i>Konfirmasi Password
                                </label>
                                <div class="input-group-custom">
                                    <input type="password" id="password_confirmation"
                                           class="form-control-custom"
                                           name="password_confirmation" placeholder="Ulangi password Anda" />
                                    <i class="fas fa-key input-icon"></i>
                                    <span class="password-toggle" onclick="togglePassword('password_confirmation')">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- Terms and Conditions -->


                            <!-- Submit button -->
                            <div class="submit-section">
                                <button type="submit" class="btn-login">
                                    <span class="btn-text">Daftar Sekarang</span>
                                    <i class="fas fa-user-plus btn-icon"></i>
                                </button>
                            </div>

                            {{-- <!-- Divider -->
                            <div class="divider-section">
                                <div class="divider-line"></div>
                                <span class="divider-text">Atau daftar dengan</span>
                                <div class="divider-line"></div>
                            </div> --}}

                            <!-- Social signup buttons -->
                            {{-- <div class="social-login">
                                <button type="button" class="social-btn facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </button>
                                <button type="button" class="social-btn google">
                                    <i class="fab fa-google"></i>
                                </button>
                                <button type="button" class="social-btn twitter">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button type="button" class="social-btn github">
                                    <i class="fab fa-github"></i>
                                </button>
                            </div> --}}
                        </form>
                    </div>

                    <!-- Footer Card -->
                    <div class="card-footer-section">
                        <p class="footer-text">Sudah punya akun?
                            <a href="{{ route('login') }}" class="register-link">Masuk di sini</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Variabel CSS - Sama persis dengan login */
    :root {
        --primary-color: #192077;
        --primary-light: #2a3a9e;
        --secondary-color: #1a2b88;
        --accent-color: #4e73df;
        --text-dark: #2d3748;
        --text-light: #718096;
        --border-color: #e2e8f0;
        --success-color: #10b981;
        --danger-color: #ef4444;
        --background-light: #f8fafc;
        --shadow-light: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        --shadow-medium: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        --shadow-large: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }

    /* Container utama - Sama dengan login */
    .login-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
        position: relative;
        overflow: hidden;
    }

    .login-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80') center/cover no-repeat;
    }

    .bg-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #e2e3e7d3;
    }

    /* Card Login - SAMA PERSIS dengan login */
    .login-card {
        background: white;
        border-radius: 20px;
        box-shadow: var(--shadow-large);
        overflow: hidden;
        position: relative;
        z-index: 10;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        /* SAMA dengan login: lebar 800px, kompak vertikal */
        max-width: 800px;
        margin: 0 auto;
        width: 100%;
        min-height: auto;
    }

    .login-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    /* Header Card - SAMA dengan login */
    .card-header-section {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        padding: 2rem 3rem;
        text-align: center;
        color: white;
        position: relative;
    }

    .school-logo {
        width: 70px;
        height: 70px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.8rem;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .login-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .login-subtitle {
        opacity: 0.9;
        font-size: 0.9rem;
    }

    /* Body Card - SAMA dengan login */
    .card-body-section {
        padding: 2rem 3rem;
    }

    /* Alert Custom - SAMA dengan login */
    .alert-success-custom {
        background: #d1fae5;
        border: 1px solid #a7f3d0;
        color: #065f46;
        border-radius: 10px;
        padding: 0.8rem 1rem;
        margin-bottom: 1.2rem;
        font-size: 0.85rem;
    }

    .alert-danger-custom {
        background: #fee2e2;
        border: 1px solid #fecaca;
        color: #991b1b;
        border-radius: 10px;
        padding: 0.8rem 1rem;
        margin-bottom: 1.2rem;
        font-size: 0.85rem;
    }

    /* Form Groups - SAMA dengan login */
    .form-group-custom {
        margin-bottom: 1.2rem;
    }

    .form-label-custom {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: var(--text-dark);
        font-size: 0.9rem;
    }

    .input-group-custom {
        position: relative;
    }

    .form-control-custom {
        width: 100%;
        padding: 0.9rem 3rem 0.9rem 1rem;
        border: 2px solid var(--border-color);
        border-radius: 10px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: var(--background-light);
    }

    .form-control-custom:focus {
        outline: none;
        border-color: var(--primary-color);
        background: white;
        box-shadow: 0 0 0 3px rgba(25, 32, 119, 0.1);
    }

    .form-control-custom::placeholder {
        color: var(--text-light);
        font-size: 0.9rem;
    }

    .input-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-light);
        font-size: 1rem;
    }

    .is-invalid-custom {
        border-color: var(--danger-color) !important;
    }

    .error-message {
        color: var(--danger-color);
        font-size: 0.8rem;
        margin-top: 0.3rem;
    }

    /* Password Toggle - SAMA dengan login */
    .password-toggle {
        position: absolute;
        right: 2.8rem;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: var(--text-light);
        transition: color 0.3s ease;
        font-size: 1rem;
    }

    .password-toggle:hover {
        color: var(--primary-color);
    }

    /* Form Options - SAMA dengan login */
    .form-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .remember-me {
        display: flex;
        align-items: center;
        gap: 0.6rem;
    }

    .form-check-input-custom {
        width: 1.1rem;
        height: 1.1rem;
        border-radius: 4px;
        border: 2px solid var(--border-color);
        cursor: pointer;
    }

    .form-check-label-custom {
        color: var(--text-dark);
        font-size: 0.9rem;
        cursor: pointer;
    }

    .terms-link {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 500;
    }

    .terms-link:hover {
        text-decoration: underline;
    }

    /* Submit Button - SAMA dengan login */
    .submit-section {
        margin-bottom: 1.5rem;
    }

    .btn-login {
        width: 100%;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: white;
        border: none;
        padding: 0.9rem 2rem;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.6rem;
        position: relative;
        overflow: hidden;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(25, 32, 119, 0.3);
    }

    .btn-login:active {
        transform: translateY(0);
    }

    .btn-text {
        position: relative;
        z-index: 2;
        font-size: 1rem;
    }

    .btn-icon {
        position: relative;
        z-index: 2;
        transition: transform 0.3s ease;
        font-size: 1rem;
    }

    .btn-login:hover .btn-icon {
        transform: translateX(3px);
    }

    /* Divider - SAMA dengan login */
    .divider-section {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .divider-line {
        flex: 1;
        height: 1px;
        background: var(--border-color);
    }

    .divider-text {
        padding: 0 1rem;
        color: var(--text-light);
        font-size: 0.9rem;
        font-weight: 500;
    }

    /* Social Login - SAMA dengan login */
    .social-login {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 0.8rem;
    }

    .social-btn {
        width: 45px;
        height: 45px;
        border: 2px solid var(--border-color);
        border-radius: 10px;
        background: white;
        color: var(--text-dark);
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
    }

    .social-btn:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-light);
    }

    .social-btn.facebook:hover {
        background: #1877f2;
        color: white;
        border-color: #1877f2;
    }

    .social-btn.google:hover {
        background: #db4437;
        color: white;
        border-color: #db4437;
    }

    .social-btn.twitter:hover {
        background: #1da1f2;
        color: white;
        border-color: #1da1f2;
    }

    .social-btn.github:hover {
        background: #333;
        color: white;
        border-color: #333;
    }

    /* Footer Card - SAMA dengan login */
    .card-footer-section {
        padding: 1.2rem 3rem;
        background: var(--background-light);
        text-align: center;
        border-top: 1px solid var(--border-color);
    }

    .footer-text {
        color: var(--text-light);
        margin: 0;
        font-size: 0.9rem;
    }

    .register-link {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
        font-size: 0.9rem;
    }

    .register-link:hover {
        color: var(--primary-light);
        text-decoration: underline;
    }

    /* Responsive Design - SAMA dengan login */
    @media (max-width: 992px) {
        .col-md-10 {
            max-width: 95%;
        }

        .card-header-section,
        .card-body-section {
            padding: 1.8rem 2rem;
        }

        .login-card {
            max-width: 700px;
        }
    }

    @media (max-width: 768px) {
        .login-container {
            padding: 1rem;
        }

        .col-md-10 {
            max-width: 100%;
        }

        .card-header-section,
        .card-body-section {
            padding: 1.5rem 1.5rem;
        }

        .social-login {
            gap: 0.8rem;
        }

        .social-btn {
            width: 40px;
            height: 40px;
            font-size: 1rem;
        }

        .login-card {
            max-width: 100%;
        }

        .card-footer-section {
            padding: 1rem 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .form-options {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }

        .social-login {
            flex-wrap: wrap;
            gap: 0.6rem;
        }

        .card-header-section,
        .card-body-section {
            padding: 1.2rem 1rem;
        }

        .login-title {
            font-size: 1.3rem;
        }

        .school-logo {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }

        .card-footer-section {
            padding: 0.8rem 1rem;
        }

        .form-control-custom {
            padding: 0.8rem 2.8rem 0.8rem 0.8rem;
        }

        .row.mb-3 {
            margin-bottom: 0.5rem !important;
        }

        .col-md-6.mb-3.mb-md-0 {
            margin-bottom: 1rem !important;
        }
    }

    /* Tambahan untuk layar sangat besar - SAMA dengan login */
    @media (min-width: 1400px) {
        .login-card {
            max-width: 850px;
        }
    }
</style>

{{-- <script>
    function togglePassword(fieldId) {
        const passwordInput = document.getElementById(fieldId);
        const toggleIcon = passwordInput.parentElement.querySelector('.password-toggle i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }

    // Animasi saat halaman dimuat - SAMA dengan login
    document.addEventListener('DOMContentLoaded', function() {
        const loginCard = document.querySelector('.login-card');
        loginCard.style.opacity = '0';
        loginCard.style.transform = 'translateY(20px)';

        setTimeout(() => {
            loginCard.style.transition = 'all 0.5s ease';
            loginCard.style.opacity = '1';
            loginCard.style.transform = 'translateY(0)';
        }, 100);
    });
</script> --}}
@endsection
