<div>
    <table class="table">
        <thead>
            <tr>
                <th>No. </th>
                <th>User</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Waktu Peminjaman</th>
                <th>Batas Peminjaman</th>
                <th>Waktu Pengembalian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pinjamlog as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->username }}</td>
                <td>{{ $item->barang->barang }}</td>
                <td>{{ $item->dipinjam }}</td>
                <td>{{ $item->rent_date }}</td>
                <td>{{ $item->return_date }}</td>
                <td>{{ $item->actual_return_date }}</td>
            </tr>                 
            @endforeach
        </tbody>
    </table>
</div>