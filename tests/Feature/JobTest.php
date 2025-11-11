<?php

use App\Models\Job;
use App\Models\Tag;
use App\Models\Employer;

it('belongs to an employer', function () {
    $employer = Employer::factory()->create();

    $job = Job::factory()->create([
        'employer_id' => $employer->id,
    ]);

    expect($job->employer->id)->toBe($employer->id);
});

it('can have tags', function () {
    $job = Job::factory()->create();

    $tag = Tag::create(['name' => 'Frontend']);
    $job->tags()->attach($tag);

    expect($job->tags)->toHaveCount(1);
});
