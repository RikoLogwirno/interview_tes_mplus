<?php
use App\book;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Books CRUD
Route::get('/', function () {

    $book = new book();
    return view('books.index', ['books'=>$book->get()]);

})->name("book");

Route::get('book/{id}', function ($id) {

    $book = new book();
    return view('books.index', ['books'=>$book->get(), 'book_detail'=>$book->find($id)->first()]);

})->name("edit_book");

Route::post('book/post', function (Request $request) {

    $validatedData = $request->validate([
        'title' => 'required',
        'author' => 'required',
    ]);

    $book = new book();
    $book->title = $request->title;
    $book->author = $request->author;
    $book->date_published = $request->date_published;
    $book->number_pages = $request->page_numbers;
    $book->book_type = $request->book_type;
    $book->save();
    return redirect()->route('book')->with('status', 'Success');

})->name("add_book");

Route::post('book/put/{id}', function ($id, Request $request) {

    $book = new book();
    $book_detail = $book->find($id);
    $book_detail->title = $request->title;
    $book_detail->author = $request->author;
    $book_detail->date_published = $request->date_published;
    $book_detail->number_pages = $request->page_numbers;
    $book_detail->book_type = $request->book_type;
    $book_detail->save();
    return redirect()->route('book')->with('status', 'Success');

})->name("update_book");

Route::get('book/delete/{id}', function ($id) {

    $book = new book();
    $book_detail = $book->find($id);
    $book_detail->delete();
    return redirect()->route('book')->with('status', 'Success');

})->name("delete_book");
// END Books CRUD

Route::get('question/{id}', function ($id) {
    switch ($id) {
        case 1:
            return view('question.max_diff');
            break;
        case 2:
            return view('question.prefix_suffix');
            break;
        case 3:
            return view('question.compress');
            break;
        case 4:
            return view('question.binary_gap');
            break;
        case 5:
            return view('question.self_numbers');
            break;

        default:
            return view('question.max_diff');
            break;
    }
})->name('question');
