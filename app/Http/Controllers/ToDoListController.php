<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToDoListRequest;
use App\Models\Dolist;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function show($id)
    {
        $data = Dolist::findOrFail($id);
        $data->delete();
        $mes = ( 'Record Delete Successfully.' );
        return redirect(route('home'))->with('success', $mes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.form',[
            'id' => $id,
            'doList' => $this->getViewParams($id),
            'action' => route('doList.update',0)
        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(ToDoListRequest $toDoListRequest, $id)
    {
        $data = $toDoListRequest->except('_token','_method');
        $data['deadline'] = (new DateTime($data['deadline']))->format('U');
        $data['task'] = trim(ucfirst(strtolower($data['task'])));
        $data['user_id'] = auth()->user()['id'];
        $mes = ($id > 0 ? 'Record Added Successfully.' : 'Record Updated Successfully.');
        return $this->updateData($id, $data, $mes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {


    }
    private function getViewParams($id = 0)
    {
        $data =  new Dolist ();
        if ($id > 0) {
            $data = Dolist::findOrFail($id);
        }

        return $data;
    }
    private function updateData($id, $data, $mes){
        $result = Dolist::updateOrCreate(['id' => $id], $data);
        return redirect(route('home'))->with('success', $mes);
    }
}
