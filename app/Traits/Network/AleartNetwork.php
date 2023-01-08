<?php
namespace App\Traits\Network;

use App\Models\Aleart;
use Intervention\Image\Facades\Image as Image;

trait AleartNetwork
{
    /**list of resource*/
    public function AleartList()
    {
        return Aleart::latest()->get(['aleart_id', 'title', 'body', 'image', 'status']);
    }

    /**store resource database field*/
    public function ResourceAleartStore($request, $alert = null)
    {

        if ($request->hasFile('image')) {
            $image = Image::make($request->file('image'));
            $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
            $destinationPath = public_path('images/products/');
            $image->save($destinationPath . $imageName);

        } else {
            $imageName = $alert->image;
        }

        return array(
            'image' => $imageName,
            'short_des' => $request->short_des,
            'title' => $request->title,
            'body' => $request->body,
        );
    }

    /**store resource */
    public function AleartStore($request)
    {
        return Aleart::create($this->ResourceAleartStore($request));
    }

    /**single resource show */
    public function AleartFindById($id)
    {
        return Aleart::find($id);
    }

    /**resource update */
    public function AleartUpdate($request, $id)
    {

        $aleart = Aleart::find($id);
        return $aleart->update($this->ResourceAleartStore($request, $aleart));
    }

}
