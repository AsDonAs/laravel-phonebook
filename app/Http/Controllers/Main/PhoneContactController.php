<?php

namespace App\Http\Controllers\Main;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Http\Requests\Main\CreatePhoneContactRequest;
use App\Http\Requests\Main\UpdatePhoneContactRequest;
use App\Http\Resources\Main\PhoneContactResource;
use App\Models\User;
use App\Models\PhoneContact;

/**
 * Class PhoneContactController
 * @package App\Http\Controllers\Main
 */
class PhoneContactController extends Controller
{
    /** @var User|null */
    private $user;

    /**
     * PhoneContactAPIController constructor.
     */
    public function __construct()
    {
        $this->middleware("auth:web");
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard("web")->user();
            return $next($request);
        });
    }

    /**
     * @return Response
     */
    public function index()
    {
        $userId = $this->user->id ?? null;

        $contacts = PhoneContact::where(["user_id" => $userId])->get();

        $collection = PhoneContactResource::collection($contacts);

        return response()->json($collection, 200);
    }

    /**
     * @param CreatePhoneContactRequest $request
     * @return Response
     */
    public function store(CreatePhoneContactRequest $request)
    {
        $data = $request->only(PhoneContact::fillableParamsForRequests());

        $userId = $this->user->id ?? null;
        $data["user_id"] = $userId;

        /** @var PhoneContact $phoneContact */
        $phoneContact = PhoneContact::create($data);

        $resource = new PhoneContactResource($phoneContact);

        return response()->json($resource, 200);
    }

    /**
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        /** @var PhoneContact $phoneContact */
        $phoneContact = PhoneContact::findOrFail($id);

        try {
            $this->validateAccess($phoneContact);
        } catch (\Exception $e) {
            return response()->json(["Message" => $e->getMessage()], 403);
        }

        $resource = new PhoneContactResource($phoneContact);

        return response()->json($resource, 200);
    }

    /**
     * @param UpdatePhoneContactRequest $request
     * @param $id
     * @return Response
     */
    public function update(UpdatePhoneContactRequest $request, $id)
    {
        $data = $request->only(PhoneContact::fillableParamsForRequests());

        /** @var PhoneContact $phoneContact */
        $phoneContact = PhoneContact::findOrFail($id);

        try {
            $this->validateAccess($phoneContact);
        } catch (\Exception $e) {
            return response()->json(["Message" => $e->getMessage()], 403);
        }

        $status = $phoneContact->update($data);

        if (!$status) {
            return response()->json(["Message" => "Something went wrong."], 404);
        }

        $phoneContact->refresh();

        $resource = new PhoneContactResource($phoneContact);

        return response()->json($resource, 200);
    }

    /**
     * @param $id
     * @return Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var PhoneContact $phoneContact */
        $phoneContact = PhoneContact::findOrFail($id);

        try {
            $this->validateAccess($phoneContact);
        } catch (\Exception $e) {
            return response()->json(["Message" => $e->getMessage()], 403);
        }

        $status = $phoneContact->delete();

        if (!$status) {
            return response()->json(["Message" => "Something went wrong."], 404);
        }

        return response()->json($id, 200);
    }

    /**
     * @param PhoneContact $phoneContact
     * @return void
     * @throws \Exception
     */
    private function validateAccess(PhoneContact $phoneContact)
    {
        $userId = $this->user->id ?? null;

        if ($userId != $phoneContact->user_id) {
            throw new \Exception("You don't have access to this action.");
        }
    }
}
