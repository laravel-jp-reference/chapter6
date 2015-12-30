<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Contracts\Hashing\Hasher;

/**
 * リスト6.64：インターフェイスをタイプヒンティングで指定したコントローラの例
 *
 * Class UserController.
 */
class UserController extends Controller
{
    /** @var UserRepositoryInterface */
    protected $user;

    /**
     * @param UserRepositoryInterface $user
     */
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user.index', ['users' => $this->user->all()]);
    }

    /**
     * @param UserRequest $request
     * @param Hasher $hash
     * @return \Illuminate\View\View
     */
    public function store(UserRequest $request, Hasher $hash)
    {
        $this->user->save([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hash->make($request->password),
        ]);
        return view('user.store');
    }
}
