<?php

namespace App\Http\Controllers;
use App\Models\Element;
use Illuminate\Http\Request;
class MakeElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->guest() || auth()->user()->role != 'admin'){
            abort(\Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN);
        }
        //shows database
        $element = Element::latest();
        if (request('searchElementData')){
            $element->where('elementname', 'like', '%' . request('searchElementData') . '%')
                ->orWhere('elementtype', 'like', '%' . request('searchElementData') . '%')
                ->orWhere('elementlore', 'like', '%' . request('searchElementData') . '%');
        }
        return view('Element.elementsData', ['element' => $element->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Element.make-elements');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'elementname' => 'required||max:255',
            'elementtype' => 'required||max:255',
            'elementimg' => 'required',
            'elementlore' => 'required',
        ]);
        $element = new Element();
        $element->elementname = $request->input('elementname');
        $element->elementtype = $request->input('elementtype');
        $element->elementimg = $request->file('elementimg')->storePublicly('elementImages','public');
        $element->elementimg = str_replace('elementImages', '', $element->elementimg);
        $element->elementlore = $request->input('elementlore');
        $element->save();
        return redirect()->back()->with('status','Element Added Successfully');
    }

    public function getElements ()
    {
        //search bar function
        $element = Element::latest();
        if (request('searchElements')){
            $element->where('elementname', 'like', '%' . request('searchElements') . '%')
                ->orWhere('elementtype', 'like', '%' . request('searchElements') . '%')
                ->orWhere('elementlore', 'like', '%' . request('searchElements') . '%');
        }
        //shows weapons view
        return view('Element.elements', ['element' => $element->get()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show()
//    {
//        $element = Element::all();
//        return view('Element.elements', compact('element'));
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->guest() || auth()->user()->role != 'admin'){
            abort(\Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN);
        }

        $element = Element::find($id);
        return view('Element.edit-elements', compact('element'));
    }

    public function search(Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(auth()->guest() || auth()->user()->role != 'admin'){
            abort(\Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN);
        }

        $request->validate([
            'elementname' => 'required||max:255',
            'elementtype' => 'required||max:255',
            'elementimg' => 'required',
            'elementlore' => 'required',
        ]);

        $element = Element::find($id);
        $element->elementname = $request->input('elementname');
        $element->elementtype = $request->input('elementtype');
        $element->elementimg = $request->file('elementimg')->storePublicly('elementImages','public');
        $element->elementimg = str_replace('elementImages', '', $element->elementimg);
        $element->elementlore = $request->input('elementlore');
        $element->update();

        return redirect()->back()->with('status','Element Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Element::find($id);
        $element->delete();
        return redirect()->back()->with('status','Element Deleted Successfully');
    }
}

