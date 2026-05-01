@extends('layouts.admin')

@section('content')

<div class="main-wrapper">
    <div class="container">

        <h2 class="mb-4">Career Applications</h2>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Position</th>
                    <th>Resume</th>
                    <th>Date</th>
                    <th width="120">Action</th> {{-- New Column --}}
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $key => $app)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $app->name }}</td>
                    <td>{{ $app->email }}</td>
                    <td>{{ $app->phone }}</td>
                    <td>{{ $app->position }}</td>
                    <td>
                        <a href="{{ asset('uploads/resume/'.$app->resume) }}" target="_blank">
                            View Resume
                        </a>
                    </td>
                    <td>{{ $app->created_at->format('d M Y') }}</td>

                    {{-- Delete Button --}}
                    <td>
                        <form action="{{ route('admin.career.destroy', $app->id) }}" 
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this application?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        @if(method_exists($applications, 'links'))
            {{ $applications->links() }}
        @endif

    </div>
</div>

@endsection
