<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Information;
use Illuminate\Http\Request;
use Symfony\Polyfill\Intl\Idn\Info;

class InformationController extends Controller
{

    public function index()
    {
        $info = Information::all();
        return response()->json($info);
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'fname'=>['required','string','max:30'],
            'lname'=>['required','string','max:30'],
            'email'=>['required','email','max:32'],
            'phone'=>['required','regex:/(01)[0-9]{9}/','max:11'],
            'gender'=>['required'],
            'hobbies'=>['required','max:100'],
            'bio'=>['required']
        ]);
        $info = new Information();
        $info->fname = $request->fname;
        $info->lname = $request->lname;
        $info->email = $request->email;
        $info->phone = $request->phone;
        $info->gender = $request->gender;
        $info->hobbies = $request->hobbies;
        $info->hobbies = $request->hobbies;
        $info->bio = $request->bio;
        $info->save();
        return response()->json($info);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json(Information::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'fname'=>['required','string','max:30'],
            'lname'=>['required','string','max:30'],
            'email'=>['required','email','max:32'],
            'phone'=>['required','regex:/(01)[0-9]{9}/','max:11'],
            'gender'=>['required'],
            'hobbies'=>['required','max:100'],
            'bio'=>['required']
        ]);
        $info = Information::findOrFail($id);
        $info->fname = $request->fname;
        $info->lname = $request->lname;
        $info->email = $request->email;
        $info->phone = $request->phone;
        $info->gender = $request->gender;
        $info->hobbies = $request->hobbies;
        $info->hobbies = $request->hobbies;
        $info->bio = $request->bio;
        $info->save();
        return  response()->json($info);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return response()->json(Information::findOrFail($id)->delete());
    }
}
