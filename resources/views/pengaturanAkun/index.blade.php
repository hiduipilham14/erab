<!doctype html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <style>
        /* Profile specific styles */
        .profile-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .profile-sidebar {
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            font-size: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #7367f0;
            color: white;
        }

        .nav-tabs .nav-link {
            padding: 0.75rem 1.25rem;
            font-weight: 500;
        }

        .tab-content {
            padding: 1.5rem 0;
        }

        /* Status badge styling */
        .status-badge {
            font-size: 0.875rem;
            padding: 0.35em 0.65em;
        }

        .status-active {
            background-color: #28a745;
        }

        /* Avatar image styling */
        .avatar-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
        }

        /* Mobile optimizations */
        @media (max-width: 767.98px) {
            .profile-sidebar {
                border-right: none;
                border-bottom: 1px solid #dee2e6;
                padding-bottom: 1.5rem;
            }

            .profile-avatar, .avatar-img {
                width: 80px;
                height: 80px;
                font-size: 1.5rem;
            }

            .nav-tabs .nav-link {
                padding: 0.5rem;
                font-size: 0.9rem;
            }
        }

        /* Form styles */
        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .img-thumbnail {
            max-width: 120px;
            height: auto;
            border: 1px solid #dee2e6;
            border-radius: 50%;
        }

        /* Password strength indicator */
        .password-strength {
            height: 5px;
            margin-top: 0.25rem;
            background-color: #e9ecef;
            border-radius: 3px;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            width: 0%;
            transition: width 0.3s ease;
        }
    </style>

    @include('admin.css')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('admin.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('admin.navbar')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="container-xxl py-4 profile-container">
                    <div class="card">
                        <div class="row g-0">
                            <!-- Sidebar Profile Info -->
                            <div class="col-md-3 profile-sidebar p-4 text-center">
                                @if (auth()->user()->image)
                                    <img src="{{ asset('uploads/profile/' . auth()->user()->image) }}"
                                         alt="Foto Profil" class="avatar-img mb-3">
                                @else
                                    <div class="profile-avatar rounded-circle mx-auto mb-3">
                                        @php
                                            $initials = strtoupper(substr(auth()->user()->name, 0, 2));
                                        @endphp
                                        {{ $initials }}
                                    </div>
                                @endif
                                <h5 class="fw-bold mb-2">{{ auth()->user()->name }}</h5>
                                <p class="text-muted mb-3">{{ auth()->user()->username }}</p>

                                <div class="d-flex flex-column align-items-center">
                                    <span class="badge status-badge status-active mb-2">Aktif</span>
                                    <span class="badge bg-primary">{{ auth()->user()->role->name }}</span>
                                </div>

                                <hr class="my-3">

                                <div class="text-start small">
                                    <p class="mb-1"><strong>Terdaftar:</strong>
                                        {{ auth()->user()->created_at->format('d M Y') }}
                                    </p>
                                    <p class="mb-0"><strong>Terakhir diupdate:</strong>
                                        {{ auth()->user()->updated_at->format('d M Y H:i') }}
                                    </p>
                                </div>
                            </div>

                            <!-- Content Tabs -->
                            <div class="col-md-9 p-4">
                                <ul class="nav nav-tabs mb-4" id="profileTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="account-tab" data-bs-toggle="tab"
                                            data-bs-target="#account" type="button" role="tab">
                                            <i class="bx bx-user me-1"></i> Account
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="security-tab" data-bs-toggle="tab"
                                            data-bs-target="#security" type="button" role="tab">
                                            <i class="bx bx-lock-alt me-1"></i> Security
                                        </button>
                                    </li>
                                </ul>

                                <div class="tab-content" id="profileTabsContent">
                                    <!-- Account Tab -->
                                    <div class="tab-pane fade show active" id="account" role="tabpanel">
                                        <form method="POST" action="{{ route('profile.update') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Username</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->username }}" readonly>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Nama Lengkap</label>
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ old('name', auth()->user()->name) }}" required>
                                                    @error('name')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Foto Profil</label>
                                                <div class="d-flex align-items-center">
                                                    @if (auth()->user()->image)
                                                        <img src="{{ asset('uploads/profile/' . auth()->user()->image) }}"
                                                            alt="Foto Profil" class="img-thumbnail me-3">
                                                    @else
                                                        <div class="profile-avatar rounded-circle me-3 d-flex align-items-center justify-content-center">
                                                            {{ $initials }}
                                                        </div>
                                                    @endif
                                                    <div>
                                                        <input type="file" name="image" class="form-control" accept="image/*">
                                                        <small class="text-muted">Format: JPEG, PNG (Max 2MB)</small>
                                                        @error('image')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="bx bx-save me-1"></i> Simpan Perubahan
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Security Tab -->
                                    <div class="tab-pane fade" id="security" role="tabpanel">
                                        <form method="POST" action="{{ route('profile.password') }}">
                                            @csrf
                                            @method('PUT')

                                            <div class="mb-3">
                                                <label class="form-label">Password Saat Ini</label>
                                                <input type="password" name="current_password" class="form-control" required>
                                                @error('current_password')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Password Baru</label>
                                                <input type="password" name="password" class="form-control"
                                                    id="newPassword" required>
                                                <div class="password-strength mt-1">
                                                    <div class="password-strength-bar" id="passwordStrength"></div>
                                                </div>
                                                <small class="text-muted">Minimal 8 karakter</small>
                                                @error('password')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label class="form-label">Konfirmasi Password Baru</label>
                                                <input type="password" name="password_confirmation"
                                                    class="form-control" required>
                                            </div>

                                            <div class="d-flex justify-content-end">
                                                <button type="reset" class="btn btn-outline-secondary me-2">
                                                    <i class="bx bx-reset me-1"></i> Reset
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="bx bx-lock-alt me-1"></i> Ganti Password
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    @include('admin.alert')
    @include('admin.js')

    <script>
        // Password strength indicator
        document.getElementById('newPassword').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('passwordStrength');
            let strength = 0;

            // Check password length
            if (password.length >= 8) strength += 1;
            if (password.length >= 12) strength += 1;

            // Check for mixed case
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 1;

            // Check for numbers
            if (/\d/.test(password)) strength += 1;

            // Check for special chars
            if (/[^a-zA-Z0-9]/.test(password)) strength += 1;

            // Update strength bar
            const width = (strength / 5) * 100;
            strengthBar.style.width = width + '%';

            // Update color
            if (width < 40) {
                strengthBar.style.backgroundColor = '#dc3545'; // Red
            } else if (width < 70) {
                strengthBar.style.backgroundColor = '#fd7e14'; // Orange
            } else {
                strengthBar.style.backgroundColor = '#28a745'; // Green
            }
        });

        // Show password toggle
        document.querySelectorAll('.password-toggle').forEach(function(toggle) {
            toggle.addEventListener('click', function() {
                const input = this.previousElementSibling;
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.querySelector('i').classList.toggle('bx-show');
                this.querySelector('i').classList.toggle('bx-hide');
            });
        });
    </script>
</body>
</html>
