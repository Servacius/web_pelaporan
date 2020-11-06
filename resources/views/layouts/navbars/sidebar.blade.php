<div class="sidebar" data-color="danger" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Aplikasi Pelaporan') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
      @if(Auth::user()->account_type_id == 1)
        <a class="nav-link" href="{{ route('admin_home') }}">
      @else
        <a class="nav-link" href="{{ route('home') }}">
      @endif
          <i class="material-icons">dashboard</i>
            <p>{{ __('Beranda') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'baranghilang' || $activePage == 'barangrusak' || $activePage == 'barangtemuan') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#databarang" aria-expanded="false">
        <i class="material-icons">list_alt</i>
          <p>{{ __('Data Barang') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="databarang">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'baranghilang' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('data-barang-hilang', 1) }}">
                <span class="sidebar-mini col-sm-1"></span>
                <span class="sidebar-normal">{{ __('Barang Hilang') }} </span>
              </a>
            </li>
            @if(Auth::user()->account_type_id == 1)
            <li class="nav-item{{ $activePage == 'barangrusak' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('data-barang-rusak') }}">
                <span class="sidebar-mini col-sm-1"></span>
                <span class="sidebar-normal">{{ __('Barang Rusak') }} </span>
              </a>
            </li>
            @endif
            <li class="nav-item{{ $activePage == 'barangtemuan' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('data-barang-temuan') }}">
                <span class="sidebar-mini col-sm-1"></span>
                <span class="sidebar-normal"> {{ __('Barang Temuan') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      @if(Auth::user()->account_type_id == 2)
      <li class="nav-item {{ ($activePage == 'bp_baranghilang' || $activePage == 'bp_barangrusak' || $activePage == 'bp_barangtemuan') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#buatpengajuan" aria-expanded="false">
        <i class="material-icons">content_paste</i>
          <p>{{ __('Buat Pengajuan') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="buatpengajuan">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'bp_baranghilang' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('pengajuan.bp_hilang') }}">
                <span class="sidebar-mini col-sm-1"></span>
                <span class="sidebar-normal">{{ __('Barang Hilang') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'bp_barangrusak' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('pengajuan.bp_rusak') }}">
                <span class="sidebar-mini col-sm-1"></span>
                <span class="sidebar-normal">{{ __('Barang Rusak') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'bp_barangtemuan' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('pengajuan.bp_temuan') }}">
                <span class="sidebar-mini col-sm-1"></span>
                <span class="sidebar-normal"> {{ __('Barang Temuan') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'p_saatini' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('pelaporan.pengajuan-saat-ini') }}">
          <i class="material-icons">fact_check</i>
            <p>{{ __('Pengajuan saat ini') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'h_baranghilang' || $activePage == 'h_barangrusak' || $activePage == 'h_barangtemuan') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#histori" aria-expanded="false">
        <i class="material-icons">library_books</i>
          <p>{{ __('Histori') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="histori">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'h_baranghilang' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('histori.pengajuan_hilang') }}">
                <span class="sidebar-mini col-sm-1"></span>
                <span class="sidebar-normal">{{ __('Barang Hilang') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'h_barangrusak' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('histori.pengajuan_rusak') }}">
                <span class="sidebar-mini col-sm-1"></span>
                <span class="sidebar-normal">{{ __('Barang Rusak') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'h_barangtemuan' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('histori.pengajuan_temuan') }}">
                <span class="sidebar-mini col-sm-1"></span>
                <span class="sidebar-normal"> {{ __('Barang Temuan') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      @endif
      @if(Auth::user()->account_type_id == 1)
      <li class="nav-item {{ ($activePage == 'r_baranghilang' || $activePage == 'r_barangrusak' || $activePage == 'r_barangtemuan') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false">
        <i class="material-icons">library_books</i>
          <p>{{ __('Report') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="report">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'r_baranghilang' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('report.report_hilang') }}">
                <span class="sidebar-mini col-sm-1"></span>
                <span class="sidebar-normal">{{ __('Barang Hilang') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'r_barangrusak' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('report.report_rusak') }}">
                <span class="sidebar-mini col-sm-1"></span>
                <span class="sidebar-normal">{{ __('Barang Rusak') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'r_barangtemuan' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('report.report_temuan') }}">
                <span class="sidebar-mini col-sm-1"></span>
                <span class="sidebar-normal"> {{ __('Barang Temuan') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ ($activePage == 'kategoribarang' || $activePage == 'divisi' || $activePage == 'lokasi') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#masterdata" aria-expanded="false">
        <i class="material-icons">perm_data_setting</i>
          <p>{{ __('Master Data') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="masterdata">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'kategoribarang' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('kategori.index') }}">
                <span class="sidebar-mini col-sm-1"></span>
                <span class="sidebar-normal">{{ __('Kategori Barang') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'divisi' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('divisi.index') }}">
                <span class="sidebar-mini col-sm-1"></span>
                <span class="sidebar-normal">{{ __('Divisi') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'lokasi' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('lokasi.index') }}">
                <span class="sidebar-mini col-sm-1"></span>
                <span class="sidebar-normal"> {{ __('Lokasi') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      @endif
    </ul>
  </div>
</div>
