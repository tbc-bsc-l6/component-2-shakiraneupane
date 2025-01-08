@extends('admin.layout')

@section('content')
    <div class="container">
        <h2>Contact Messages</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>{{ $contact->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Display pagination links -->
        <div class="pagination-container">
            {{ $contacts->links() }}
        </div>
    </div>
@endsection
