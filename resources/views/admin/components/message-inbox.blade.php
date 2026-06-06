<div class="admin-panel" id="messages-sec">
    <div class="admin-panel-head">
        <div class="admin-panel-title">
            <span class="admin-panel-icon"><i class="bi bi-envelope"></i></span>
            <div>
                <h5>Inbox Messages</h5>
                <p>Contact form submissions from users</p>
            </div>
        </div>
        @if($new_messages_count > 0)
            <span class="admin-alert-new">{{ $new_messages_count }} New</span>
        @endif
    </div>
    <div class="admin-panel-body">
        <div class="table-responsive">
            <table class="table admin-table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Sender</th>
                        <th>Message</th>
                        <th class="text-center pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                    <tr id="message-row-{{ $message->id }}"
                        class="view-message-trigger {{ $message->is_read == 0 ? 'admin-row-unread' : '' }}"
                        data-id="{{ $message->id }}"
                        data-name="{{ $message->name }}"
                        data-email="{{ $message->email }}"
                        data-subject="{{ $message->subject ?? 'General Inquiry' }}"
                        data-message="{{ $message->message }}">

                        <td class="ps-4">
                            <div class="fw-semibold d-flex align-items-center">
                                <span>{{ $message->name }}</span>
                                @if($message->is_read == 0)
                                    <span class="badge bg-danger ms-2" id="unread-badge-{{ $message->id }}">NEW</span>
                                @endif
                            </div>
                            <small class="text-muted d-block">{{ $message->email }}</small>
                        </td>
                        <td>
                            <div class="text-truncate text-secondary admin-message-preview">
                                {{ $message->message }}
                            </div>
                        </td>
                        <td class="text-center pe-4" onclick="event.stopPropagation();">
                            <div class="d-inline" id="read-status-box-{{ $message->id }}">
                                @if($message->is_read == 0)
                                <button type="button" class="btn btn-sm btn-outline-primary admin-btn-icon mark-read-btn me-1" data-id="{{ $message->id }}">
                                    <i class="bi bi-check2-circle"></i>
                                </button>
                                @else
                                <span class="text-success small me-2"><i class="bi bi-check-all"></i> Read</span>
                                @endif
                            </div>

                            <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Permanently delete this message?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger admin-btn-icon"><i class="bi bi-trash"></i></button>
                            </form>

                            <form action="{{ route('admin.messages.block', $message->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Block this sender?');">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-secondary admin-btn-icon ms-1"><i class="bi bi-slash-circle"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="admin-empty">No messages received yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
