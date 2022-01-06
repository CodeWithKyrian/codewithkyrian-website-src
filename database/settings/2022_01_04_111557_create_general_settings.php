<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'CodeWithKyrian');
        $this->migrator->add('general.email', 'kyrianobikwelu@gmail.com');
        $this->migrator->add('general.phone_numbers', ['09076463437', '09068766859']);
        $this->migrator->add('general.twitter_url', 'https://twitter.com/CodeWithKyrian');
        $this->migrator->add('general.linkedin_url', 'https://linkedin.com/kyrian-obikwelu');
        $this->migrator->add('general.github_url', 'https://github.com/CodeWithKyrian');
        $this->migrator->add('general.youtube_channel', 'https://youtube.com/CodeWithKyrian');
    }
}
