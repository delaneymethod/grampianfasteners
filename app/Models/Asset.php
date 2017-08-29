<?php

namespace App\Models;

use Spatie\MediaLibrary\Media;

class Asset extends Media
{
	protected $table = 'assets';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'model_id',
		'model_type',
		'collection_name',
		'name',
		'file_name',
		'mime_type',
		'disk',
		'size',
		'order_column',
		'manipulations',
		'custom_properties',
	];
	
	/**
     * Is this asset an audio file?
     *
     * @return bool
     */
    public function isAudio()
    {
        return $this->extensionIsOneOf(['aac', 'flac', 'm4a', 'mp3', 'ogg', 'wav']);
    }

    /**
     * Is this asset a Google Docs previewable file?
     * https://gist.github.com/izazueta/4961650
     *
     * @return bool
     */
    public function isPreviewable()
    {
        return $this->extensionIsOneOf([
            'doc', 'docx', 'pages', 'txt',
            'ai', 'psd', 'eps', 'ps',
            'css', 'html', 'php', 'c', 'cpp', 'h', 'hpp', 'js',
            'ppt', 'pptx',
            'flv',
            'tiff',
            'ttf',
            'dxf', 'xps',
            'zip', 'rar',
            'xls', 'xlsx'
        ]);
    }

    /**
     * Is this asset an image?
     *
     * @return bool
     */
    public function isImage()
    {
        return $this->extensionIsOneOf(['jpg', 'jpeg', 'png', 'gif']);
    }

    /**
     * Is this asset a video file?
     *
     * @return bool
     */
    public function isVideo()
    {
        return $this->extensionIsOneOf(['h264', 'mp4', 'm4v', 'ogv', 'webm']);
    }
    
    /**
     * Check if asset's file extension is one of a given list
     *
     * @return bool
     */
    public function extensionIsOneOf($filetypes = [])
    {
        return (in_array(strtolower($this->extension()), $filetypes));
    }
}
