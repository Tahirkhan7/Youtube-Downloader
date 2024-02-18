<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use YouTube\YouTubeDownloader;
use YouTube\Exception\YouTubeException;

class DownloaderController extends Controller
{
    public function download(Request $request)
    {
        $youtube = new YouTubeDownloader();
        $videoUrl = $request->input('link');
        // dd($videoUrl);exit;

        try {
            $downloadOptions = $youtube->getDownloadLinks($videoUrl);

            if (!empty($downloadOptions) && $downloadOptions->getAllFormats()) {
                // Get the first format available (you might want to add logic to select the desired format)
                $downloadUrl = $downloadOptions->getFirstCombinedFormat()->url;

                // Extract the filename from the URL
                $filename = basename(parse_url($downloadUrl, PHP_URL_PATH));

                // Get the file extension from the Content-Type header
                $fileExtension = $this->getExtensionFromContentType($downloadUrl);

                // Append the extension to the filename
                $filenameWithExtension = $filename . '.' . $fileExtension;

                // Download the file
                $file = file_get_contents($downloadUrl);
                // Return a file download response
                return response()->make($file, 200, [
                    'Content-Type' => 'application/octet-stream',
                    'Content-Disposition' => 'attachment; filename="' . $filenameWithExtension . '"',
                ]);
                Session::flash('success', 'Video downloaded successfully.');
                return redirect()->back();

            } else {
                Session::flash('error', 'No download links available for the provided video URL!');
            }
        } catch (YouTubeException $e) {
            Session::flash('error', 'Invalid URL passed!' . $e->getMessage());
        }
        return redirect()->back();
    }

    private function getExtensionFromContentType($url)
    {
        $headers = get_headers($url, 1);
        $contentType = $headers['Content-Type'];

        // Extract the MIME type from the Content-Type header
        $mimeParts = explode(';', $contentType);
        $mimeType = $mimeParts[0];

        // Map MIME types to file extensions
        $extensions = [
            'video/mp4' => 'mp4',
            'video/webm' => 'webm',
            // Add more MIME types and their corresponding extensions as needed
        ];

        // Return the corresponding extension or 'unknown' if not found
        return $extensions[$mimeType] ?? 'unknown';
    }
}