<!-- resources/views/common/errors.blade.php -->

@if (count($infos) > 0)
    <!-- Список информационных сообщений формы -->
    <div class="alert alert-info" role="alert">
        <ul>
            @foreach ($infos->all() as $info)
                <li>{{ $info }}</li>
            @endforeach
        </ul>
    </div>
@endif
