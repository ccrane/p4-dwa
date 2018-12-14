<div class='text-left'>
    <form method='GET'>
        {{ csrf_field() }}
        <label for='lst-page-size'>Page Size</label>
        <select id='lst-page-size' name='perPageSize' onchange='$(this).closest("form").submit()'>
            <option value='15' {{ $perPageSize == 15 ? 'selected' : '' }}>15</option>
            <option value='25' {{ $perPageSize == 25 ? 'selected' : '' }}>25</option>
            <option value='50' {{ $perPageSize == 50 ? 'selected' : '' }}>50</option>
            <option value='100' {{ $perPageSize == 100 ? 'selected' : '' }}>100</option>
        </select>
    </form>
</div>
