@extends('layouts.app')

@section('title', 'List')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Danh sách</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('students.create') }}" class="btn btn-primary">Thêm</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Họ và tên </th>
                <th>Mã học sinh</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Tên trường học </th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->full_name }}</td>
                    <td>{{ $student->student_id }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->school->name }}</td>
                    <td class="text-nowrap">
                        <div class="d-flex gap-2">
                            <a href="{{ route('students.edit', $student ) }}" class="btn btn-sm btn-warning text-dark">Sửa</a>
                            <form action="{{ route('students.destroy', $student ) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Confirm delete?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No data available</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $students->links('pagination::bootstrap-5') }}
    </div>
@endsection
