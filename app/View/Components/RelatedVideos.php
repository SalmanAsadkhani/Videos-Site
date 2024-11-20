<?php

namespace App\View\Components;

use App\Models\Video;
use Illuminate\View\Component;

class RelatedVideos extends Component
{
    public $videos;
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Video $video)
    {
       $this->id =  $video->id;

        $this->videos = $video->relatedVideos(10);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.related-videos'  );
    }
}
