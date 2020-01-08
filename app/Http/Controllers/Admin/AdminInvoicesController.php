<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Invoice;
use App\InvoiceDetail;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminInvoicesController extends Controller
{
    public function index() {
        $invoices = Invoice::all();
        return view("invoice.displayInvoices", ['invoices' => $invoices]);
    }

    public function displayInvoiceDetails($id) {
        $invoice = Invoice::find($id);
        $invoiceDetails = InvoiceDetail::where('invoice_id', $invoice->id)->get();
        $user = User::find($invoice->user_id);
        return view("invoice.displayInvoiceDetails", ['invoice' => $invoice, 'invoiceDetails' => $invoiceDetails, 'user' => $user]);
    }

    public function editInvoiceForm($id) {
        $invoice = Invoice::find($id);
        return view('invoice.editInvoiceForm', ['invoice' => $invoice]);
    }

    public function updateInvoice(Request $request, $id) {
        $shipping_address  =  $request->input('shipping_address');
        $status            =  $request->input('status');
        $phone             =  $request->input('receiver_phone');
        $name              =  $request->input('receiver_name');

        $arrayToUpdate = array(
            "receiver_name" => $name,
            "receiver_phone" => $phone,
            "shipping_address" => $shipping_address, 
            "status" => $status
        );
        
        $updated = DB::table('invoices')->where('id', $id)->update($arrayToUpdate);

        if($updated){
            if ($status == "Cancelled") {
                $invoice = Invoice::find($id);
                $invoiceDetails = InvoiceDetail::where('invoice_id', $invoice->id)->get();
                foreach ($invoiceDetails as $invoiceDetail) {
                    $product = Product::where('id', $invoiceDetail->product_id)->first();
                    $product->quantity += $invoiceDetail->product_quantity;
                    $product->save();
                }
            }
            return redirect()->route("editInvoiceForm", ['id' => $id])->withSuccess("Updated invoice's information successfully! ");
        } else{
            return redirect()->route("editInvoiceForm", ['id' => $id])->withFail('Failed! Please try again.');
        }
    }

    public function removeInvoice($id) {
        $invoice = Invoice::find($id);
        $invoiceDetails = InvoiceDetail::where('invoice_id', $invoice->id)->get();
        foreach ($invoiceDetails as $invoiceDetail) {
            $product = Product::where('id', $invoiceDetail->product_id)->first();
            $product->quantity += $invoiceDetail->product_quantity;
            $product->save();
        }
        $invoice->delete();
        return redirect()->back();
    }


}
