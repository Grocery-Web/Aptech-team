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
            
        $invoice = Invoice::find($id);
        $invoiceDetails = InvoiceDetail::where('invoice_id', $invoice->id)->get();
        $prevStatus = $invoice->status;  // $prevStatus aka previous status
        

        // update quantity in stock 
        if ($status == "Approved" and $prevStatus != "Approved") {
            // check if stock quantity is enough or not
            foreach ($invoiceDetails as $invoiceDetail) {
                $product = Product::where('id', $invoiceDetail->product_id)->first();
                if ($product->quantity < $invoiceDetail->product_quantity) {
                    $invoice->status = "Not approved yet";
                    $invoice->save();
                    return redirect()->route("editInvoiceForm", ['id' => $id])->withFail('Failed! Please try again.');
                } 
            }
            $invoice->update($arrayToUpdate);
            // in case stock quantity is enough
            foreach ($invoiceDetails as $invoiceDetail) {
                $product = Product::where('id', $invoiceDetail->product_id)->first();
                $product->quantity -= $invoiceDetail->product_quantity;
                $product->save();
            }
            return redirect()->route("editInvoiceForm", ['id' => $id])->withSuccess("Updated invoice's information successfully! ");

        } elseif ($prevStatus != "Not approved yet" and $status == "Cancelled") {
            foreach ($invoiceDetails as $invoiceDetail) {
                $product = Product::where('id', $invoiceDetail->product_id)->first();
                $product->quantity += $invoiceDetail->product_quantity;
                $product->save();
            }
            $invoice->update($arrayToUpdate);
            return redirect()->route("editInvoiceForm", ['id' => $id])->withSuccess("Updated invoice's information successfully! ");
        } elseif ($prevStatus == "Not approved yet" and $status == "Cancelled" ) {
            $invoice->update($arrayToUpdate);
            return redirect()->route("editInvoiceForm", ['id' => $id])->withSuccess("Updated invoice's information successfully! ");
        } elseif ($prevStatus == $status) {
            $invoice->update($arrayToUpdate);
            return redirect()->route("editInvoiceForm", ['id' => $id])->withSuccess("Updated invoice's information successfully! ");
        } else {
            $invoice->update($arrayToUpdate);
            return redirect()->route("editInvoiceForm", ['id' => $id])->withSuccess("Updated invoice's information successfully! ");
        }

    }

    public function removeInvoice($id) {
        $invoice = Invoice::find($id);
        $invoice->delete();
        return redirect()->route('adminDisplayInvoices');
    }


}
