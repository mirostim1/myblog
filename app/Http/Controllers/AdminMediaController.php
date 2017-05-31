<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminMediaController extends Controller
{
    //
    public function index() {
       $photos = Photo::all();

       return view('admin.media.index', compact('photos'));
    }

    public function create() {
        return view('admin.media.create');

    }

    public function destroy($id) {

        $photo = Photo::findOrFail($id);

        unlink(public_path().$photo->file);

        $photo->delete();

        session(['photo_deleted' => 'Photo has been deleted']);

        return redirect('admin/media');
    }

    public function store(Request $request) {
        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

        $file->move('images', $name);

        Photo::create(['file'=>$name]);

        session(['photo_uploaded' => 'Image has been uploaded']);

        return redirect('admin/media');
    }

    public function deleteMedia(Request $request) {
        if(isset($request->delete_single)){
            $this->destroy($request->photo);
            session(['photo_deleted' => 'Media file has been deleted']);
            return redirect()->back();
        }

        if(isset($request->delete_all) && !empty($request->checkBoxArray)) {
            $photos = Photo::findOrFail($request->checkBoxArray);

            foreach ($photos as $photo) {
                $photo->delete();
            }

            session(['media_deleted' => 'Media files have been deleted']);

            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
