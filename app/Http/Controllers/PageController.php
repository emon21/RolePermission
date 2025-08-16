<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMessage;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->paginate(10);
        return view('backend.pages.page.index', compact('pages'));
    }

    public function create()
    {
        return view('backend.pages.page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
        ]);

        Page::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->pageContent,
        ]);

        // flash()->addSuccess('Page Created Successfully!','Page Created');

        // Flash Notification Helper Function Using...
        FlashMessage::AddMessage('success', 'Page Created Successfully!', 'Page Created', ['option'=> 5000,'position'=> 'top-right']);
        
        return redirect()->route('pages.index');
    }

    public function edit(Page $page)
    {
        return view('backend.pages.page.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
        ]);

        $page->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->pageContent,
        ]);

        return redirect()->route('pages.index')->with('info', 'Page Updated Successfully!');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return back()->with('error', 'Page Deleted Successfully!');
    }
}
