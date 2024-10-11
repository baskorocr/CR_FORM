@extends('template.dashboard')

@section('breadcrumbs')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Form CR</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Form CR</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Pending -->
          <div class="card collapsed-card">
            <div class="card-header">
              <h3 class="card-title">Status Pending</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-plus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
              </div>
            </div>

            <div class="card-body p-0">
              <table class="table table-striped text-center">
                <thead>
                    <tr>
                      <th style="width: 1%">
                          No.
                      </th>
                      <th style="width: 15%">
                          No Doc CR
                      </th>
                      <th style="width: 15%">
                          Status Barang
                      </th>
                      <th style="width: 15%">
                          Facility
                      </th>
                      <th style="width: 20%">
                          User Note
                      </th>
                      <!-- <th style="width: 20%">
                          IT Analyst
                      </th> -->
                      <th style="width: 10%">
                          User / Requester
                      </th>
                      <th style="width: 5%">
                          Departement
                      </th>
                      <th style="width: 10%">
                          Submission Date
                      </th>
                      <th style="width: 10%" class="text-center">
                          Status DH
                      </th>
                      <th style="width: 10%" class="text-center">
                          Status DIVH
                      </th>
                      <th style="width: 45%" class="text-center"> 
                          Approval
                      </th>
                      <td>
                      <th style="width: 35%">
                          Action
                      </th>
                    </tr>
                  </thead>
                <tbody>
                  @forelse ($pending as $proposal)
                  @if(auth()->user()->departement == $proposal->departement)
                    <tr>
                      <td>
                        {{ $loop->iteration }}
                      </td>
                      <td>
                        <a>{{ $proposal->no_transaksi }}</a>
                      </td>
                      <td>
                        <a>{{ $proposal->status_barang }}</a>
                      </td>
                      <td>
                        <a>{{ $proposal->facility }}</a>
                      </td>
                      <td>
                        <a>{{ $proposal->user_note }}</a>
                      </td>
                      <!-- <td>
                        <a>{{ $proposal->it_analys }}</a>
                      </td> -->
                      <td>
                        <ul class="list-inline text-center">
                          <li class="list-inline-item">
                            <img alt="Avatar" class="img-circle" width="80" height="80" src="{{ asset('template/dashboard/dist/img/avatar5.png') }}">
                            <p>{{ $proposal->user_request }}</p>
                          </li>
                        </ul>
                      </td>
                      <td>
                        <a>{{ $proposal->departement }}</a>
                      </td>
                      <td>
                        <a>{{ $proposal->created_at->format('d-m-Y') }}</a>
                        <br/>
                        <small>Created {{ $proposal->created_at->diffForHumans() }}</small>
                      </td>
                      <td>
                        <span class="badge @if($proposal->status == 'approved') badge-success @elseif($proposal->status == 'rejected') badge-danger @else badge-dark @endif p-2" style="font-size: 0.8em">{{ ucfirst($proposal->status)  }}</span>
                      </td>
                      <td>
                        <span class="badge @if($proposal->status == 'approved') badge-success @elseif($proposal->status == 'rejected') badge-danger @else badge-dark @endif p-2" style="font-size: 0.8em">{{ ucfirst($proposal->status)  }}</span>
                      </td>
                      <td>
                        <div class="row">
                          <div class="col-md-9">
                            <form action="{{ route('proposal.approval', ['id' => $proposal->id, 'status' => 'approved']) }}" method="POST">
                              @csrf
                              @method('PATCH')
                              <button type="submit" class="btn btn-sm btn-success">Approve</button>
                            </form>
                          </div>
                         
                          <div class="col-md-3">
                            <form action="{{ route('proposal.approval', ['id' => $proposal->id, 'status' => 'rejected']) }}" method="POST">
                              @csrf
                              @method('PATCH')
                              <button type="submit" class="btn btn-sm btn-danger">Rejected</button>
                            </form>
                          </div>
                        </div>
                      </td>
                      <td>
                      <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="{{ route('proposal.show', $proposal->id) }}">
                          <i class="fas fa-list"></i> Detail
                        </a>
                        <form class="d-inline" action="{{ route('proposal.destroy', $proposal->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm">
                              <i class="fas fa-trash"></i> Delete
                          </button>
                        </form>
                      </td>
                    </tr>
                   @endif
                  @empty
                    <tr>
                      <td colspan="6">No data available</td>
                    </tr>
                  @endforelse                        
                </tbody>
              </table>
            </div>
          </div>

          <!-- Approved -->
          <div class="card collapsed-card">
            <div class="card-header">
              <h3 class="card-title">Status Approved</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-plus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped text-center">
                <thead>
                      <tr>
                        <th style="width: 1%">
                            No.
                        </th>
                        <th style="width: 15%">
                            No Doc CR
                        </th>
                        <th style="width: 15%">
                            Status Barang
                        </th>
                        <th style="width: 15%">
                            Facility
                        </th>
                        <th style="width: 20%">
                            User Note
                        </th>
                        <!-- <th style="width: 20%">
                            IT Analyst
                        </th> -->
                        <th style="width: 20%">
                            User / Requester
                        </th>
                        <th style="width: 5%">
                            Departement
                        </th>
                        <th style="width: 10%">
                            Approved date
                        </th>
                        <th style="width: 10%" class="text-center">
                            Status DH
                        </th>
                        <th style="width: 10%" class="text-center">
                            Status DIVH
                        </th>
                        <th style="width: 25%">
                            Action
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                      @forelse ($approved as $proposal)
                      @if(auth()->user()->departement == $proposal->departement)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                              <a>{{ $proposal->no_transaksi }}</a>
                            </td>
                            <td>
                              <a>{{ $proposal->status_barang }}</a>
                            </td>
                            <td>
                              <a>{{ $proposal->facility }}</a>
                            </td>
                            <td>
                              <a>{{ $proposal->user_note }}</a>
                            </td>
                            <!-- <td>
                              <a>{{ $proposal->it_analys }}</a>
                              <br/>
                              <small>Created {{ $proposal->created_at->diffForHumans() }}</small>
                            </td> -->
                            <td>
                                <ul class="list-inline text-center">
                                    <li class="list-inline-item">
                                        <img alt="Avatar" class="img-circle" width="80" height="80" src="{{ asset('template/dashboard/dist/img/avatar5.png') }}">
                                        <p>{{ $proposal->user_request }}</p>
                                    </li>
                                </ul>
                            </td>
                            <td>
                              <a>{{ $proposal->departement }}</a>
                            </td>
                            <td>
                              <a>{{ $proposal->updated_at->format('d-m-Y') }}</a>
                              <br/>
                              <small>Approved {{ $proposal->updated_at->diffForHumans() }}</small>
                            </td>
                            <td>
                              <span class="badge @if($proposal->status == 'approved') badge-success @elseif($proposal->status == 'rejected') badge-danger @else badge-dark @endif p-2" style="font-size: 0.8em">{{ ucfirst($proposal->status)  }}</span>
                            </td>
                            <td>
                              <span class="badge @if($proposal->status == 'approved') badge-success @elseif($proposal->status == 'rejected') badge-danger @else badge-dark @endif p-2" style="font-size: 0.8em">{{ ucfirst($proposal->status)  }}</span>
                            </td>
                            <td class="project-actions text-right">
                              <form class="d-inline" action="{{ route('proposal.print', $proposal->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-file"></i>Print</button>
                              </form>

                              <a class="btn btn-info btn-sm" href="{{ route('proposal.show', $proposal->id) }}">
                                <i class="fas fa-list"></i> Detail
                              </a>
                              <form class="d-inline" action="{{ route('proposal.destroy', $proposal->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" >
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                              </form>
                            </td>
                        </tr>
                        @endif
                      @empty
                      <tr>
                        <td colspan="6">No data available</td>
                      </tr>
                      @endforelse
                    </tbody>
              </table>
            </div>
          </div>

          <!-- Rejected -->
          <div class="card collapsed-card">
            <div class="card-header">
              <h3 class="card-title">Status Rejected</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-plus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped text-center">
                <thead>
                  <tr>
                    <th style="width: 1%">
                        No.
                    </th>
                    <th style="width: 15%">
                        No Doc CR
                    </th>
                    <th style="width: 15%">
                        Status Barang
                    </th>
                    <th style="width: 15%">
                        Facility
                    </th>
                    <th style="width: 20%">
                        User Note
                    </th>
                    <!-- <th style="width: 20%">
                        IT Analyst
                    </th> -->
                    <th style="width: 20%">
                        User / Requester
                    </th>
                    <th style="width: 5%">
                        Departement
                    </th>
                    <th style="width: 10%">
                        Rejected date
                    </th>
                    <th style="width: 10%" class="text-center">
                        Status DH
                    </th>
                      <th style="width: 10%" class="text-center">
                        Status DIVH
                    </th>
                    <th style="width: 25%">
                        Action
                    </th>
                  </tr>
                </thead>
              <tbody>
                  @forelse ($rejected as $proposal)
                  @if(auth()->user()->departement == $proposal->departement)
                    <tr>
                      <td>
                          {{ $loop->iteration }}
                      </td>
                      <td>
                          <a>{{ $proposal->no_transaksi }}</a>
                      </td>
                      <td>
                          <a>{{ $proposal->status_barang }}</a>
                      </td>
                      <td>
                          <a>{{ $proposal->facility }}</a>
                      </td>
                      <td>
                          <a>{{ $proposal->user_note }}</a>
                      </td>
                      <!-- <td>
                          <a>{{ $proposal->it_analys }}</a>
                      </td> -->
                      <td>
                        <ul class="list-inline text-center">
                          <li class="list-inline-item">
                            <img alt="Avatar" class="img-circle" width="80" height="80" src="{{ asset('template/dashboard/dist/img/avatar5.png') }}">
                            <p>{{ $proposal->user_request }}</p>
                          </li>
                        </ul>
                      </td>
                      <td>
                          <a>{{ $proposal->departement }}</a>
                      </td>
                      <td>
                          <a>{{ $proposal->updated_at->format('d-m-Y') }}</a>
                          <br/>
                          <small>Rejected {{ $proposal->updated_at->diffForHumans() }}</small>
                      </td>
                      <td>
                        <span class="badge @if($proposal->status == 'approved') badge-success @elseif($proposal->status == 'rejected') badge-danger @else badge-dark @endif p-2" style="font-size: 0.8em">{{ ucfirst($proposal->status)  }}</span>
                      </td>
                      <td>
                        <span class="badge @if($proposal->status == 'approved') badge-success @elseif($proposal->status == 'rejected') badge-danger @else badge-dark @endif p-2" style="font-size: 0.8em">{{ ucfirst($proposal->status)  }}</span>
                      </td>
                      <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="{{ route('proposal.show', $proposal->id) }}">
                            <i class="fas fa-list"></i> Detail
                        </a>
                        <form class="d-inline" action="{{ route('proposal.destroy', $proposal->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" >
                              <i class="fas fa-trash"></i> Delete
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endif
                  @empty
                  <tr>
                    <td colspan="6">No data available</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection