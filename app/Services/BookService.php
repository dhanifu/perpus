<?php 

namespace App\Services;

use App\Repositories\BookRepository;

use Yajra\Datatables\Datatables;

class BookService {

	protected $repo;

	public function __construct(BookRepository $repo)
	{
		$this->repo = $repo;
	}

	public function create(object $request)
	{
		$photo = $this->upload($request->photo);

		$data = collect($request->except('photo'));
		$data = $data->merge([
			'photo' => $photo
		]);

		$this->repo->create($data->all());
	}

	public function update(int $id, object $request)
	{
		$data = collect($request->except('photo'));
		
		if ($request->hasFile('photo')) {
			$photo = $this->upload($request->photo);

			$data = $data->merge([
				'photo' => $photo
			]);
		}

		$this->repo->update($id, $data->all());
	}

	public function upload(object $file): String
	{
		$fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
		$fileName = $fileName.'_'.time().'.'.$file->extension();

		$file->storeAs('public/img', $fileName);

		return $fileName;
	}

	public function getDatatables(): Object
	{
		$datatables = Datatables::of($this->repo->get())
					->addIndexColumn()
					->addColumn('status', function ($book)
					{
						return $book->statusBadge;
					})
					->addColumn('action', function ($book)
					{
						return '
							<a href="'.route('book.show', $book->id).'" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
							<a href="'.route('book.edit', $book->id).'" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
							<button class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i></button>
						';
					})
					->rawColumns(['status', 'action'])
					->make();

		return $datatables;
	}

}
