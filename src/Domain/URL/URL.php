<?php declare(strict_types=1);

/**
 * @license  http://opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/nicoSWD
 * @author   Nicolas Oelgart <nico@oelgart.com>
 */
namespace nicoSWD\SecHeaderCheck\Domain\URL;

use nicoSWD\SecHeaderCheck\Domain\Header\HttpHeader;

final class URL
{
    private const SCHEME_HTTPS = 'https';
    private const SCHEME_HTTP = 'http';

    private const ALLOWED_SCHEMES = [
        self::SCHEME_HTTP,
        self::SCHEME_HTTPS,
    ];

    private $url = '';
    private $components = [];

    public function __construct(string $url)
    {
        if (!$this->urlHasScheme($url)) {
            $url = sprintf('http://%s', $url);
        }

        if (!$this->isValid($url)) {
            throw new Exception\InvalidUrlException();
        }

        $this->url = $url;
    }

    public function scheme(): string
    {
        return $this->components['scheme'];
    }

    public function isHttps(): bool
    {
        return $this->scheme() === self::SCHEME_HTTPS;
    }

    public function host(): string
    {
        return $this->components['host'];
    }

    public function path(): string
    {
        return $this->components['path'] ?? '/';
    }

    public function query(): string
    {
        return $this->components['query'] ?? '';
    }

    public function port(): int
    {
        if (empty($this->components['port'])) {
            return $this->scheme() === self::SCHEME_HTTPS ? 443 : 80;
        }

        return (int) $this->components['port'];
    }

    public function redirectTo(HttpHeader $locationHeader): self
    {
        $newLocation = $locationHeader->value();

        if (substr($newLocation, 0, 2) === '//') {
            $newLocation = sprintf('%s:%s', $this->scheme(), $newLocation);
        } elseif ($newLocation[0] === '/') {
            $newLocation = sprintf('%s://%s:%d%s', $this->scheme(), $this->host(), $this->port(), $newLocation);
        } elseif (!preg_match('~^https?://~', $newLocation)) {
            $newLocation = $this->url . $newLocation;
        }

        return new self($newLocation);
    }

    private function isValid(string $url): bool
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return false;
        }

        $components = parse_url($url);

        if (!isset($components['host'], $components['scheme']) || !$this->isAllowedScheme($components['scheme'])) {
            return false;
        }

        $this->components = $components;

        return true;
    }

    private function isAllowedScheme(string $scheme): bool
    {
        return in_array($scheme, self::ALLOWED_SCHEMES, true);
    }

    private function urlHasScheme(string $url): bool
    {
        return preg_match('~^[a-z][a-z\d\-\.]*://~i', $url) === 1;
    }
}
