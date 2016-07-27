<?php

namespace ChromaMS\Http\Controllers\Backend;

use ChromaMS\Page;

use Illuminate\Http\Request;

use ChromaMS\Http\Requests;

use Baum\MoveNotPossibleException;

class PagesController extends Controller
{
    protected $pages;

    public function __construct(Page $pages)
    {
        $this->pages = $pages;

        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Shows All Pages of U
        $pages = $this->pages->all();
        return view('backend.pages.index' , compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Page $page)
    {
        //If Pushed Edit Button Fetch Data by ID from DB. elseif pushed create new data returns empty form  
        $templates = $this->getPageTemplates();

        $orderPages = $this->pages->where('hidden' , false)->orderBy('lft' , 'asc')->get();

        return view('backend.pages.form' , compact('page' , 'templates' , 'orderPages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StorePageRequest $request)
    {
        //Inserts New Page to the DB 
        $page = $this->pages->create($request->only('title','uri','name','content','template','hidden' ));

        $this->updatePageOrder($page, $request);

        return redirect(route('backend.pages.index'))->with('status' , 'Page has been created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Shows Choosen page 
        $page = $this->pages->findOrFail($id);

        $templates = $this->getPageTemplates();

        $orderPages = $this->pages->where('hidden' , false)->orderBy('lft' , 'asc')->get();

        return view('backend.pages.form' , compact('page' , 'templates' , 'orderPages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdatePageRequest $request, $id)
    {
         //Update Page Data
        $page = $this->pages->findOrFail($id);

        if ($response = $this->updatePageOrder($page , $request)){
            return $response;
        }

        $page->fill($request->only('title' , 'uri' , 'name' ,'content','template','hidden'))->save();

        return redirect(route('backend.pages.edit', $page->id))->with('status' , 'Page Has Been Updated!');
    }
    public function confirm($id)
    {
        //The Page Which U Going to Delete 
        $page = $this->pages->findOrFail($id);

        return view('backend.pages.confirm' , compact('page'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Deletes Page
        $page = $this->pages->findOrFail($id);

        foreach($page->children as $child){
            $child->makeRoot();
        }


        $page->delete();

        return redirect(route('backend.pages.index'))->with('status' , 'Page Has Been Deleted!');
    }
    protected function getPageTemplates()
    {
        $templates = config('cms.templates');

        return ['' => ''] + array_combine(array_keys($templates), array_keys($templates));
    }
    protected function updatePageOrder(Page $page, Request $request)
    {
        if($request->has('order' , 'orderPage')) {
            try{
                $page->updateOrder($request->input('order'),$request->input('orderPage'));
            }catch(MoveNotPossibleException $e){
                return redirect(route('backend.pages.edit' , $page->id))->withInput()->withErrors([
                    'error' => 'Cannot make a page a child of itself.'

                ]);
            }
        }
    }
}
