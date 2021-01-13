<?php

namespace App\Repositories;

use App\Models\Member;

class MemberRepository {

    protected $member;

    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    public function search(string $name = null): Object
    {
        return $this->member->where('name', 'LIKE', "%$name%");
    }

}