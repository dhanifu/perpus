<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Loan;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        $totalBook = Book::count();
		$totalMember = Member::count();
        $totalLoan = Loan::count();
        // $activeLoan = $loanRepo->countActive();
		// $loanPerMonth = $loanService->gerPerMonth();
		// $topBook = $loanService->getTopBook();
        
        return view('home', compact(
            'totalBook', 'totalMember', 'totalLoan',
            // 'activeLoan', 'loanPerMonth', 'topBook'
        ));
    }
}
