@extends('layouts.peminjam')
@section('content')

<!-- Begin Page Content -->
<!-- Begin Page Content -->

<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
<script src="dist/js/v-minusplusfield.js" type="text/javascript"></script>

    <link href="dist/css/v-minusplusfield.css" rel="stylesheet" />

<div class="container-fluid">
  <div class="scroll-horizontal">

    <!-- Page Heading -->
    <div class="d-sm-relative align-items-center justify-content-between lg-4">
        <h2 class="h3 mb-0 text-gray-800">History</h2>
    </div>
    <div class="card-body">
        <p class="lg-4">History saat melakukan peminjaman.</p>
        <table id="table1" class="table table" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Info</th>
                    <th>Tanggal</th>
                    <th>Status Pengajuan</th>
                    <th>Keterangan</th>
                    <th>Pengembalian</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                  <!--  <td><button class="decrement">-</button><input type="number" class="numberInput" value="1"><button class="increment">+</button></td>-->
                    <td><button type="button" class="btn btn-outline-success checkout-button" data-bs-toggle="modal" data-bs-target="#formHistoryModal">Check</button></td>
                    <td>20-03-2023</td>
                    <td>Pengajuan Anda <strong>Disetujui</strong> oleh Adminstrator</td>
                    <td>Pengajuan peminjaman ruangan sudah diproses, anda sudah bisa memakai ruangan</td>
                    <td><button type="button" class="btn btn-success checkout-button" data-bs-toggle="modal">Pengembalian</button></td>
                </tr>
                <tr>
                    <td>2</td>
                  <!--  <td><button class="decrement" style= "position: fixed; margin-right: 25px;">-</button><input type="text" class="numberInput" value="1" style="transform: scale(0.7); width: 80px; height: 25px;"><button class="increment" style="position: fixed; margin-left: 10px;">+</button></td>-->
                    <td><button type="button" class="btn btn-outline-success checkout-button" data-bs-toggle="modal" data-bs-target="#formHistoryModal">Check</button></td>
                    <td>25-03-2023</td>
                    <td><strong>Maaf. Pengajuan Anda tidak disetujui</strong></td>
                    <td>Disarankan mengajukan ulang kembali</td>
                    <td><button type="button" class="btn btn-success checkout-button" data-bs-toggle="modal">Pengembalian</button></td>

                </tr>
                <tr>
                    <td>3</td>
                  <!--  <td><button class="decrement">-</button><input type="number" class="numberInput" value="1"><button class="increment">+</button></td>-->
                    <td><button type="button" class="btn btn-outline-success checkout-button" data-bs-toggle="modal" data-bs-target="#formHistoryModal">Check</button></td>
                    <td>25-03-2023</td>
                    <td><strong>Maaf. Pengajuan Anda tidak disetujui</strong></td>
                    <td>Disarankan mengajukan ulang kembali</td>
                    <td><button type="button" class="btn btn-success checkout-button" data-bs-toggle="modal">Pengembalian</button></td>

                  <!-- Modal -->
                  <div class="modal fade" id="formHistoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Info History</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><!-- <span aria-hidden="true">×</span>--></button>
                        </div>
                        <div class="modal-body">
                          <div class="sm">
                            <label for="namaRuangan" class="form-label">Nama Ruangan</label>
                              <select class="form-select form-select-sm" id="namaRuangan">
                                  <option value="" selected>*Pilih</option>
                                  <option value="R1">Ruangan 1</option>
                                  <option value="R2">Ruangan 2</option>
                                  <option value="R3">Ruangan 3</option>
                              </select>
                          </div>
                          <div class="sm">
                              <label for="namaPengusul" class="form-label">Nama</label>
                            <input type="text" class="form-control form-control-sm" id="nama">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary">Done</button>
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <style>
                    .modal-header
                    {
                        background-color: #54BBC0;
                        padding:9px 15px;
                        color:#FFF;
                        font-family:Verdana, sans-serif;
                        border-bottom:1px solid #9c9a9a;
                        border-top-left-radius: 7px;
                        border-top-right-radius: 7px;
                     }
                     .modal-body
                     {
                        background-color: #feffff;
                        padding:9px 15px;
                        color:#000;
                        text-align: left;
                        border-left-radius:1px solid #000;
                        font-family:Verdana, sans-serif;
                     }
                    </style>
                </tr>
            </tbody>
        </table>
    </div>
  </div>
</div>

<!-- /.container-fluid -->
    <!-- Modal
    <div class="modal fade" id="formHistoryModal" tabindex="-1" aria-labelledby="formHistoryModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Total Pinjaman</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <p>Barang yang Anda pilih:</p>
            <ul id="daftarBarang"></ul>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="barang1">
            <label class="form-check-label" for="barang1">Barang 1</label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="barang2">
            <label class="form-check-label" for="barang2">Barang 2</label>
            <button class="decrement">-</button>
            <input type="number" class="numberInput" value="1">
            <button class="increment">+</button>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="barang3">
            <label class="form-check-label" for="barang3">Barang 5</label>
            <button class="decrement">-</button>
            <input type="number" class="numberInput" value="1">
            <button class="increment">+</button>
          </div>

            <div class="modal-footer">
              <button type="submit" href="#" class="btn btn-outline-primary" data-bs-dismiss="modal">Kirim!</button>

           <button class="btn btn-primary" id="pesanButton"><i class="bi bi-bell"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>-->

  <style>
    #formHistoryModal .modal-content {
    max-width: 700px;
    }

    #formHistoryModal .modal-body {
    text-align: center;
    }

  </style>

<script>
  var app = new Vue({
  el: '#app',
      data: {
      }
  })
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    const pesanButton = document.getElementById('pesanButton');
    const modalTitle = document.getElementById('exampleModalLabel');
    const daftarBarang = document.getElementById('daftarBarang');

    pesanButton.addEventListener('click', function() {
      // Menghapus konten sebelumnya
      daftarBarang.innerHTML = '';

      // Mendapatkan pilihan barang
      const checkboxes = document.querySelectorAll('.form-check-input');
      checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
          const label = checkbox.nextElementSibling.textContent;
          const jumlah = checkbox.parentNode.querySelector('input[type="number"]').value;
          const listItem = document.createElement('li');
          listItem.textContent = `${label}: ${jumlah} buah`;
          daftarBarang.appendChild(listItem);
        }
      });

      // Mengatur judul modal
      modalTitle.textContent = 'Pesanan Anda';

      // Menampilkan modal
      const modal = new bootstrap.Modal(document.getElementById('myModal'));
      modal.show();
    });

</script>
<script>
// Mendapatkan referensi ke elemen tombol increment dan decrement
const decrementButtons = document.querySelectorAll('.decrement');
const incrementButtons = document.querySelectorAll('.increment');

// Menambahkan ke tombol decrement
decrementButtons.forEach(function(button) {
  button.addEventListener('click', function() {
    const inputElement = button.nextElementSibling;
    let value = parseInt(inputElement.value);
    if (value > 1) {
      value--;
      inputElement.value = value;
    }
  });
});

// Menambahkan ke tombol increment
incrementButtons.forEach(function(button) {
  button.addEventListener('click', function() {
    const inputElement = button.previousElementSibling;
    let value = parseInt(inputElement.value);
    value++;
    inputElement.value = value;
  });
});
</script>


@endsection
