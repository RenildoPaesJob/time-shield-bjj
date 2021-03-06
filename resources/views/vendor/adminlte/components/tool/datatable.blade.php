{{-- Table --}}

<div class="table-responsive">

    <table id="{{ $id }}" class="{{ 'table table-striped rounded-3' }}" style="border-radius: 10px 10px">
        {{-- Table head --}}
        <thead class="{{ 'table-dark' }}">
            <tr class="text-center">
                @foreach($heads as $th)
                    <th>
                        {{ is_array($th) ? ($th['label'] ?? '') : $th }}
                    </th>
                @endforeach
            </tr>
        </thead>

        {{-- Table body --}}
        <tbody class="col">{{ $slot }}</tbody>

        {{-- Table footer --}}
        @isset($withFooter)
            <tfoot @isset($footerTheme) class="thead-{{ $footerTheme }}" @endisset>
                <tr>
                    @foreach($heads as $th)
                        <th>{{ is_array($th) ? ($th['label'] ?? '') : $th }}</th>
                    @endforeach
                </tr>
            </tfoot>
        @endisset

    </table>

</div>

{{-- Add plugin initialization and configuration code --}}

{{-- @push('js')
    <script>

        $(() => {
            $('#{{ $id }}').DataTable( @json($config) );
        })

    </script>
@endpush --}}

{{-- Add CSS styling --}}

@isset($beautify)
    @push('css')
    <style type="text/css">
        #{{ $id }} tr td,  #{{ $id }} tr th {
            vertical-align: middle;
            text-align: center;
        }
    </style>
    @endpush
@endisset
