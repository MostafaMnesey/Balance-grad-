<?php

namespace App\Http\Controllers\Api\Auth;

use App\ApiResponse\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\DoctorResource;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PatientResource;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{

        /*============================================== Patient  Register ============================================= */
        public function patientRegister(Request $request)
        {

                if (User::where('email', $request['email'])->exists()) {
                        return Response::SendResponse(
                                400,
                                'Email already exists',
                                null
                        );
                } else {

                        $validatedData = $request->validate([
                                'name' => 'required|max:55',
                                'email' => 'email|required|unique:users',
                                'password' => 'required',
                                'adress' => 'required',
                                'gender' => 'required|in:male,female',
                                'date_of_birth' => 'required|date_format:Y-m-d',
                        ]);


                        $validatedData['password'] = bcrypt($request->password);


                        if ($request->route()->getName() == 'patients.register') {



                                $user = User::create(
                                        [
                                                'name' => $validatedData['name'],
                                                'email' => $validatedData['email'],
                                                'password' => $validatedData['password'],
                                                'type' => 'patient',
                                        ]
                                );


                                $user = Patient::create(
                                        [
                                                'adress' => $validatedData['adress'],
                                                'user_id' => $user->id,
                                                'gender' => $validatedData['gender'],
                                                'date_of_birth' => $validatedData['date_of_birth'],
                                        ]

                                );


                                $token = $user->createToken('PatientRegisterToken')->plainTextToken;
                                return response()->json([
                                        'message' => 'User created successfully',
                                        'access_token' => $token,
                                        'token_type' => 'Bearer'
                                ]);
                        }
                }
        }
        /*========================================== Patient Login ================================== */
        public function patientlogin(Request $request)
        {


                if ($request->route()->getName() == 'patients.login') {

                        $validatedData = $request->validate([
                                'email' => 'email|required',
                                'password' => 'required',
                        ]);
                        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                                $user = Auth::user();
                                $token = $user->createToken('PatientLoginToken')->plainTextToken;
                                $data = [
                                        $user,
                                        $user->patient,
                                        $token
                                ];
                                return Response::SendResponse(
                                        200,
                                        'User logged in successfully',
                                        new PatientResource($data)


                                );
                        } else {
                                return Response::SendResponse(
                                        400,
                                        'Email or password is incorrect',
                                        null
                                );







                        }





                }
        }
        /*========================================== Patient Logout =================================== */
        public function patientlogout(Request $request)
        {


                if ($request->route()->getName() == 'patients.logout') {
                        $request->user()->currentAccessToken()->delete();
                        return Response::SendResponse(
                                200,
                                'User logged out successfully',
                                null
                        );
                }
        }
        /*========================================== Doctor Login =================================== */
        public function doctorLogin(Request $request)
        {

                if ($request->route()->getName() == 'doctors.login') {
                        $validatedData = $request->validate([
                                'email' => 'email|required',
                                'password' => 'required',
                        ]);
                        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                                $user = Auth::user();
                                $token = $user->createToken('DoctorLoginToken')->plainTextToken;
                                $data = [
                                        $user,
                                        $user->doctor,
                                        $token
                                ];

                                return Response::SendResponse(
                                        200,
                                        'User logged in successfully',
                                        new DoctorResource($data)
                                );
                        } else {
                                return Response::SendResponse(
                                        400,
                                        'Email or password is incorrect',
                                        null
                                );
                        }
                }
        }
        /*========================================== Doctor Logout =================================== */
        public function doctorLogout(Request $request)
        {

               if ($request->route()->getName() == 'doctors.logout') {
                        $request->user()->currentAccessToken()->delete();
                        return Response::SendResponse(
                                200,
                                'User logged out successfully',
                                null
                        );
                        
                }

        }
}
