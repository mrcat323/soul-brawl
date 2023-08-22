<?php

namespace App\Orchid\Layouts\NewsLetter;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class NewsLetterLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'news_letter';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id'),
            TD::make('title'),
            TD::make('description'),
        ];
    }
}
