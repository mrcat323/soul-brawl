<?php

namespace App\Orchid\Screens\NewsLetter;

use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Screen;

class AddNewsLetterScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Add News Letter Screen';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Send')
                ->method('create')];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('title')
                    ->type('text')
                    ->title('Title:'),
                Input::make('description')
                    ->type('text')
                    ->title('Description:'),
            ])];
    }

    public function create(Request $request)
    {
        NewsLetter::create($request->all());

        return redirect()->route('platform.newsletter');
    }
}
