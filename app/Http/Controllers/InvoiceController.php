<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Invoice;

use App\Tag;

use App\Category;

use App\Http\Requests\CreateInvoiceRequest;

use Illuminate\Support\Facades\Auth;



class InvoiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::with('uploadedBy', 'lastUpdateBy', 'tags.categories')->get();

        return View('invoices.index', compact('invoices') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tagCategories = Category::with('tags')->get();

        $invoice = new Invoice;

        return View('invoices.create', compact('invoice', 'tagCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateInvoiceRequest $request)
    {
        $task = $this->createInvoice($request);

        return redirect('invoices');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return View('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::pluck('name', 'id');

        $invoice = Invoice::findOrFail($id);

        return View('invoices.edit', compact('invoice', 'tags') );    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateInvoiceRequest $request, Invoice $invoice)
    {
        if ($request->hasFile('invoice_file'))
        {
            $filePath = $request->file('invoice_file')->store('invoices');    
        } else {
            $filePath = $invoice->invoice_file;
        }

        $input = $request->all();

        $input['lastUpdateBy'] = Auth::user()->id;
        $input['invoice_file'] = $filePath;

        $invoice->update($input);

        $this->syncTags($invoice, $request->input('tag_list') );

        return redirect('invoices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Invoice::destroy($id);

        return redirect('invoices'); 
    }

    /**
     * download the file for the given invoice
     * @param  int $id Invoice id
     * @return file    
     */
    public function download($id)
    {
        $invoice = Invoice::findOrFail($id);

        $path =  storage_path( 'app/' . $invoice->invoice_file );

        return response()->download( $path, $invoice->invoice_number ) ;
    }

    /**
     * Sync the tags for a invoice
     * @param  Invoice   $invoice    
     * @param  Request $request 
     * @return empty          
     */
    private function syncTags(Invoice $invoice, $tags)
    {
        $invoice->tags()->sync( $tags );
    }


    /**
     * Create a new invoice
     * @param  Request $request 
     * @return Invoice $invoice       
     */
    
    private function createInvoice(Request $request)
    {
        $filePath = $request->file('invoice_file')->store('invoices');

        $invoice = $request->all();

        $invoice['invoice_file'] = $filePath;
        $invoice['uploaded_by'] = Auth::user()->id;
        $invoice['last_update_by'] = Auth::user()->id;

        $invoice = Invoice::create($invoice);

        $this->syncTags($invoice, $request->input('tag_list') );

        return $invoice;
    }




}
