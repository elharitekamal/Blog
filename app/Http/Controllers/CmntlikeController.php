<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cmntlikes;
use Auth;


class CmntlikeController extends Controller
{
    public function cmntlike(Request $request, $idcmnt)
    {
        $user = Auth::user();
        $like = new Cmntlikes();
        $like->user_id = $user->id;
        $id_post = $request->id_post;
        $like->id_cmnt = $idcmnt;
        $like->save();
        return redirect('/comments/' . $id_post);
    }



    public function cmntdislike(Request $request, $id)
    {
        $user = Auth::user();
        $like = Cmntlikes::where('user_id', $user->id)->where('id_cmnt', $id);
        $id_post = $request->id_post;
        $like->delete();

        return redirect('/comments/' . $id_post);
    }
}