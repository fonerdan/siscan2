{{-- Navbar notification --}}

<li class="{{ $makeListItemClass() }}" id="{{ $id }}">

    {{-- Link --}}
    <a @if($enableDropdownMode) href="" @endif {{ $attributes->merge($makeAnchorDefaultAttrs()) }}>

        {{-- Icon --}}
        <i class="{{ $makeIconClass() }}"></i>

        {{-- Badge --}}
        <span class="{{ $makeBadgeClass() }}">{{ $badgeLabel }}</span>

    </a>

    {{-- Dropdown Menu --}}
    @if($enableDropdownMode)
    <a data-toggle="dropdown">
        @if (count(auth()->user()->unreadNotifications) == 0)
            <span class="badge badge-danger navbar-badge">0</span>
        @else
            <span class="badge badge-warning navbar-badge">
                @if(count(auth()->user()->unreadNotifications))
                <b style="font-size: 12px;" class="font-weight-bold">
                    {{count(auth()->user()->unreadNotifications)}}
                </b>
                @endif
            </span>
        @endif
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="max-height: 700px; overflow-y: auto;">
            @if (count(auth()->user()->unreadNotifications) > 0)
                <a href="markAllAsRead" class="dropdown-item dropdown-footer bg-primary">Marcar todas como leídas</a>
            @endif
            <span class="dropdown-item dropdown-header bg-gray">Notificaciones no leídas</span>
            <div class="dropdown-divider"></div>
            @forelse (auth()->user()->unreadNotifications as $notification)
                <a href="#" class="dropdown-item">
                    <i class="fas fa-money-bill text-success"></i> {{$notification->data['client']}} - <b>{{$notification->data['amount']}} Bs. {{$notification->data['date']}}</b>
                    <span class="float-right text-muted text-sm">{{$notification->created_at->diffForHumans()}}</span>
                </a>
            @empty
                <span class="dropdown-item dropdown-header">Sin notificaciones no leídas</span>
            @endforelse
            <div class="dropdown-divider"></div>
            <span class="dropdown-item dropdown-header bg-gray">Notificaciones leídas</span>
            @forelse (auth()->user()->readNotifications as $notification)
                <a href="#" class="dropdown-item">
                    <i class="fas fa-check-circle text-muted"></i> {{$notification->data['client']}} - <b>{{$notification->data['amount']}} Bs. {{$notification->data['date']}}</b>
                    <span class="float-right text-muted text-sm">{{$notification->created_at->diffForHumans()}}</span>
                </a>
            @empty
                <span class="dropdown-item dropdown-header">Sin notificaciones leídas</span>
            @endforelse
        </div>
    </a>
    @endif


</li>

{{-- If required, update the notification periodically --}}

@if (! is_null($makeUpdateUrl()) && $makeUpdatePeriod() > 0)
@push('js')
<script>

    $(() => {

        // Method to get new notification data from the configured url.

        let updateNotification = (nLink) =>
        {
            // Make an ajax call to the configured url. The response should be
            // an object with the new data. The supported properties are:
            // 'label', 'label_color', 'icon_color' and 'dropdown'.

            $.ajax({
                url: "{{ $makeUpdateUrl() }}"
            })
            .done((data) => {
                nLink.update(data);
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR, textStatus, errorThrown);
            });
        };

        // First load of the notification data.

        let nLink = new _AdminLTE_NavbarNotification("{{ $id }}");
        updateNotification(nLink);

        // Periodically update the notification.

        setInterval(updateNotification, {{ $makeUpdatePeriod() }}, nLink);
    })

</script>
@endpush
@endif

{{-- Register Javascript utility class for this component --}}

@once
@push('js')
<script>

    class _AdminLTE_NavbarNotification {

        /**
         * Constructor.
         *
         * target: The id of the target notification link.
         */
        constructor(target)
        {
            this.target = target;
        }

        /**
         * Update the notification link.
         *
         * data: An object with the new data.
         */
        update(data)
        {
            // Check if target and data exists.

            let t = $(`li#${this.target}`);

            if (t.length <= 0 || ! data) {
                return;
            }

            let badge = t.find(".navbar-badge");
            let icon = t.find(".nav-link > i");
            let dropdown = t.find(".adminlte-dropdown-content");

            // Update the badge label.

            if (data.label && data.label > 0) {
                badge.html(data.label);
            } else {
                badge.empty();
            }

            // Update the badge color.

            if (data.label_color) {
                badge.removeClass((idx, classes) => {
                    return (classes.match(/(^|\s)badge-\S+/g) || []).join(' ');
                }).addClass(`badge-${data.label_color} badge-pill`);
            }

            // Update the icon color.

            if (data.icon_color) {
                icon.removeClass((idx, classes) => {
                    return (classes.match(/(^|\s)text-\S+/g) || []).join(' ');
                }).addClass(`text-${data.icon_color}`);
            }

            // Update the dropdown content.

            if (data.dropdown && dropdown.length > 0) {
                dropdown.html(data.dropdown);
            }
        }
    }

</script>
@endpush
@endonce
