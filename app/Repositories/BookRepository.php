<?php

namespace App\Repositories;

/**
 * 6-1 ユニットテストの基本
 * Class BookRepository.
 */
class BookRepository
{
    /** @var array $books */
    protected $books = [
        [
            'id' => 1,
            'title' => 'Laravelリファレンス'
        ]
    ];

    /**
     * @return string[]
     */
    public function getReferenceBooks()
    {
        return $this->books;
    }

    /**
     * @param null|int $id
     *
     * @throws \Exception
     * @return null|array
     */
    public function getReferenceBook($id = null)
    {
        if (is_null($id)) {
            throw new \Exception;
        }
        foreach ($this->books as $book) {
            if ($book['id'] === $id) {
                return $book;
            }
        }
        return null;
    }

    /**
     * @param array $params
     * @throws \Exception
     */
    public function setReferenceBook(array $params)
    {
        if (!isset($params['id'], $params['title'])) {
            throw new \Exception;
        }
        $this->books[] = $params;
    }

    /**
     * @return string
     */
    protected function getText()
    {
        return 'Laravel5';
    }
}
