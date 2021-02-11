<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Posting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostingController extends Controller
{

    public function index()
    {
        $posting = Posting::all();
        return response()->json($posting);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'      => 'required|string',
            'harga'     => 'required|integer',
            'deskripsi' => 'required|string',
            'kondisi'   => 'in:baru, bekas',
            'lokasi'    => 'required|string',
            'picturePath' => 'required|image|max:2048',
        ]);

        if ($validator->fails()) {
            // return response()->json($validator->errors(), 400);
            return ResponseFormatter::error(['error' => $validator->errors()], 'Posting is Fails', 401);
        }

        // if ($request->file('picturePath')->isValid()) {
        //     $file = $request->file->store('assets/user', 'public');
        // }

        // store your file into db
        // $user = Auth::user();
        // $user->picturePath = $file;
        // $user->update();

        $data = $request->all();

        $data['picturePath'] = $request->file('picturePath')->store('assets/posting', 'public');

        $posting = Posting::create($data);

        return ResponseFormatter::success([$data], 'File Successfully uploaded!');

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Successfully!',
        //     'data'    => $posting
        // ]);
    }


    public function show($id)
    {
        $posting = Posting::find($id);
        return response()->json($posting);
    }

    public function update(Request $request, $id)
    {
        $posting = Posting::find($id);
        if (!$posting) {
            return response()->json([
                'message' => 'Post not found!'
            ], 400);
        }

        $validator = Validator::make($request->all(), [
            'nama'      => 'required|string',
            'harga'     => 'required|integer',
            'deskripsi' => 'required|string',
            'kondisi'   => 'in:baru, bekas',
            'lokasi'    => 'required|string',
            'picturePath'     => 'string',
        ]);

        $data = $request->all();
        $posting->fill($data);
        $posting->save();

        return response()->json([
            'success'   => true,
            'message'   => 'Successfully',
            'data'      => $posting
        ]);
    }

    public function destroy($id)
    {
        $post = Posting::find($id);
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found!'
            ], 400);
        }

        $post->delete();
        return response()->json([
            'message' => 'Post has been deleted!'
        ], 200);
    }

    public function updateProfile(Request $request)
    {
        $data = $request->all();

        $user = Auth::user();
        $user->update($data);
    }

    public function updatePhoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|max:2048',
        ]);

        if($validator->fails()) {
            return ResponseFormatter::error(['error' => $validator->errors()], 'Update photo fails', 401);
        }

        if($request->file('file')) {
            $file = $request->file->store('assets/user', 'public');
        }

        // store your file into db
        $user = Auth::user();
        $user->picturePath = $file;
        $user->update();

        return ResponseFormatter::success([$file], 'File Successfully uploaded!');
    }
}
