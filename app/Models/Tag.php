<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  /**
   * Use Laravel's factory system to easily create fake Tag data for testing or seeding.
   * (Example: Tag::factory()->create();)
   */
  use HasFactory;

  /**
   * Define the relationship between Tag and Job models.
   *
   * Each Tag can belong to many Jobs, and each Job can have many Tags.
   * This creates a many-to-many relationship.
   *
   * Laravel will look for a pivot table named `job_tag` by default.
   * You can override the table name if your pivot table is named differently.
   *
   * Example usage:
   *   $tag = Tag::find(1);
   *   $jobs = $tag->jobs;  // returns all jobs with this tag
   */
  public function jobs()
  {
    return $this->belongsToMany(Job::class, 'job_tag');
  }
}
