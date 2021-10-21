<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Picture;
use App\Models\UserRight;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PicturesPolicy
{
    use HandlesAuthorization;

    const MODAL_NAME = 'picture';

    public function __construct() {}

    /**
     * Create a new policy instance.
     *
     * @return void
     */

    private function checkRight(User $user, String $right) {
        return UserRight::where('user_id', $user->id)
        ->where('right', $right)
        ->where('model', self::MODAL_NAME)
        ->exists();
    }

    public function update(User $user) {
        return $this->checkRight($user, 'update');
    }

    public function view(User $user) {
        return $this->checkRight($user, 'view');
    }

    public function add(User $user) {
       return $this->checkRight($user, 'add');
   }
   
   public function delete(User $user) {
       return $this->checkRight($user, 'delete');
   }
}
