<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    public function home()
    {
        return view('pages.home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy('title')
            ->take(10)
            ->get();;
        return view('admin.pages.index', [
            'pages' => $pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'page_content' => 'required'
        ]);

        $page = new Page;
        $page->title = $request->title;
        $page->content = $request->page_content;
        $page->user_id = Auth::id();
        $page->slug = Str::slug($request->title, '-');
        if ($page->save()) {
            return redirect()->action([PageController::class, 'index']);
        } else {
            return back()->withInput()->with('status', 'Failed');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)
            ->select('title', 'content')
            ->firstOrFail();

        //use frontend view here
        return view('pages.show', [
            'page' => $page
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.edit', [
            'page' => $page
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'page_content' => 'required'
        ]);

        $page = Page::findOrFail($id);
        $page->title = $request->title;
        $page->content = $request->page_content;
        if ($page->save()) {
            return redirect()->action([PageController::class, 'index'])->with([
                'status' => 'Success',
                'class' => 'success'
            ]);
        } else {
            return back()->withInput()->with('status', 'Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        if ($page->delete()) {
            return back()->with([
                'status' => 'Page deleted',
                'class' => 'success'
            ]);
        } else {
            return back()->with([
                'status' => 'Page could not be deleted',
                'class' => 'danger'
            ]);
        }
    }
}
