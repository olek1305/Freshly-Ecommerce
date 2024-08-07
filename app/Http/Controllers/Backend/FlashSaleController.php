<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FlashSaleItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\Product;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    public function index(FlashSaleItemDataTable $dataTable)
    {
        $flashSaleDate = FlashSale::first();
        $products = Product::where('is_approved', 1)->where('status', 1)->orderBy('id', 'DESC')->get();

        return $dataTable->render('admin.flash-sale.index', compact('flashSaleDate', 'products'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'end_date' => 'required',
        ]);

        FlashSale::updateOrCreate(
            ['id' => 5],
            ['end_date' => $request->end_date]
        );

        flash('Updated Successfully');

        return redirect()->back();
    }

    public function addProduct(Request $request)
    {
        $request->validate([
           'product' => 'required|unique:flash_sale_items,product_id',
           'show_at_home' => 'required|integer',
           'status' => 'required|integer',
        ], [
            'product.unique' => 'The product is already in flash sale',
        ]);

        $flashSaleDate = FlashSale::first();

        if (!$flashSaleDate) {
            return redirect()->back()->withErrors('No active flash sale end date found.');
        }

        $flashSaleItem = new FlashSaleItem();
        $flashSaleItem->product_id = $request->product;
        $flashSaleItem->flash_sale_id = $flashSaleDate->id;
        $flashSaleItem->show_at_home = $request->show_at_home;
        $flashSaleItem->status = $request->status;
        $flashSaleItem->save();

        flash('Product Added Successfully');

        return redirect()->back();
    }

    public function changeShowAtHomeStatus(Request $request)
    {
        $flashSaleItem = FlashSaleItem::findOrFail($request->id);
        $flashSaleItem->show_at_home = $request->isChecked ? 1 : 0;
        $flashSaleItem->save();

        return response(['message' => 'Status has been updated']);
    }

    public function changeStatus(Request $request)
    {
        $flashSaleItem = FlashSaleItem::findOrFail($request->id);
        $flashSaleItem->status = $request->isChecked  ? 1 : 0;
        $flashSaleItem->save();

        return response(['message' => 'Status has been updated']);
    }

    public function destroy(Request $request)
    {
        $flashSaleItem = FlashSaleItem::findOrFail($request->id);
        $flashSaleItem->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully']);
    }
}
