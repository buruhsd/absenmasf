<?php

namespace App\Http\Livewire;

// use Livewire\Component;
use App\Peserta;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Domains\Auth\Models\User;

class PesertaTable extends TableComponent
{
    // use HtmlComponents;

    public $sortField = 'name';

    /**
     * @var string
     */
    public $status;

    /**
     * @param  string  $status
     */
    public function mount($status = 'active'): void
    {
        $this->status = $status;
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        $query = Peserta::orderBy('id');
        return $query;
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            
            Column::make(__('Name'))
                ->searchable()
                ->sortable(),
            Column::make(__('E-mail'), 'email')
                ->searchable()
                ->sortable(),

            Column::make(__('Perusahaan'), 'nama_perusahaan')
                ->searchable()
                ->sortable(),

            Column::make(__('No hp'), 'no_hp')
                ->searchable()
                ->sortable(),
            
            Column::make(__('Actions'))
                ->view('backend.auth.includes.action', 'peserta'),
        ];
    }
}
