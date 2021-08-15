<?php

declare(strict_types=1);

namespace App\Application\UpdateABookmark;

use App\Domain\EmbedInterface;
use App\Domain\Model\Bookmark;
use App\Domain\Repository\BookmarkRepositoryInterface;
use App\Domain\ValueObject\BookmarkType;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class UpdateABookmarkHandler implements MessageHandlerInterface
{
    private BookmarkRepositoryInterface $bookmarkRepository;
    private EmbedInterface $embed;


    public function __construct(BookmarkRepositoryInterface $bookmarkRepository, EmbedInterface $embed)
    {
        $this->bookmarkRepository = $bookmarkRepository;
        $this->embed = $embed;
    }

    public function __invoke(UpdateABookmarkCommand $command)
    {
        $bookmark = $this->bookmarkRepository->getById($command->getBookmarkId());

        $url = $command->getUrl()->getValue();

        $host = parse_url($url)['host'] ?? '';

        $this->assertSupportedHost($host);
        $link = $this->embed->get($url);

        $bookmarkUpdated = $bookmark->update(
            $link->getTitle(),
            $link->getAuthor(),
            $url,
            $link->getHeight(),
            $link->getWidth(),
            BookmarkType::createFromHost($host)->getValue(),
            $command->getTags(),
            $link->getDuration()
        );
        $this->bookmarkRepository->save($bookmarkUpdated);

        return $bookmarkUpdated;
    }

    private function assertSupportedHost(string $host): void
    {
        if (!in_array($host, Bookmark::SUPPORTED_HOST)) {
            throw new \LogicException('Unsupported Host !');
        }
    }
}