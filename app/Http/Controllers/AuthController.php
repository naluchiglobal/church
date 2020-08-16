<?php

namespace App\Http\Controllers;

use App\Donate;
use App\Event;
use App\Http\Resources\DonateResource;
use App\Http\Resources\EventResource;
use Illuminate\Http\Request;
use App\Http\Resources\PrayerRequestResource;
use App\PrayerRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
        /**
     * Get a JWT via given credentials.
     *
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

        /**
     * Register a new user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = auth()->login($user);

        return $this->respondWithToken($token);

    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60000,
            'status'    => 'success',
            'user' => Auth::user()
        ]);
    }

    //update profile
    public function update(Request $request, User $user)
    {
        if ($request->filled('password')) {
            $request->merge([
                'password' => bcrypt($request->input('password'))
            ]);
        }

        $user->update($request->only(['email', 'password', 'name']));

        return response()->json($user, 200);
    }

    //fetch users
    public function index(){
        return response()->json(User::get(), 200);
    }

    //find current user
    public function getAuthUser(Request $request)
    {
        return response()->json(auth()->user());
    }
    //show all users
    public function show(User $user)
    {
        return response()->json($user,200);
    }

    //logout
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out'], 200);
    }

    //add prayer request

    public function PrayerRequest(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:195',
            'phone' => 'required|min:5',
            'email' => 'required|email',
            'address' => 'required|string',
            'body' => 'required|string'
        ]);

        $prayer = PrayerRequest::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'body' => $request->body,
        ]);

        return response()->json([
            "message" => "Prayer Request Created succesfully"
        ], 201);
    }

    //view events

    public function Events()
    {

        return response()->json(\App\Event::paginate(20));
    }

    public function ViewPrayer()
    {

        return response()->json(\App\PrayerRequest::paginate(20));
    }

    public function FAQ()
    {

        return response()->json(\App\FAQ::orderBy('id', 'desc')->get());
    }

    public function Sermon()
    {

        return response()->json(\App\Sermon::orderBy('id', 'desc')->paginate(30));
    }

    public function Announcement()
    {

        return response()->json(\App\Announcement::orderBy('id', 'desc')->paginate(30));
    }

    public function getStudent($id) {
        if (\App\Sermon::where('id', $id)->exists()) {
            $student = \App\Sermon::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($student, 200);
          } else {
            return response()->json([
              "message" => "Student not found"
            ], 404);
          }
      }



    //make donation

    // public function MakeDonationg(Request $request)
    // {

    //     $ref = str_random(10);
    //     $user = Auth::user();

    //     $donation = Donate::create([
    //         'user_id' => auth()->user()->id,
    //         'name' => $request->name,
    //         'phone' => $request->phone,
    //         'email' => $request->email,
    //         'address' => $request->address,
    //         'purpose' => $request->purpose,
    //         'amount' => $request->amount,
    //         'payment_status' => '1',
    //         'payment_type' => 'card',
    //         'reference' => $ref,
    //         'status' => 'Paid',

    //     ]);

    //     return new DonateResource($donation);
    // }

    public function MakeDonation(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:195',
            'phone' => 'required|min:11',
            'email' => 'required|email',
            'address' => 'required|string'
        ]);

        $ref = str_random(10);
        $user = Auth::user();
        $donation = new Donate();

        $donation->name = $request->name;
        $donation->phone = $request->phone;
        $donation->email = $request->email;
        $donation->address = $request->address;
        $donation->amount = $request->amount;
        $donation->purpose = $request->purpose;
        $donation->status = 'Paid';
        $donation->payment_type = 'Card';
        $donation->reference = $ref;
        $donation->payment_status = 1;


        $or = $user->donates()->save($donation);


        return new DonateResource($donation);

    }



}
