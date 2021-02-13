<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\CreatePhoneContactAPIRequest;
use App\Http\Requests\API\UpdatePhoneContactAPIRequest;
use App\Models\User;

/**
 * Class PhoneContactAPIController
 * @package App\Http\Controllers\Api
 */
class PhoneContactAPIController extends Controller
{
    /** @var User|null */
    private $user;

    /**
     * PhoneContactAPIController constructor.
     */
    public function __construct()
    {
        $this->middleware('api');
        $this->user = Auth::user();
    }

    public function index()
    {

    }

    public function store(CreatePhoneContactAPIRequest $request)
    {

    }

    public function show()
    {

    }

    public function update(UpdatePhoneContactAPIRequest $request)
    {

    }

    public function destroy()
    {

    }
}
