<div class="card shadow-sm mb-4" id="messages-sec">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="m-0 fw-bold text-dark"><i class="bi bi-envelope me-2"></i>User Message Inbox Logs</h5>
        @if($new_messages_count > 0)
            <span class="badge bg-danger rounded-pill px-3 py-2">
                {{ $new_messages_count }} New Alert(s)
            </span>
        @endif
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Sender Profile</th>
                        <th>Message Details Block</th>
                        <th class="text-center pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                    <tr id="message-row-{{ $message->id }}"
                        class="view-message-trigger {{ $message->is_read == 0 ? 'table-primary fw-bold' : 'text-muted' }}"
                        style="cursor: pointer; transition: background-color 0.2s;"
                        data-id="{{ $message->id }}"
                        data-name="{{ $message->name }}"
                        data-email="{{ $message->email }}"
                        data-subject="{{ $message->subject ?? 'General Inquiry' }}"
                        data-message="{{ $message->message }}">

                        <td class="ps-4">
                            <div class="text-dark d-flex align-items-center">
                                <span>{{ $message->name }}</span>
                                @if($message->is_read == 0)
                                    <span class="badge bg-danger ms-2" id="unread-badge-{{ $message->id }}" style="font-size: 10px;">NEW</span>
                                @endif
                            </div>
                            <small class="text-muted d-block">{{ $message->email }}</small>
                        </td>
                        <td>
                            <div class="text-truncate text-secondary" style="max-width: 400px;">
                                {{ $message->message }}
                            </div>
                        </td>
                        <td class="text-center pe-4" onclick="event.stopPropagation();">
                            <div class="d-inline" id="read-status-box-{{ $message->id }}">
                                @if($message->is_read == 0)
                                <button type="button" class="btn btn-sm btn-outline-primary mark-read-btn me-1" data-id="{{ $message->id }}">
                                    <i class="bi bi-check2-circle"></i>
                                </button>
                                @else
                                <span class="text-success small me-2"><i class="bi bi-check-all fs-5"></i> Read</span>
                                @endif
                            </div>

                            <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Permanently clear this entry from database?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>

                            <form action="{{ route('admin.messages.block', $message->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Block this address and erase histories?');">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-dark ms-1"><i class="bi bi-slash-circle"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="text-center py-4 text-muted">Inbox folder empty. No contact requests received.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
