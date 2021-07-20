<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\Permission;

class PermissionsChild extends Component
{
    protected $listeners = [
        'showDeleteForm',
        'showCreateForm',
        'showEditForm',
    ];
    public $confirmingItemDeletion = false;
    public $confirmingItemCreation = false;
    public $confirmingItemEdition = false;
    public $primaryKey;
    public $item;
    public $message ='';
    public $parent = 'admin.users.permissions';

    protected $rules = [
        'item.group' => '',
        'item.title' => 'required'
    ];

    public function render()
    {
        return view('livewire.admin.users.permissions-child');
    }
    public function showDeleteForm($id)
    {
        $this->primaryKey = $id;
        $this->dispatchBrowserEvent('modal', ['modal'=>'deleteForm', 'action'=>'show']);
    }

    public function deleteItem()
    {
        Permission::destroy($this->primaryKey);
        $this->dispatchBrowserEvent('modal', ['modal'=>'deleteForm', 'action'=>'hide']);
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Deleted']);
        $this->emitTo($this->parent, 'refresh');
    }

    public function showEditForm(Permission $item)
    {
        $this->resetErrorBag();
        $this->item = $item;
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
        Permission::create([
            'group' => $this->item['group'],
            'title' => $this->item['title']
        ]);
        $this->dispatchBrowserEvent('modal', ['modal'=>'createForm', 'action'=>'hide']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Created']);
        $this->emitTo($this->parent, 'refresh');
    }
}
