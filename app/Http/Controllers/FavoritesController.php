<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    //
    /**
     * 投稿をファボするアクション。
     *
     * @param  $id  投稿のid
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        // 認証済みユーザ（閲覧者）が、 idの投稿をファボする　　$micropostId
        \Auth::user()->favorite($id);
        // 前のURLへリダイレクトさせる
        return back();
        // return redirect('/');
    }

    /**
     * 投稿をアンファボするアクション。
     *
     * @param  $id  投稿のid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 認証済みユーザ（閲覧者）が、 idのユーザをアンフォローする
        \Auth::user()->unfavorite($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    // public function favorite($id){
    //     $user = User::findOrFail($id);//自分のユーザIdかも？
        
    //     $micropost = Micropost::findOrFail($id);
         
    //      // 関係するモデルの件数をロード
    //     $micropost->loadRelationshipCounts();
        
    //     // ユーザのフォロー一覧を取得
    //     $favorites = $user->favorites()->paginate(10);
        
    //     // フォロー一覧ビューでそれらを表示
    //     return view('users.favorites', [
    //         'user' => $user,
    //         'micropost' => $micropost,
    //         'microposts' => $favorites,
    //     ]);
    // }
}
