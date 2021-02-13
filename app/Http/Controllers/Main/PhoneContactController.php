<?php

namespace App\Http\Controllers\Main;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

        return view("main.phone-contact.index", ["contacts" => $collection]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $data = $request->all();

        return view("main.phone-contact.create", ["data" => $data]);
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

        $id = $phoneContact->id;

        return redirect(route("phone-contacts.show", [$id]));
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

        return view("main.phone-contact.show", ["data" => $resource]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $data = $request->all();

        /** @var PhoneContact $phoneContact */
        $phoneContact = PhoneContact::findOrFail($id);

        try {
            $this->validateAccess($phoneContact);
        } catch (\Exception $e) {
            return response()->json(["Message" => $e->getMessage()], 403);
        }

        $phoneContact = new PhoneContactResource($phoneContact);
        $phoneContactArray = $phoneContact->toArray($request);

        $data = array_merge($phoneContactArray, $data);

        return view("main.phone-contact.edit", ["data" => $data]);
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
            return redirect(route("phone-contacts.edit", [$id]));
        }

        return redirect(route("phone-contacts.show", [$id]));
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

        return redirect(route("phone-contacts"));
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
