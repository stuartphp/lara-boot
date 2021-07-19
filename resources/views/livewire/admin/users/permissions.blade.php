<div class="mt-2">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Permissions</div>
                <div class="col-md-1">
                    <a href="#" wire:click="$emitTo('admin.users.permissions-child', 'showCreateForm')"><span class="fs-5">+</span></a>
                </div>
                <div class="col-md-1"><x-page-size/></div>
                <div class="col-md-4">
                    <input type="text" class="form-control form-control-sm" wire:model.debounce.300ms="searchTerm" placeholder="Search" aria-label="Search"/>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th><a href="#" wire:click="sortBy('group')">
Group<x-icon-sort sortField='group' :sort-by="$sortBy" :sort-asc="$sortAsc"/>
                        </a>
                            </th>
                        <th><a href="#" wire:click="sortBy('title')">
                            Title<x-icon-sort sortField='title' :sort-by="$sortBy" :sort-asc="$sortAsc"/>
                        </a>
                            </th>
                        <th class="col-1 text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $item->group }}</td>
                            <td>{{ $item->title }}</td>
                            <td class="text-end">
                                <div class="dropstart" role="group">
                                    <a href="#" class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                      <x-icon-three-dots-vertical/>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" wire:click="$emitTo('admin.users.permissions-child', 'showEditForm', {{ $item->id }})">Edit</a></li>
                                        <li><a class="dropdown-item" href="#" wire:click="$emitTo('admin.users.permissions-child', 'showDeleteForm',  {{$item->id}});">Delete</a></li>
                                    </ul>
                                  </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3">No Records Found</td></tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr><td colspan="3">
                        <div class="mt-1 justify-content-end">
                        {{ $data->links() }}
                        </div>

                        </td></tr>
                </tfoot>
            </table>
        </div>
    </div>
    @livewire('admin.users.permissions-child')
</div>
