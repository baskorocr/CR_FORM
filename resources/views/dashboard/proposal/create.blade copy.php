@extends('template.dashboard')

@section('breadcrumbs')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>FORM CR</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">FORM CR</li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create CR</h3>
            </div>

            <form action="{{ route('proposal.store') }}" method="POST">
              @csrf
              <div class="card-body">

              <input type="hidden" name="no_transaksi" value="{{ \App\Models\Proposal::generateNoTransaksi() }}">

                <!-- User Request -->
                <div class="form-group">
                  <label for="user_request">User / Request</label>
                  <textarea class="form-control @error('user_request') is-invalid @enderror" name="user_request" rows="3" placeholder="Enter Name">{{ request()->old('user_request') }}</textarea>
                  @error('user_request')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <!-- User Status -->
                <div class="form-group">
                  <label for="user_status">User Status</label>
                  <textarea class="form-control @error('user_status') is-invalid @enderror" name="user_status" rows="3" placeholder="Enter Status">{{ request()->old('user_status') }}</textarea>
                  @error('user_status')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                 <!-- Departement -->
                 <div class="form-group">
                  <label for="departement">Departement</label>
                  <select id="select-state-depart" class="form-control mt-2" name="departement">
                    <option value="">Pilih Departement</option>
                    <option value="IT">IT</option>
                    <option value="PPIC">PPIC</option>
                    <option value="MARKETING">MARKETING</option>
                    <option value="ACCOUNTING">ACCOUNTING</option>
                    <option value="FINANCE">FINANCE</option>
                    <option value="ENGINEERING">ENGINEERING</option>
                    <option value="MAINTENANCE">MAINTENANCE</option>
                    <option value="Other">Other</option>
                  </select>

                  <div id="other-option-depart" style="display: none;">
                    <input type="text" class="form-control mt-2" name="departementother" placeholder="Ketik di sini jika tidak ada pilihan fasilitas..." value="{{ request()->old('departementther') }}">
                  </div>

                  @error('departement')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <!-- Phone -->
                <div class="form-group">
                  <label for="ext_phone">Ext / Phone</label>
                  <textarea class="form-control @error('ext_phone') is-invalid @enderror" name="ext_phone" rows="3" placeholder="Enter Phone">{{ request()->old('ext_phone') }}</textarea>
                  @error('ext_phone')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <!-- Status Barang -->
                <div class="form-group">
                  <label for="status_barang">Status Barang</label>
                  <select id="select-state-barang" class="form-control mt-2" name="status_barang" required>
                    <option value="">Pilih Status Barang</option>
                    <option value="Pembelian">Pembelian</option>
                    <option value="Peminjaman">Peminjaman</option>
                    <option value="Pengembalian">Pengembalian</option>
                  </select>
                  @error('status_barang')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <!-- Fasilitas -->
                <div class="form-group">
                  <label for="facility">Fasilitas</label>
                  <select id="select-state" class="form-control mt-2" name="facility" required>
                    <option value="">Pilih Fasilitas</option>
                  </select>
                  @error('facility')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <!-- User Note -->
                <div class="form-group">
                  <label for="user_note">User Note</label>
                  <textarea class="form-control @error('user_note') is-invalid @enderror" name="user_note" rows="3" placeholder="Enter Note">{{ request()->old('user_note') }}</textarea>
                  @error('user_note')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <!-- User Note
                <div class="form-group">
                  <label for="it_analys">IT Analysis</label>
                  <textarea class="form-control @error('it_analys') is-invalid @enderror" name="it_analys" rows="3" placeholder="Enter Analysis">{{ request()->old('it_analys') }}</textarea>
                  @error('it_analys')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div> -->

                
              </div>
  
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>

    const selectStateDepart = document.getElementById('select-state-depart');
    const otherOptionDepart = document.getElementById('other-option-depart');

    selectStateDepart.addEventListener('change', function() {
      if (this.value === 'Other') {
        otherOptionDepart.style.display = 'block';
      } else {
        otherOptionDepart.style.display = 'none';
        otherOptionDepart.querySelector('input[name="departement"]').value = ''; 
      }
    });

    // Mendapatkan elemen select box
    const statusBarangSelect = document.getElementById('select-state-barang');
    const fasilitasSelect = document.getElementById('select-state');

    // Menambahkan event listener untuk perubahan di select box Status Barang
    statusBarangSelect.addEventListener('change', function() {
      // Menghapus semua option di select box Fasilitas
      fasilitasSelect.innerHTML = '<option value="">Pilih Fasilitas</option>';

      // Menambahkan option berdasarkan pilihan Status Barang
      if (this.value === 'Pembelian') {
        // Tambahkan option untuk Pembelian
        fasilitasSelect.innerHTML += `
          <option value="(Account -> Login)">(Account -> Login)</option>
          <option value="(Account -> Email)">(Account -> Email)</option>
          <option value="(Account -> Internet)">(Account -> Internet)</option>
          <option value="(Software -> Install Software)">(Software -> Install Software)</option>
          <option value="(Software -> Change Request)">(Software -> Change Request)</option>
          <option value="(Software -> New Application)">(Software -> New Application)</option>
          <option value="(Infrastruktur -> PC / TC)">(Infrastruktur -> PC / TC)</option>
          <option value="(Infrastruktur -> Printer / Scanner)">(Infrastruktur -> Printer / Scanner)</option>
          <option value="(Infrastruktur -> Monitor)">(Infrastruktur -> Monitor)</option>
          <option value="(Infrastruktur -> Keyboard / Mouse)">(Infrastruktur -> Keyboard / Mouse)</option>
          <option value="(Infrastruktur -> Lan / Telp)">(Infrastruktur -> Lan / Telp)</option>
        `;
      } else if (this.value === 'Peminjaman') {
        // Tambahkan option untuk Peminjaman
        fasilitasSelect.innerHTML += `
          <option value="(Infrastruktur -> PC / TC)">(Infrastruktur -> PC / TC)</option>
          <option value="(Infrastruktur -> Printer / Scanner)">(Infrastruktur -> Printer / Scanner)</option>
          <option value="(Infrastruktur -> Monitor)">(Infrastruktur -> Monitor)</option>
          <option value="(Infrastruktur -> Keyboard / Mouse)">(Infrastruktur -> Keyboard / Mouse)</option>
          <option value="(Infrastruktur -> Lan / Telp)">(Infrastruktur -> Lan / Telp)</option>
        `;
      } else if (this.value === 'Pengembalian') {
        // Tambahkan option untuk Pengembalian
        fasilitasSelect.innerHTML += `
          <option value="(Infrastruktur -> PC / TC)">(Infrastruktur -> PC / TC)</option>
          <option value="(Infrastruktur -> Printer / Scanner)">(Infrastruktur -> Printer / Scanner)</option>
          <option value="(Infrastruktur -> Monitor)">(Infrastruktur -> Monitor)</option>
          <option value="(Infrastruktur -> Keyboard / Mouse)">(Infrastruktur -> Keyboard / Mouse)</option>
          <option value="(Infrastruktur -> Lan / Telp)">(Infrastruktur -> Lan / Telp)</option>
        `;
      }
    });

  </script> 
@endsection

