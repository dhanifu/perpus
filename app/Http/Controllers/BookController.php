<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\Book\CreateBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Services\BookService;
use App\Repositories\BookRepository;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{

    protected $service;
    protected $repo;

    public function __construct(BookService $service, BookRepository $repo)
    {
        $this->service = $service;
        $this->repo = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('book.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBookRequest $request): RedirectResponse
    {
        $this->service->create($request);

        return redirect('/book')->with('success', 'Sukses Menambahkan Buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): View
    {
        $book = $this->repo->getOne($id);

        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $book = $this->repo->getOne($id);

        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, int $id)
    {
        $this->service->update($id, $request);

        return redirect('/book')->with('success', 'Sukses Mengedit Buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book): JsonResponse
    {
        $book->delete();

        return response()->json('Sukses Menghapus Buku');
    }

    public function datatables(): Object
    {
        return $this->service->getDatatables();
    }

    public function search(Request $request): Object
    {
        return $this->repo->search($request->code);
    }
}
