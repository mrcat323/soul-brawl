<?php

namespace App\Orchid\Screens\NewsLetter;

use App\Models\NewsLetter;
use App\Orchid\Layouts\NewsLetter\NewsLetterLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class NewsLetterScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $news = NewsLetter::paginate();
        return [
            'news_letter' => $news,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'News Letter';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Add')
                ->route('platform.newsletter.add'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            NewsLetterLayout::class,
        ];
    }
}
