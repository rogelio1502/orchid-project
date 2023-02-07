<?php

namespace App\Orchid\Screens;


use Orchid\Screen\Screen;
use App\Models\Order;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use App\Orchid\Screens\TomSelect;
use App\View\Components\LiveSelect;
use App\View\Components\Hello;


class Idea extends Screen
{
    public $message;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'order'  => Order::find(1),
            'orders' => Order::paginate(),
            'message' => 'Idea Screen',
            // 'options' => "demo,demo1"
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->message;
    }

    public function description() : ?string{
        return "Idea Description";
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Go print')->method('print'),
            Link::make('External reference')->href('http://orchid.software'),
            ModalToggle::make('Modal window')
            ->modal('CreateUserModal')
            ->method('action'),
        ];
    }

    public function print(): void
    {
        Toast::warning('Hello, world! This is a toast message.');
    }

    public function action(): void
    {
        Toast::info('Hello, world! This is a toast message.');
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::modal('CreateUserModal', [
                Layout::rows([]),
            ]),
            Layout::rows([



                Select::make('.robot')
                    ->title('Demo Select')
                    ->options([1, 2])
                    ->value(0),

                LiveSelect::make('.robot')
                ->title('Github Repos')->placeholder("Choose one...")
                ->remoteUrl('https://api.github.com/search/repositories?q=')->minToSearch(3)
                ->valueField('url')->labelField('name')->searchField('name'),

                LiveSelect::make('.robot')
                ->title('Vercel API')
                ->placeholder("Choose one...")
                ->remoteUrl('https://node-api-vercel-pi.vercel.app?q=')
                ->minToSearch(3),
                // Hello::make('demo')


            ]),

        ];
    }
}
