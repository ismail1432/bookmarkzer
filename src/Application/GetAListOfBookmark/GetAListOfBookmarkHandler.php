<?php

declare(strict_types=1);

namespace App\Application\GetAListOfBookmark;

use App\Domain\Repository\BookmarkRepositoryInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class GetAListOfBookmarkHandler implements MessageHandlerInterface
{
    private BookmarkRepositoryInterface $bookmarkRepository;

    public function __construct(BookmarkRepositoryInterface $bookmarkRepository)
    {
        $this->bookmarkRepository = $bookmarkRepository;
    }

    public function __invoke(GetAListOfBookmarkCommand $bookmark)
    {
        return $this->bookmarkRepository->findAll();
    }
}
