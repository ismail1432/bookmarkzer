<?php

declare(strict_types=1);

namespace App\Application\CreateABookmark;

use App\Domain\EmbedInterface;
use App\Domain\Model\Bookmark;
use App\Domain\Repository\BookmarkRepositoryInterface;
use App\Domain\ValueObject\BookmarkType;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class CreateABookmarkHandler implements MessageHandlerInterface
{
    private BookmarkRepositoryInterface $bookmarkRepository;
    private EmbedInterface $embed;

    public function __construct(BookmarkRepositoryInterface $bookmarkRepository, EmbedInterface $embed)
    {
        $this->bookmarkRepository = $bookmarkRepository;
        $this->embed = $embed;
    }

    public function __invoke(CreateABookmarkCommand $command)
    {
        $url = $command->getUrl()->getValue();

        $host = parse_url($url)['host'] ?? '';

        $this->assertSupportedHost($host);
        $link = $this->embed->get($url);

        $bookmark = Bookmark::create(
            $link->getTitle(),
            $link->getAuthor(),
            $url,
            $link->getWidth(),
            $link->getHeight(),
            BookmarkType::createFromHost($host)->getValue(),
            $command->getTags(),
            $link->getDuration()
        );
        $this->bookmarkRepository->save($bookmark);

        return $bookmark;
    }

    private function assertSupportedHost(string $host): void
    {
        if (!in_array($host, Bookmark::SUPPORTED_HOST)) {
            throw new \LogicException('Unsupported Host !');
        }
    }
}
