<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refresh' => '$refresh'];
    public $sortBy = 'name';
    public $searchTerm='';
    public $sortAsc = true;
    public $pageSize = 15;

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }
    public function updatedPageSize()
    {
        $this->resetPage();
    }

    public function render()
    {
        $results = $this->query()
            ->when($this->searchTerm, function($q){
                $q->where('name', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('email', 'like', '%'.$this->searchTerm.'%');
            })
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->pageSize);
        return view('livewire.admin.users.users', ['data'=>$results]);
    }

    public function sortBy($field)
    {
        if ($field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }

    public function query()
    {
        return User::query();
    }
}
