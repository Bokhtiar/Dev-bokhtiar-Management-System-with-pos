<?php 
namespace App\Traits\Network;

use App\Models\Visitor;

trait VisitorNetwork
{
    /* list of resource */
    public function VisitorList(){
        return Visitor::latest()->get();
    }

    /* store resource database field */
    public function ResourceStoreVisitor($request, $visitor=null){
        return array(
            'name' => $request->name,
            'user_id' => $request->user_id,
            'description' => $request->description,
        );
    }

    /* store resource */
    public function VisitorStore($request){
        return Visitor::create($this->ResourceStoreVisitor($request));
    }

    /* show single resource  */
    public function VisitorFindById($id){
        return Visitor::find($id);
    }

    /* specific update resource */
    public function VisitorUpdate($request, $id){
        $visitor = Visitor::find($id);
        return $visitor->update($this->ResourceStoreVisitor($request, $visitor));
    }
    

}