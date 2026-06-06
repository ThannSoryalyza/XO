<div class="admin-panel" id="managers-sec">
    <div class="admin-panel-head">
        <div class="admin-panel-title">
            <span class="admin-panel-icon"><i class="bi bi-person-badge"></i></span>
            <div>
                <h5>Management & Staff</h5>
                <p>Coaches and staff behind the squad</p>
            </div>
        </div>
        <button class="btn admin-btn-add" data-bs-toggle="modal" data-bs-target="#createManagerModal"><i class="bi bi-plus-lg"></i> Add Staff</button>
    </div>
    <div class="admin-panel-body">
        <div class="table-responsive">
            <table class="table admin-table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Photo</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th class="text-center pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($managers as $manager)
                    <tr>
                        <td class="ps-4">
                            @if($manager->image)
                                <img src="{{ media_asset($manager->image) }}" alt="{{ $manager->name }}" class="admin-avatar">
                            @else
                                <div class="admin-avatar-fallback">N/A</div>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $manager->name }}</td>
                        <td>{{ $manager->role }}</td>
                        <td class="text-center pe-4">
                            <button class="btn btn-sm btn-outline-primary admin-btn-icon edit-manager-btn me-1" data-id="{{ $manager->id }}" data-name="{{ $manager->name }}" data-role="{{ $manager->role }}"><i class="bi bi-pencil-square"></i></button>
                            <form action="{{ route('admin.managers.destroy', $manager->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Remove staff record permanently?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger admin-btn-icon"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="admin-empty">No management staff registered.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
