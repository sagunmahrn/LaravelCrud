<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(){
        $userData = User::orderBy('id','desc')->paginate(5);
        return view('home',compact('userData'));
    }
    public function addUser(Request $request){
        if($request->isMethod('get')) return redirect()->back();

        if($request->isMethod('post')){
            $this->validate($request,[
                'name'=>'required',
                'username'=>'required|unique:users,username',
                'email'=>'required|email|unique:users,email'

            ]);
            $data['name']= $request->name;
            $data['username']= $request->username;
            $data['email']= $request->email;

            if(User::create($data)){
                return redirect()->route('index')->with('success','User was inserted');

            }


        }


        }
        public function deleteUser(Request $request){
        $id = $request->criteria;
        if(User::findOrFail($id)->delete()){
            return redirect()->route('index')->with('success','user was deleted');
        }
        }
    public function editUser(Request $request){
        $Id = $request->criteria;
        $findData=User::findOrFail($Id);

            return view('edit',compact('findData'));
        }

        public function editUserAction(Request $request){

            if($request->isMethod('get')) return redirect()->back();

            if($request->isMethod('post')){
                $criteria =$request->criteria;
                $this->validate($request,[
                    'name'=>'required',
                    'username'=>'required|',[
                        Rule::unique('users','username')->ignore($criteria)
                        ],
                    'email'=>'required|email|',[
                        Rule::unique('users','email')->ignore($criteria)]

                ]);
                $data['name']= $request->name;
                $data['username']= $request->username;
                $data['email']= $request->email;

                $findData = User::findOrFail($criteria);
                if($findData->update($data)){
                    return redirect()->route('index')->with('success','User was updated');

                }


            }

        }
    }

