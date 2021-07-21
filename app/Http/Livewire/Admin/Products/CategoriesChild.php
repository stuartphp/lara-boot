<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\ProductCategory;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoriesChild extends Component
{
    protected $listeners = [
        'showDeleteForm',
        'showCreateForm',
        'showEditForm',
    ];

    public $primaryKey=0;
    public $item;


    public $parent = 'admin.products.categories';

    public function rules(){
        return [
            'item.name' => 'required',
            'item.slug' => ['required', Rule::unique('product_categories', 'slug')->ignore($this->primaryKey)],
            'item.parent_id' => 'required',
            'item.is_active' => 'boolean',
        ];
    }


    protected $validationAttributes = [
        'item.name' => 'Name',
        'item.slug' => 'Slug',
        'item.parent_id' => 'Parent',
        'item.is_active' => 'Is Active',
    ];

    public function render()
    {
        return view('livewire.admin.products.categories-child', ['categories'=>$this->getCategories()]);
    }

    public function updated($name, $value)
    {
        if($name == 'item.name')
        {
            $this->item['slug']=Str::slug($value);
        }
    }

    public function showDeleteForm($id)
    {
        $this->primaryKey = $id;
        $this->dispatchBrowserEvent('modal', ['modal'=>'deleteForm', 'action'=>'show']);
    }

    public function deleteItem()
    {
        ProductCategory::destroy($this->primaryKey);
        $this->dispatchBrowserEvent('modal', ['modal'=>'deleteForm', 'action'=>'hide']);
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Deleted']);
        $this->emitTo($this->parent, 'refresh');
    }

    public function showEditForm(ProductCategory $item)
    {
        $this->resetErrorBag();
        $this->item = $item->toArray();
        $this->primaryKey = $item->id;
        $this->dispatchBrowserEvent('modal', ['modal'=>'editForm', 'action'=>'show']);
    }

    public function editItem()
    {
        $this->validate();
        $this->item->save();
        $this->dispatchBrowserEvent('modal', ['modal'=>'editForm', 'action'=>'hide']);
        $this->primaryKey = '';
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Updated']);
        $this->emitTo($this->parent, 'refresh');
    }

    public function showCreateForm()
    {
        $this->resetErrorBag();
        $this->reset(['item']);
        $this->dispatchBrowserEvent('modal', ['modal'=>'createForm', 'action'=>'show']);
    }

    public function createItem()
    {
        $this->validate();
        ProductCategory::create([
            'company_id'=>session()->get('company_id'),
            'name' => $this->item['name'],
            'parent_id' => $this->item['parent_id'],
            'slug' => $this->item['slug'],
            'is_active' => $this->item['is_active'],
        ]);
        $this->dispatchBrowserEvent('modal', ['modal'=>'createForm', 'action'=>'hide']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Created']);
        $this->emitTo($this->parent, 'refresh');
    }

    public function getCategories()
    {
        return ProductCategory::where('company_id', session()->get('company_id'))->orderBy('parent_id')->orderBy('name')->get();
    }

}
