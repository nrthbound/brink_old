<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function save($type, $image)
    {

        // WARNING: EVERYTHING BELOW IS UGLY. A. F. shoot me
        // This is just... dirty. Please someone show me a better way!

        if ($type == "thumbnail_large") {
            $thumbnailFilename = $this->generateLargeThumbnail($image);
        } elseif ($type == "thumbnail_small") {
            $thumbnailFilename = $this->generateSmallThumbnail($image);
        }

        $featuredFilename = $this->generateFeaturedImage($image);

        $images = (object) [
            'thumbnail' => "images/thumbnails/{$thumbnailFilename}.jpg",
            'featured' => "images/featured/{$featuredFilename}.jpg"
        ];
        return $images;
    }

    public function generateLargeThumbnail($image)
    {
        $thumbnail = \Image::make($image)->fit(765, 360)->encode('jpg');
        $thumbnailFilename = md5($thumbnail->__toString());
        $thumbnailPath = "images/thumbnails/{$thumbnailFilename}.jpg";
        $thumbnail->save(public_path($thumbnailPath), 90);

        return $thumbnailFilename;
    }

    public function generateSmallThumbnail($image)
    {
        // This is just... dirty. Please someone show me a better way!
        $thumbnail = \Image::make($image)->fit(765, 150)->encode('jpg');
        $thumbnailFilename = md5($thumbnail->__toString());
        $thumbnailPath = "images/thumbnails/{$thumbnailFilename}.jpg";
        $thumbnail->save(public_path($thumbnailPath), 90);

        return $thumbnailFilename;
    }

    public function generateFeaturedImage($image)
    {
        $featured = \Image::make($image)->fit(1200, 400)->encode('jpg');
        $featuredFilename = md5($featured->__toString());
        $featuredPath = "images/featured/{$featuredFilename}.jpg";
        $featured->save(public_path($featuredPath), 90);

        return $featuredFilename;
    }

}
