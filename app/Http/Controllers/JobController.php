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
   * Display a listing of all jobs.
   *
   * This loads:
   * - Featured jobs (featured = 1)
   * - Regular jobs (featured = 0)
   * Each job is loaded with:
   * - employer relationship
   * - tags relationship
   */
  public function index()
  {
    // Fetch the featured jobs first
    $featuredJobs = Job::latest()
      ->with(['employer', 'tags'])   // eager load employer + tags
      ->where('featured', 1)
      ->get();

    // Fetch the non-featured jobs
    $jobs = Job::latest()
      ->with(['employer', 'tags'])
      ->where('featured', 0)
      ->get();

    // Pass all jobs + tags to the index page
    return view('Jobs.index', [
      'jobs' => $jobs,
      'featuredJobs' => $featuredJobs,
      'tags' => Tag::all(),          // used for sidebar/tag filtering
    ]);
  }

  /**
   * Show the "create job" form.
   */
  public function create()
  {
    return view('Jobs.create');
  }

  /**
   * Store a newly created job.
   *
   * Steps:
   * 1. Validate user input
   * 2. Mark job as featured if checkbox is selected
   * 3. Save job under the authenticated employer
   * 4. Attach tags (comma-separated)
   */
  public function store(Request $request)
  {
    // Validate incoming form data
    $attributes = $request->validate([
      'title' => ['required'],
      'salary' => ['required'],
      'location' => ['required'],
      'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
      'url' => ['required', 'active_url'],
      'tags' => ['nullable'],  // List of comma-separated tags
    ]);

    // Checkbox for featured job (true/false)
    $attributes['featured'] = $request->has('featured');

    /**
     * Create the job under
     * Auth::user()->employer
     *
     * This ensures only employers can create jobs.
     *
     * Arr::except removes tags from attributes because
     * tags belong in the pivot table, not the jobs table.
     */
    $job = Auth::user()->employer->jobs()->create(
      Arr::except($attributes, 'tags')
    );

    /**
     * Attach tags to the job.
     *
     * Expected input: "Laravel,React,Remote"
     * explode() turns this into an array of tag names.
     */
    if ($attributes['tags'] ?? false) {
      foreach (explode(',', $attributes['tags']) as $tag) {
        $job->tag($tag);   // Assuming you have a tag() helper in the Job model
      }
    }

    return redirect('/');
  }

  /**
   * Show a single job (not implemented yet).
   */
  public function show(Job $job)
  {
    //
    return view('jobs/show', ['job' => $job]);
  }

  /**
   * Show edit form for a job (not implemented yet).
   */
  public function edit(Job $job)
  {
    //
  }

  /**
   * Update a job (not implemented yet).
   */
  public function update(UpdateJobRequest $request, Job $job)
  {
    //
  }

  /**
   * Delete a job (not implemented yet).
   */
  public function destroy(Job $job)
  {
    //
  }
}
