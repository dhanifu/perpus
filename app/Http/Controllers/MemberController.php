<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Repositories\MemberRepository;
use App\Services\MemberService;
use App\Http\Requests\Member\CreateMemberRequest;
use App\Http\Requests\Member\UpdateMemberRequest;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

class MemberController extends Controller
{
    public function index(): View
    {
        return view('member.index');
    }

    public function datatables(MemberService $member): Object
    {
        return $member->getDatatables();
    }

    public function search(Request $request, MemberRepository $member): Object
    {
        return $member->search($request->name);
    }

    public function create(): View
    {
        return view('member.create');
    }

    public function store(CreateMemberRequest $request): RedirectResponse
    {
        Member::create($request->all());
        return redirect('/member')->with('success', 'Sukses menambahkan Anggota');
    }

    public function edit(Member $member): View
    {
        return view('member.edit', compact('member'));
    }

    public function update(UpdateMemberRequest $request, Member $member): RedirectResponse
    {
        $member->update($request->all());
        return redirect('/member')->with('success', 'Sukse mengedit Agggota');
    }

    public function destroy(Member $member): JsonResponse
    {
        $member->delete();
        return response()->json('Sukses Menghapus Anggota');
    }
}
