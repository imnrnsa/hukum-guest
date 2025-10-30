@extends('dashboard.layout')

@section('title', 'Profil Saya')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <!-- Profile Card -->
        <div class="card border-0">
            <div class="card-header bg-white border-0">
                <h5 class="card-title mb-0">
                    <i class="bi bi-person-circle me-2"></i>Profil Pengguna
                </h5>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('auth.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" 
                                   name="name" 
                                   class="form-control" 
                                   value="{{ old('name', $user->name) }}" 
                                   required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" 
                                   name="username" 
                                   class="form-control" 
                                   value="{{ old('username', $user->username) }}" 
                                   required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" 
                               name="email" 
                               class="form-control" 
                               value="{{ old('email', $user->email) }}" 
                               required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="text" 
                                   name="phone" 
                                   class="form-control" 
                                   value="{{ old('phone', $user->phone) }}" 
                                   placeholder="Opsional">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Role</label>
                            <input type="text" 
                                   class="form-control" 
                                   value="{{ ucfirst($user->role) }}" 
                                   disabled
                                   style="background-color: #f8f9fa;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="address" 
                                  class="form-control" 
                                  rows="3" 
                                  placeholder="Opsional">{{ old('address', $user->address) }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('auth.change-password') }}" class="btn btn-outline-primary">
                            <i class="bi bi-key me-2"></i>Ubah Password
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>Update Profil
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Account Info Card -->
        <div class="card border-0 mt-4">
            <div class="card-header bg-white border-0">
                <h6 class="card-title mb-0">
                    <i class="bi bi-info-circle me-2"></i>Informasi Akun
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="120">Status:</th>
                                <td>
                                    @if($user->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Nonaktif</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Email Verified:</th>
                                <td>
                                    @if($user->email_verified_at)
                                        <span class="badge bg-success">Terverifikasi</span>
                                    @else
                                        <span class="badge bg-warning">Belum Verifikasi</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="120">Bergabung:</th>
                                <td>{{ $user->created_at->format('d M Y') }}</td>
                            </tr>
                            <tr>
                                <th>Terakhir Update:</th>
                                <td>{{ $user->updated_at->format('d M Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection