<?php

namespace Pp\Kistochki\Classes\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Pp\Kistochki\Models\Service;
use System\Models\File;
use Pp\Kistochki\Classes\Api\Resources\ServiceResource;

class Images extends Controller
{
    
    /**
     * Generates and returns a thumbnail path.
     *
     * @param integer $width
     * @param integer $height
     * @param array $options [
     *                  'mode'      => 'auto', // exact|portrait|landscape|auto|fit|crop
     *                  'offset'    => [0, 0],
     *                  'quality'   => 90,
     *                  'sharpen'   => 0,
     *                  'interlace' => false,
     *                  'extension' => 'auto',
     *              ]
     * @return string The URL to the generated thumbnail
     */
    public function crop(Request $request)
    {
        // Items per page
        $url = (string) $request->get('url');
        // Items per page
        $width = (int) $request->get('width');
        // Get limited items
        $height = (int) $request->get('height');
        // Get limited items
        $mode = (string) $request->get('mode', 'auto');
        // Get limited items
        $offset = (array) $request->get('offset', [0,0]);
        // Get limited items
        $quality = (int) $request->get('quality', 100);
        // Get limited items
        $sharpen = (int) $request->get('sharpen', 0);
        // Get limited items
        $interlace = (bool) $request->get('interlace', false);
        // Get limited items
        $extension = (string) $request->get('extension', 'auto');
        // try {
            if(!empty(trim($url)) && $filename = basename($url)) {
                $file = File::where('disk_name', $filename)->firstOrFail();
                $file = $file->getThumb($width, $height, [
                    'mode' => $mode,
                    'offset' => $offset,
                    'quality' => $quality,
                    'sharpen' => $sharpen,
                    'interlace' => $interlace,
                    'extension' => $extension
                ]);
                // dd($file);
                $explode = explode('uploads', $file);
                $path = Storage::path("uploads/{$explode[1]}");

                return response()->file($path);
            }
        // } catch (\Exception $e) {}
        
        return $url;
    }
}
