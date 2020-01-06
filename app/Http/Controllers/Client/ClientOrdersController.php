<?php

namespace App\Http\Controllers\Client;

use App\User;
use App\Product;
use App\Invoice;
use App\InvoiceDetail;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientOrdersController extends Controller
{
    public function showOrderList($id) {
        $invoices = Invoice::where('user_id', $id)->get();
        return view('client.orderManagement', ['invoices' => $invoices]);
    }

    public function checkOrder($id, $invoice_id) {
        $user             = User::find($id);
        $invoice          = Invoice::find($invoice_id);
        $parentCategories = Category::where('parent_id',NULL)->get();

        if ($invoice) {
            $invoiceDetails = InvoiceDetail::where('invoice_id', $invoice->id)->get();
            $products = collect([]);
            foreach ($invoiceDetails as $invoiceDetail) {
                $product = Product::where('id', $invoiceDetail->product_id)->first();
                $products->push($product);
            }
   
            return view("client.orderDetail", ['invoice' => $invoice, 'invoiceDetails' => $invoiceDetails, 'products' => $products, 'parentCategories' => $parentCategories]);
        } else {
            return view("client.orderDetail", ['invoice' => null, 'invoiceDetails' => null, 'parentCategories' => $parentCategories]);
        }      
    }

    public function cancelOrder($id, $order_id) {
        $invoice = Invoice::find($order_id);
        $parentCategories = Category::where('parent_id',NULL)->get();
        $invoiceDetails = InvoiceDetail::where('invoice_id', $invoice->id)->get();
            foreach ($invoiceDetails as $invoiceDetail) {
                $product = Product::where('id', $invoiceDetail->product_id)->first();
                $product->quantity += $invoiceDetail->product_quantity;
                $product->save();
            }

        $cancelled = $invoice->delete();
        // check if payment was successful
        if($cancelled){
            return redirect()->route("showOrderList", ['id' => $id])->withSuccess('Your order was cancelled!');
        } else{
            return redirect()->route("showOrderList", ['id' => $id])->withFail('Failed! Please try again.');
        }

    }
}
