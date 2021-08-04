<?php

declare(strict_types=1);

namespace App\Application\GetABookmark;

use App\Domain\Model\Bookmark;
use App\Domain\Repository\BookmarkRepositoryInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class GetABookmarkHandler implements MessageHandlerInterface
{
    private BookmarkRepositoryInterface $bookmarkRepository;

    public function __construct(BookmarkRepositoryInterface $bookmarkRepository)
    {
        $this->bookmarkRepository = $bookmarkRepository;
    }

    public function __invoke(GetABookmark $message): Bookmark
    {
        return $this->bookmarkRepository->getById($message->getBookmarkId());
    }
}