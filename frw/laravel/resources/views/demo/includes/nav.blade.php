            <div class="col-sm-2 sidebar">
                <ul class="nav nav-sidebar">
@foreach($menuEntries as $filename => $title)
                    <li @if($filename == 'laravel/') class="active" @endif ><a href="{{ $menuSubdir }}{{ $filename }}">{{ $title }}</a></li>
@endforeach
                </ul>
            </div>
