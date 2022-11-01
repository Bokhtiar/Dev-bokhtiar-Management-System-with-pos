<?php
namespace App\Traits\Network;

use App\Models\Aleart;
use Illuminate\Support\Str;

trait AleartNetwork
{
    /**list of resource*/
    public function AleartList()
    {
        return Aleart::latest()->get(['aleart_id', 'title', 'body', 'status']);
    }

    /**store resource database field*/
    public function ResourceAleartStore($request)
    {
        return array(
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
        return $aleart->update($this->ResourceAleartStore($request));
    }

}
