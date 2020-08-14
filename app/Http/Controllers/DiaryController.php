<?php

namespace App\Http\Controllers;

use App\Diary;
use App\User;
// 今このフォルダ使う
use App\Http\Requests\CreateDiary; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DiaryController extends Controller
{
    public function index(){
        $diaries=Diary::all();
        $diaries=Diary::orderBy('id','desc')->get();

        // $diary= User::find(1)->diaries;
        // dd($diary);
        // $username=Diary::find(1)->user->name;
        // dd($username);
        $currentUser= Auth::user()->diaries;
         dd($currentUser);

        return view('diaries.index',['diaries' => $diaries]);
    }

    public function create()
    {
        // views/diaries/create.blade.phpを表示する
        return view('diaries.create');
    }

    public function store(CreateDiary $request)
{
    $diary = new Diary(); //Diaryモデルをインスタンス化

    $diary->title = $request->title; //画面で入力されたタイトルを代入
    $diary->body = $request->body;
    $diary->user_id = Auth::user()->id;  //画面で入力された本文を代入
    $diary->save(); //DBに保存

    return redirect()->route('diary.index'); //一覧ページにリダイレクト
}

    public function destroy(int $id)
    {
        $diary=Diary::find($id);
        $diary->delete();

        return redirect()->route('diary.index');
    }

    public function edit(int $id){
        $diary =Diary::find($id);

        return view('diaries.edit', ['diary'=>$diary,]);
    }
// 編集を行うidをモッてきている
    public function update(int $id, CreateDiary $request)
   {
    $diary = Diary::find($id);



    $diary->title = $request->title; //画面で入力されたタイトルを代入
    $diary->body = $request->body; 
    //画面で入力された本文を代入
    $diary->save(); //DBに保存

    return redirect()->route('diary.index'); //一覧ページにリダイレクト
    }
}


