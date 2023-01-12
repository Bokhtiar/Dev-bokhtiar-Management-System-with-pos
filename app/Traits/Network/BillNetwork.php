<?php
namespace App\Traits\Network;

use App\Models\BedAssign;
use App\Models\Bill;

trait BillNetwork
{
    /**list of resource*/
    public function BillList()
    {
        return Bill::latest()->get(['bill_id', 'bed_assign_id', 'month', 'advence_charge', 'year', 'status']);
    }

    /**store resource database field*/
    public function ResourceStoreBill($request, $product = null)
    {
        $bed_assign_id = BedAssign::find($request->bed_assign_id);

        return $a = array(
            'user_id' => $bed_assign_id->user_id,
            'bed_assign_id' => $request->bed_assign_id,
            'year' => $request->year,
            'month' => $request->month,
            'advence_charge' => $request->advence_charge,
            'bill_charge' => $request->bill_charge,
            'bill_body' => $request->bill_body,
        );

    }

    /**store resource */
    public function BillStore($request)
    {
        return Bill::create($this->ResourceStoreBill($request));
    }

    /**single resource show */
    public function BillFindById($bill_id)
    {
        return Bill::find($bill_id);
    }

    /**resource update */
    public function BillUpdate($request, $bill_id)
    {
        $bill = Bill::find($bill_id);
        return $bill->update($this->ResourceStoreBill($request, $bill));
    }

}
