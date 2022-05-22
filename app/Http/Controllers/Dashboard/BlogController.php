<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Blog;
use Auth;
use Storage;
class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $blogs = Blog::where(['user_id' => Auth::id()])->get();
        return view('dashboard.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog = new Blog;
        return view('dashboard.form', compact('blog'));
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
          'blog_name' => 'required|unique:blogs,blog_name,'.$request->id,
          'blog_description' => 'required|unique:blogs,blog_description,'.$request->id,
          'blog_image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if($request->file('blog_image')) {
          $file = $request->file('blog_image');
          $fileName = time() . '.' . $file->extension();
          $path = 'blog/' . $fileName;
          Storage::putFileAs('public/blog', $file, $fileName);
        }

        Blog::updateOrCreate(['id' => $request->id], [
            'user_id' => Auth::id(),
            'blog_name' => $request->blog_name,
            'blog_description' => $request->blog_description,
            'blog_image' => $path,
        ]);

        return redirect()->route('blog-list')->with('success', 'Blog saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = new Blog;
        $blog = $data->where([ 'id' => $id, 'user_id' => Auth::id() ])->firstOrFail();
        $blogs = $data->where(['user_id' => Auth::id() ])->whereNotIn('id', [$id])->paginate(5);
        return view('dashboard.blog-details', compact('blog', 'blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::where([ 'id' => $id, 'user_id' => Auth::id() ])->firstOrFail();
        return view('dashboard.form', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = new User;
        $userDetails = $user->where('id', Auth::id())->first();

        if ($request->isMethod('post')) {

          $request->validate([
            'user_profile' => 'required',
          ]);

          $file = $request->file('user_profile');
          $fileName = time() . '.' . $file->extension();
          $path = 'profile/' . $fileName;
          Storage::putFileAs('public/profile', $file, $fileName);
          $userDetails->update(['user_profile' => $path]);
          return redirect()->route('user-profile')->with('success', 'Profile uploaded successfully.');
        }

        return view('dashboard.profile', compact('userDetails'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::where([ 'id' => $id, 'user_id' => Auth::id() ])->firstOrFail();
        $blog->delete();
        return back();
    }
}
