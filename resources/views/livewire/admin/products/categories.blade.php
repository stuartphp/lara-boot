<div class="mt-2">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">{{ __('Categories') }}</div>
                <div class="col-md-1">
                    @if (count(array_intersect(session()->get('grant'), ['SU','product_categories_create']))==1)
                    <a href="#" wire:click="$emitTo('admin.products.categories-child', 'showCreateForm')"><span class="fs-5">+</span></a>
                    @endif
                </div>
                <div class="col-md-1">
                    <x-page-size/>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control form-control-sm" wire:model.debounce.300ms="searchTerm" placeholder="Search" aria-label="Search"/>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th><a href="#" wire:click="sortBy('name')">{{ __('Name') }} <x-icon-sort sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc" /></a></th>
                    <th><a href="#" wire:click="sortBy('slug')">{{ __('Slug') }} <x-icon-sort sortField="slug" :sort-by="$sortBy" :sort-asc="$sortAsc" /></a></th>
                    <th>{{ __('Parent') }}</th>
                    <th>{{ __('Is Active') }}</th>
                    <th class="col-1">{{ __('Action') }}</th>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ ($item->parent_id>0) ? $categories[$item->parent_id]: '' }}</td>
                            <td>{{ ($item->is_active==0) ? 'No' : 'Yes' }}</td>
                            <td class="text-end">
                                <div class="dropstart" role="group">
                                    <a href="#" class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                      <x-icon-three-dots-vertical/>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @if (count(array_intersect(session()->get('grant'), ['SU','product_categories_update']))==1)
                                        <li><a class="dropdown-item" href="#" wire:click="$emitTo('admin.products.categories-child', 'showEditForm', {{ $item->id }})">Edit</a></li>
                                        @endif
                                        @if (count(array_intersect(session()->get('grant'), ['SU','product_categories_delete']))==1)
                                        <li><a class="dropdown-item" href="#" wire:click="$emitTo('admin.products.categories-child', 'showDeleteForm',  {{$item->id}});">Delete</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5">No records found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @livewire('admin.products.categories-child')
</div>
