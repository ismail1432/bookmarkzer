<?php

declare(strict_types=1);

namespace App\Application\DeleteABookmark;

use App\Application\GetABookmark\GetABookmark;
use App\Domain\Repository\BookmarkRepositoryInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class DeleteABookmarkHandler implements MessageHandlerInterface
{
    private BookmarkRepositoryInterface $bookmarkRepository;

    public function __construct(BookmarkRepositoryInterface $bookmarkRepository)
    {
        $this->bookmarkRepository = $bookmarkRepository;
    }

    public function __invoke(DeleteABookmark $message): void
    {
        $this->bookmarkRepository->delete($message->getBookmarkId());
    }
}
