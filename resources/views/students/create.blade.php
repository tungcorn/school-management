@extends('layouts.app')

@section('title', 'Create')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-4">Tạo học sinh</h2>
            <a href="{{ route('students.index') }}" class="btn btn-secondary mb-3">Trở lại</a>

            <form action="{{ route('students.store') }}" method="POST" onsubmit="this.submitBtn.disabled = true;">
                @csrf

                {{-- Text Field --}}
                <div class="mb-3">
                    <label for="full_name" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                           id="full_name" name="full_name" value="{{ old('full_name') }}" placeholder="Nhập Họ và tên" >
                    @error('full_name')
                    <div class="invalid-feedback">{{ 'Dữ liệu không hợp lệ' }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="student_id" class="form-label">Mã học sinh</label>
                    <input type="text" class="form-control @error('student_id') is-invalid @enderror"
                           id="student_id" name="student_id" value="{{ old('student_id') }}" placeholder="Nhập Mã học sinh" >
                    @error('student_id')
                    <div class="invalid-feedback">{{ 'Dữ liệu không hợp lệ' }}</div>
                    @enderror
                </div>


                    {{-- Email Field --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com">
                        @error('email')
                        <div class="invalid-feedback">{{ 'Dữ liệu không hợp lệ' }}</div>
                        @enderror
                    </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                           id="phone" name="phone" value="{{ old('phone') }}" placeholder="0901234567">
                    @error('phone')
                    <div class="invalid-feedback">{{ 'Dữ liệu không hợp lệ' }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="school_id" class="form-label">Trường học</label>
                    <select class="form-select @error('school_id') is-invalid @enderror"
                            id="school_id" name="school_id">
                        <option value="" selected disabled>-</option>
                        @foreach($schools as $school)
                            <option value="{{ $school->id }}" {{ old('school_id') == $school->id ? 'selected' : '' }}>
                                {{ $school->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('school_id')
                    <div class="invalid-feedback">{{ 'Dữ liệu không hợp lệ' }}</div>
                    @enderror
                </div>

                {{-- Submit Buttons --}}
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" id="submitBtn" class="btn btn-primary">
                        <i class="bi bi-save"></i> Lưu
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection


