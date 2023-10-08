<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;
use Throwable;

class Media extends BaseMedia
{
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<array-key, string>
     */
    protected $hidden = ['id'];

    /**
     * The attributes that should be cast.
     *
     * @var array<array-key, mixed>
     */
    protected $casts = [
        'manipulations' => 'array',
        'custom_properties' => 'array',
        'responsive_images' => 'array',
        'generated_conversions' => 'array',
        'responsive_images' => 'array',
    ];

    public function getCacheTemporaryUrl()
    {
        $ttl = now()->addWeek();
        $cacheName = 'MEDIA_URL:' . $this->uuid;

        return Cache::remember($cacheName, $ttl, fn () => $this->getMediaSafeUrl($ttl));
    }

    private function getMediaSafeUrl(Carbon $ttl)
    {
        try {
            return $this->getTemporaryUrl($ttl);
        } catch (Throwable $th) {
            return $this->getFullUrl();
        }
    }
}