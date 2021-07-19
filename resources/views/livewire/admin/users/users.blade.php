<div class="mt-2">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">{{ __('Users') }}</div>
                <div class="col-md-1">+</div>
                <div class="col-md-1">
                    <x-page-size/>
                </div>
                <div class="col-md-4 text-end">
                    <input type="text" class="form-control form-control-sm" wire:model.debounce.300ms="searchTerm" placeholder="Search" aria-label="Search"/>
                </div>
            </div>

        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>{{ __('Name') }} <x-icon-sort sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc" /></th>
                    <th>{{ __('Email') }} <x-icon-sort sortField="email" :sort-by="$sortBy" :sort-asc="$sortAsc" /></th>
                    <th>{{ __('Verified') }}</th>
                    <th>{{ __('Role') }}</th>
                    <th class="col-1">{{ __('Action') }}</th>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->email_verified_at }}</td>
                            <td>
                                @foreach ($item->roles as $role )
                                    <span>{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td class="text-end">
                                <div class="dropstart" role="group">
                                    <a href="#" class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                      <x-icon-three-dots-vertical/>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" component='user-manager.users-child' id="{{ $item->id }}">Edit</a></li>
                                        <li><a class="dropdown-item" href="#"component='user-manager.users-child' id="{{ $item->id }}">Delete</a></li>
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
</div>
