<?php

namespace Astrotomic\OpenGraph\Types\Video;

use Astrotomic\OpenGraph\Type;
use DateTime;

class Other extends Type
{
    protected const PREFIX = 'video';

    protected string $type = 'video.other';

    public function actor(string $url, ?string $role = null)
    {
        $this->addProperty(self::PREFIX, 'actor', $url);
        $this->when($role, fn(Movie $movie) => $movie->addProperty(self::PREFIX, 'actor:role', $role));

        return $this;
    }

    public function director(string $url)
    {
        $this->addProperty(self::PREFIX, 'director', $url);

        return $this;
    }

    public function writer(string $url)
    {
        $this->addProperty(self::PREFIX, 'writer', $url);

        return $this;
    }

    public function duration(int $seconds)
    {
        $this->setProperty(self::PREFIX, 'duration', $seconds);

        return $this;
    }

    public function releasedAt(DateTime $releaseDate)
    {
        $this->setProperty(self::PREFIX, 'release_date', $releaseDate->format('Y-m-d'));

        return $this;
    }

    public function tag(string $tag)
    {
        $this->addProperty(self::PREFIX, 'tag', $tag);

        return $this;
    }
}