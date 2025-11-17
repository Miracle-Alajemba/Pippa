<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
  //

  public function  __invoke()
  {
    // throw new \Exception('Not implemented');
    // $search = request("");
    $jobs = Job::query()->width(['employer', 'tags'])->where('title', 'LIKE', '%' . request('q') . '%')->get();

    // this place it return the view and the data you keyed in
    return  view('Jobs.results', ['jobs' => $jobs]);
  }
}
