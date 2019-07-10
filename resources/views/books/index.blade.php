@extends('layout')

@section('title', 'Books CRUD')
@section('page_desc', 'Interview test for Books CRUD by Riko Logwirno')

@section('main_content')

<div class="row">
    <div class="col-10 mx-auto">
        <div class="container">

            @php
                $url = route('add_book');
                $method = "POST";
                if(isset($book_detail)) {
                    $url = route('update_book', ['id' => $book_detail->id]);
                    // $method = "PUT";
                }
            @endphp

            <form action="{{ $url }}" method="{{ $method }}">

                @csrf
                @isset($book_detail)
                    <input type="hidden" name="id" value="{{ $book_detail->id }}">
                @endisset
                @php
                    $title = isset($book_detail) ? $book_detail->title : "";
                    $author = isset($book_detail) ? $book_detail->author : "";
                    $date_published = isset($book_detail) ? $book_detail->date_published : "";
                    $page_numbers = isset($book_detail) ? $book_detail->number_pages : "";
                    $book_type = isset($book_detail) ? $book_detail->book_type : "";
                @endphp
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{ $title }}" name="title" id="inputName" placeholder="Title">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Author</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{ $author }}" name="author" id="inputName" placeholder="Author">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Date Published</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" value="{{ $date_published }}" name="date_published" id="inputName" placeholder="Date Published">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Number of Pages</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{ $page_numbers }}" name="page_numbers" id="inputName" placeholder="Number of Pages">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Book Type</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="book_type" id="">
                            <option @if ($book_type == "") selected @endif value="">Choose Book Type</option>
                            <option @if ($book_type == "One Of Novel") selected @endif value="One Of Novel">One Of Novel</option>
                            <option @if ($book_type == "Documentation") selected @endif value="Documentation">Documentation</option>
                            <option @if ($book_type == "Other") selected @endif value="Other">Other</option>
                        </select>
                    </div>
                </div>
                {{-- <fieldset class="form-group row">
                    <legend class="col-form-legend col-sm-2">Group name</legend>
                    <div class="col-sm-10">

                    </div>
                </fieldset> --}}
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Save</button>
                        @if (!isset($book_detail))
                            <button type="reset" class="btn btn-danger">Reset</button>
                        @else
                            <button type="reset" class="btn btn-danger" onclick="location.href = '{{ route('book') }}'">Back</button>
                        @endif
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-7 mx-auto">
        {{ session('status') }}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-10 mx-auto table-responsive">

        <table class="table table-striped table-inverse">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date Published</th>
                    <th>Number of Pages</th>
                    <th>Book Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)

                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->date_published }}</td>
                        <td>{{ $book->number_pages }}</td>
                        <td>{{ $book->book_type }}</td>
                        <td>
                            <div>
                                <a name="Edit Record" class="btn btn-primary" href="{{ route('edit_book', ['id'=>$book->id]) }}" role="button">Edit</a>
                                <a name="Delete Record" class="btn btn-danger" href="{{ route('delete_book', ['id'=>$book->id]) }}" role="button"> X </a>
                            </div>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
