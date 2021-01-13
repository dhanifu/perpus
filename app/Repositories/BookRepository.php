<?php 

namespace App\Repositories;

use App\Models\Book;

class BookRepository extends Repository {

	public function __construct(Book $book)
	{
		$this->model = $book;
	}

	public function search(string $code = null): Object
	{
		return $this->model->whereStatus(0)->where('code', 'like', '%'.$code.'%')->get(['id', 'code as text', 'title']);
	}

	public function get(): Object
	{
		return $this->model->with('rack:id,name')->latest('title')->get(['id', 'code', 'title', 'status', 'rack_id']);
	}

	public function getOne(int $id): Object
	{
		return $this->model->with('rack:id,name')->findOrFail($id);
	}

	public function getByCode(string $code): Object
	{
		return $this->model->whereCode($code)->firstOrFail();
	}

}
