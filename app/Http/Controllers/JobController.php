<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
  /**
   * Display a listing of the resource.
   */

  public function index()
  {
    // Featured jobs
    $featuredJobs = Job::latest()
      ->with(['employer', 'tags'])
      ->where('featured', 1)
      ->get();

    // Regular jobs
    $jobs = Job::latest()
      ->with(['employer', 'tags'])
      ->where('featured', 0)
      ->get();

    return view('Jobs.index', [
      'jobs' => $jobs,
      'featuredJobs' => $featuredJobs,
      'tags' => Tag::all(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
    return view('Jobs.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //validate
    $attributes = $request->validate([
      'title' => ['required'],
      'salary' => ['required'],
      'location' => ['required'],
      'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
      'url' => ['required', 'active_url'],
      'tags' => ['nullable'],
    ]);

    $attributes['featured'] = $request->has('featured');

    $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

    if ($attributes['tags'] ?? false) {
      foreach (explode(',', $attributes['tags']) as $tag) {
        $job->tag($tag);
      }
    }
    return redirect('/');
  }

  /**
   * Display the specified resource.
   */
  public function show(Job $job)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Job $job)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateJobRequest $request, Job $job)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Job $job)
  {
    //
  }
}
