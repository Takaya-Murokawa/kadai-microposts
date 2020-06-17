<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

use App\Micropost;

class UsersController extends Controller
{
    //
    public function index()
    {
        // ユーザ一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10);

        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    
     public function show($id)
    {
        // idの値でユーザを検索して取得 自分の
        $user = User::findOrFail($id);
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        // print($user);

        // ユーザの投稿一覧を作成日時の降順で取得
        $microposts = $user->timeline()->orderBy('created_at', 'desc')->paginate(10);
        // orderBy('created_at', 'desc')
       
        // $favorites = $user->favorites()->paginate(10);
        // $microposts = array_merge_recursive($microposts,$favorites);
        
        
        // print(is_object($microposts));
         
        
        // $timeline = array_merge($microposts, $favorites);
        
        // $timeline = $timeline->orderBy('created_at', 'desc')->paginate(10);
        
        
        // $microposts = $favorites->$microposts->orderBy('created_at', 'desc')->paginate(10);
        // ユーザのファボー一覧を取得
        // $microposts = $user->favorites()->paginate(10);


        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
            'microposts' => $microposts,
            // 'micropost' => $favorites,
            // 'timeline' => $timeline,
            
        ]);
        
    }
    
    
    
    /**
     * ユーザのフォロー一覧ページを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function followings($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロー一覧を取得
        $followings = $user->followings()->paginate(10);

        // フォロー一覧ビューでそれらを表示
        return view('users.followings', [
            'user' => $user,
            'users' => $followings,
        ]);
    }

    /**
     * ユーザのフォロワー一覧ページを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function followers($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロワー一覧を取得
        $followers = $user->followers()->paginate(10);

        // フォロワー一覧ビューでそれらを表示
        return view('users.followers', [
            'user' => $user,
            'users' => $followers,
        ]);
    }
    
    public function favorites($id){
        $user = User::findOrFail($id);//自分のユーザIdかも？
        
        $microposts = User::findOrFail($id);//一覧所得なのでUserでおk
         
         // 関係するモデルの件数をロード
        $microposts->loadRelationshipCounts();
        
        // ユーザのファボー一覧を取得
        $favorite = $microposts->favorites()->orderBy('created_at', 'desc')->paginate(10);
        
        // ファボ一覧ビューでそれらを表示
        return view('users.favorites', [
            'user' => $user,
            // 'micropost' => $microposts,
            'microposts' => $favorite,
        ]);
    }
}
