<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of welcome
 *
 * @author Asip Hamdi
 * Github : axxpxmd
 */

namespace App\Http\Controllers\Profiles;

use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

// Model
use App\User;
use App\Models\Comment;
use App\Models\Articles;

class ProfileController extends Controller
{
    protected $view = 'pages.profiles.';
    protected $path = '/images/ava/';

    public function index()
    {
        $user    = User::where('id', Auth::user()->id)->first();
        $articleUser = Articles::with(['category', 'sub_category', 'user'])->where('author_id', Auth::user()->id)->with('user')->orderBy('views', 'DESC')->paginate(10);
        $comment = Comment::where('user_id', Auth::user()->id)->with('article')->get();
        $countArticle = Articles::with(['category', 'sub_category', 'user'])->where('author_id', Auth::user()->id)->count();

        return view($this->view . 'profile', compact(
            'articleUser',
            'comment',
            'user',
            'countArticle'
        ));
    }

    public function edit()
    {
        $user = User::where('id', Auth::user()->id)->first();

        return view($this->view . 'edit', compact(
            'user'
        ));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:users,name,' . $request->id,
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50'
        ]);

        // Request Data
        $id   = $request->id;
        $name = $request->name;
        $first_name = $request->first_name;
        $last_name  = $request->last_name;
        $facebook   = $request->facebook;
        $twitter    = $request->twitter;
        $instagram  = $request->instagram;
        $birth_date = $request->birth_date;
        $no_telp = $request->no_telp;
        $gender  = $request->gender;
        $photo   = $request->photo;

        $user    = User::find($id);

        if ($photo != null) {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            ]);

            // Saved Photo to Storage
            $file     = $request->file('photo');
            $fileName = time() . "." . $file->getClientOriginalName();
            $request->file('photo')->storeAs($this->path, $fileName, 'ftp', 'public');

            // Delete old Photo from Storage
            $exist = $user->photo;
            Storage::disk('ftp')->delete($this->path . $exist);

            $user->update([
                'name' => $name,
                'name_slug' => str_slug($name),
                'first_name' => $first_name,
                'last_name'  => $last_name,
                'photo'      => $fileName,
                'facebook'   => $facebook,
                'twitter'    => $twitter,
                'instagram'  => $instagram,
                'birth_date' => $birth_date,
                'no_telp' => $no_telp,
                'gender'  => $gender
            ]);
        } else {
            $user->update([
                'name' => $name,
                'name_slug' => str_slug($name),
                'first_name' => $first_name,
                'last_name'  => $last_name,
                'facebook'   => $facebook,
                'twitter'    => $twitter,
                'instagram'  => $instagram,
                'birth_date' => $birth_date,
                'no_telp' => $no_telp,
                'gender'  => $gender
            ]);
        }

        return redirect()
            ->route('profil.edit')
            ->withSuccess('Selamat! Data berhasil diperbaharui.');
    }
}
