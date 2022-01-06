<?php

namespace App\Models;

use Spatie\LaravelSettings\Settings;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class GeneralSettings extends Settings implements HasMedia
{
    use InteractsWithMedia;

    public string $site_name;
    public string $email;
    public array $phone_numbers;
    public string $twitter_url;
    public string $linkedin_url;
    public string $github_url;
    public string $youtube_channel;

    public bool $site_active;

    public static function group(): string
    {
        return 'general';
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('logo')
            ->singleFile()->withResponsiveImages();
    }
}
