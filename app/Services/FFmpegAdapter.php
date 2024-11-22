<?php

namespace App\Services;


use Illuminate\Support\Facades\Storage;
use  \FFMpeg\FFMpeg;
use \FFMpeg\FFProbe;
use \FFMpeg\Coordinate\TimeCode;

class FFmpegAdapter
{


    private $path;

    public function __construct(string $path)
    {

        $this->path = $path;

        $this->ffmpeg = FFMpeg::create();
        $this->ffprobe = FFProbe::create();

        $this->Video_probe = $this->ffprobe->format(Storage::path($path));
        $this->video = $this->ffmpeg->open(Storage::path($path));
    }

    public function getduration()
    {
         return  (int)  $this->Video_probe->get('duration');
    }

    public function getFrame()
    {

      $frame =   $this->video->frame(TimeCode::fromSeconds(1));
      $fileName  = pathinfo($this->path, PATHINFO_FILENAME) . '.jpg';
      $storage_path  =storage_path('/app/public/' .  $fileName);
      $frame->save($storage_path);

      return $fileName;



    }
}
