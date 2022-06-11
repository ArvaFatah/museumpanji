<table>
  <thead>
    <tr>
      <th colspan="9" height="25" align="center" valign="middle" style="background-color: #E5FBB8;"><b>Laporan Pemesanan Kendaraan {{ explode(' ', $startdate)[0].' - '.explode(' ', $enddate)[0] }}</b></th>
    </tr>
    <tr>
      <th width="3" style="background-color: #E5FBB8;"><b>No</b></th>
      <th width="20" style="background-color: #E5FBB8;"><b>Kendaraan</b></th>
      <th width="20" style="background-color: #E5FBB8;"><b>Pengemudi</b></th>
      <th width="20" style="background-color: #E5FBB8;"><b>Penangan</b></th>
      <th width="20" style="background-color: #E5FBB8;"><b>Tanggal Peminjaman</b></th>
      <th width="20" style="background-color: #E5FBB8;"><b>Penyetuju</b></th>
      <th width="20" style="background-color: #E5FBB8;"><b>Status Penyetuju</b></th>
      <th width="20" style="background-color: #E5FBB8;"><b>Tanggal Persetujuan</b></th>
      <th width="20" style="background-color: #E5FBB8;"><b>Status Pemesanan</b></th>
    </tr>
  </thead>
  <tbody>
    @forelse($bookings as $booking)
    @php
      $approvals = $booking->approval
    @endphp
    <tr>
      <td rowspan="{{ $booking->approval_count }}">{{ $loop->iteration }}</td>
      <td rowspan="{{ $booking->approval_count }}">{{ $booking->name_vehicle }}</td>
      <td rowspan="{{ $booking->approval_count }}">{{ $booking->name_driver }}</td>
      <td rowspan="{{ $booking->approval_count }}">{{ $booking->name_admin }}</td>
      <td rowspan="{{ $booking->approval_count }}">{{ $booking->created_at }}</td>
      <td>{{ $approvals[0]->name_approver }}</td>
      <td>
        @if($approvals[0]->status == 0)
          Menunggu
        @elseif($approvals[0]->status == 1)
          Terkirim
        @elseif($approvals[0]->status == 2)
          Disetujui
        @elseif($approvals[0]->status == 3)
          Ditolak
        @endif
      </td>
      <td rowspan="{{ $booking->approval_count }}">{{ $booking->updated_at }}</td>
      <td rowspan="{{ $booking->approval_count }}">
        @if($booking->status == 0)
          Menunggu
        @elseif($booking->status == 1)
          Disetujui
        @elseif($booking->status == 2)
          Ditolak
        @endif
      </td>
    </tr>
    @foreach($approvals as $key => $approval)
      @if($key != 0)
        <tr>
          <td>{{ $approval->name_approver }}</td>
          <td>
            @if($approval->status == 0)
              Menunggu
            @elseif($approval->status == 1)
              Terkirim
            @elseif($approval->status == 2)
              Disetujui
            @elseif($approval->status == 3)
              Ditolak
            @endif
          </td>
        </tr>
      @endif
    @endforeach
    @empty
    <tr>
      <td colspan="9">No matching records found</td>
    </tr>
    @endforelse
  </tbody>
</table>