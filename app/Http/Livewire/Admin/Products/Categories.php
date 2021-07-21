<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductCategory;

class Categories extends Component
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
                ->orWhere('slug', 'like', '%'.$this->searchTerm.'%');
            })
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->pageSize);
        return view('livewire.admin.products.categories', ['data'=>$results,'categories'=>$this->getCategories()]);
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
        return ProductCategory::query();
    }
    public function getCategories()
    {
        return ProductCategory::where('company_id', session()->get('company_id'))->pluck('name', 'id')->toArray();
    }
}
